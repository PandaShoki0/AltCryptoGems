<?php

namespace App\Http\Controllers;

use App\Models\AdminNotification;
use App\Models\TradeLimits;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Tokens;
use App\Models\UserLicense;
use App\Models\WithdrawMethod;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\EmailToUser;
use App\Models\Currencies;
use App\Models\Deposit;
use App\Models\GeneralSetting;
use App\Models\PlanLog;
use App\Models\Popups;
use App\Models\PopupsStatus;
use App\Models\PricingPlan;
use App\Models\Wallet;
use App\Models\WalletsTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\RegisterViewResponse;
use Illuminate\Support\Str;
use Throwable;

class UserController extends Controller
{

    public function index(Request $request)
    { 
        // if($request->any == 'trade/live'){
        //     // if(Auth::user()->userplan == null || (Auth::user()->userplan != null)){
        //     //     return redirect(route("app.home.component", 'plan'));
        //     // }
        //     User::where('id', Auth::user()->id)->update(['demo_trade'=>'not_active']);
        // }else if($request->any == 'trade/demo'){
        //     User::where('id', Auth::user()->id)->update(['demo_trade'=>'active']);
        // }
        if($request->any == 'trade/live'){
            // if(Auth::user()->userplan == null || (Auth::user()->userplan != null)){
            //     return redirect(route("app.home.component", 'plan'));
            // }
            User::where('id', Auth::user()->id)->update(['demo_trade'=>'not_active']);
        }else if($request->any == 'trade/demo'){
            User::where('id', Auth::user()->id)->update(['demo_trade'=>'active']);
        }
        $page_title = 'Dashboard';
        $thirdparty = getProvider(); 
        $thirdpartyFutures = getProviderFutures();
        $provider = $thirdparty ? $thirdparty->title : 'kucoin';
        $providerFutures = $thirdpartyFutures->title ?? null;
        $tradingWallet = $thirdparty != null ? 1 : 0;
        $gnl_cur = GetCurrency();
        return view('layouts.app', compact('page_title', 'provider', 'tradingWallet', 'gnl_cur', 'providerFutures'));
    }

    public function verifyCsrf(Request $request)
    {
        if ($request->ajax()) {
            $token = $request->input('_token');
            $valid = $request->session()->token() === $token;
            return response()->json(['valid' => $valid]);
        }

        return abort(403);
    }

    ///WP user login////
    public function authenticateWPUser(Request $request)
    {
        if (Tokens::where('token', $request->token)->where('abilities', 'like', "%\"{$request->ability}\"%")->exists()) {
            if (User::where('email', $request->email)->exists()) {
                $user = User::where('email', $request->email)->first();
                try {
                    auth()->login($user);

                    $page_title = 'Matrix Dashboard';
                    $thirdparty = getProvider();
                    $provider = $thirdparty ? $thirdparty->title : 'kucoin';
                    $trading_wallet = $thirdparty != null ? 1 : 0;
                    $gnl_cur = GetCurrency();
                    return redirect()->to('app/page/dashboard')->with(['page_title' => $page_title, 'provider' => $provider, 'trading_wallet' => $trading_wallet, 'gnl_cur' => $gnl_cur]);
                } catch (\Throwable $th) {
                    return response()->json(
                        [
                            'success' => false,
                            'type' => 'error',
                            'message' => $th
                        ]
                    );
                }
            } else {
                $user = new User();
                try {
                    $user = User::create([
                        'email' => $request->email,
                        'password' => Hash::make('12345678'),
                        'name' => 'No Name',
                        'firstname' => 'No Name',
                        'lastname' => 'No Name',
                        'username' => $request->email,
                        'email_verified_at' => \Carbon\Carbon::now()->format('Y-m-d H:00:00'),
                        'status' => 1,
                        'role_id' => 2,
                    ]);
                    auth()->login($user);

                    $page_title = 'Matrix Dashboard';
                    $thirdparty = getProvider();
                    $provider = $thirdparty ? $thirdparty->title : 'kucoin';
                    $trading_wallet = $thirdparty != null ? 1 : 0;
                    $gnl_cur = GetCurrency();
                    return redirect()->to('app/page/dashboard')->with(['page_title' => $page_title, 'provider' => $provider, 'trading_wallet' => $trading_wallet, 'gnl_cur' => $gnl_cur]);
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        } else {
            return view('user.wpredirect');
        }
    }

    public function data()
    {
        $user = Auth::user();
        if (Popups::where('status', 1)->exists()) {
            $popups = [];
            $data = Popups::where('status', 1)->get();
            foreach ($data as $item) {
                if (!PopupsStatus::where('popup_id', $item->id)->where('user_id', $user->id)->where('status', 0)->exists()) {
                    $popup[] = $item;
                }
            }
            $popups = $popup ?? null;
        }
        $user->userplan = Auth::user()->userplan()->with('currentplan')->first();
        $user->recordLimits = TradeLimits::whereUserId(Auth::user()->id)->first();
        $user->license = UserLicense::whereUserId(Auth::user()->id)->first();
        $currency = Currencies::where('status', 1)->first();
        return response()->json([
            'user' => $user,
            'role' => $user->role_id,
            'popups' => $popups ?? null,
            'kyc' => checkKYC($user->id),
            'kyc_application' => $user->kyc_application,
            'currency' => $currency
        ]);
    }

    public function api_tokens()
    {
        $tokens = Auth::user()->tokens;
        foreach ($tokens as $key => $value) {
            $value->abilities = json_decode($value->abilities, true);
        }
        return response()->json(
            [
                'success' => false,
                'type' => 'success',
                'tokens' => Auth::user()->tokens
            ]
        );
    }

    public function api_tokens_edit(Request $request)
    {
        $token = Tokens::where('id', $request->token)->first();
        $abilites = [];
        foreach ($request->abilities as $key => $value) {
            $abilites[] = $value;
        }
        $token->abilities = json_encode($abilites);
        $token->save();
        return response()->json(
            [
                'success' => false,
                'type' => 'success',
                'message' => "Token updated successfully",
            ]
        );
    }

    public function api_tokens_store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|unique:tokens|string',
        ]);
        if ($validate->fails()) {
            foreach (json_decode($validate->errors()) as $key => $error) {
                $notify[] = ['warning', $error[0]];
            }
            return response()->json(
                [
                    'success' => true,
                    'type' => $notify[0][0],
                    'message' => $notify[0][1]
                ]
            );
        }
        $user = Auth::user();
        $token = new Tokens();
        $token->user_id = $user->id;
        $token->name = $request->name;
        $abilites = [];
        foreach ($request->abilities as $key => $value) {
            $abilites[] = $value;
        }
        $token->abilities = json_encode($abilites);
        $token->token = Str::random(32);
        $token->save();
        return response()->json(
            [
                'success' => false,
                'type' => 'success',
                'message' => "Token Created successfully",
            ]
        );
    }
    public function api_tokens_delete(Request $request)
    {
        $token = Tokens::where('id', $request->id)->first();
        $token->delete();
        return response()->json(
            [
                'success' => false,
                'type' => 'success',
                'message' => "Token removed successfully",
            ]
        );
    }
    public function home()
    {
        return redirect()->route('user.home');
    }

    public function send_email(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
        ], [
            'user_id.required' => __('Select a user first!'),
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('name')) {
                $msg = $validator->errors()->first();
            } else {
                $msg = __('messages.somthing_wrong');
            }

            $ret['msg'] = 'warning';
            $ret['message'] = $msg;
        } else {
            $user = User::FindOrFail($request->input('user_id'));

            if ($user) {
                $msg = $request->input('message');
                $msg = replace_with($msg, '[[user_name]]', $user->name);
                $data = (object) [
                    'user' => (object) ['name' => $user->name, 'email' => $user->email],
                    'subject' => $request->input('subject'),
                    'greeting' => $request->input('greeting'),
                    'text' => str_replace("\n", "<br>", $msg),
                ];
                $when = now()->addMinutes(2);

                try {
                    Mail::to($user->email)
                        ->later($when, new EmailToUser($data));
                    $ret['msg'] = 'success';
                    $ret['message'] = __('messages.mail.send');
                } catch (\Exception $e) {
                    $ret['errors'] = $e->getMessage();
                    $ret['msg'] = 'warning';
                    $ret['message'] = __('messages.mail.issues');
                }
            } else {
                $ret['msg'] = 'warning';
                $ret['message'] = __('messages.mail.failed');
            }

            if ($request->ajax()) {
                return response()->json($ret);
            }
            return back()->with([$ret['msg'] => $ret['message']]);
        }
    }

    public function withdrawMoney($symbol)
    {
        $data['withdrawMethod'] = WithdrawMethod::where('status', 1)->get();
        $data['page_title'] = "Withdraw Money";
        $data['symbol'] = $symbol;
        return view('user.withdraw.methods', $data);
    }

    public function withdrawStore(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'method_code' => 'required',
            'amount' => 'required|numeric'
        ]);
        if ($validate->fails()) {
            foreach (json_decode($validate->errors()) as $key => $error) {
                $notify[] = ['warning', $error[0]];
            }
            return response()->json(
                [
                    'success' => true,
                    'type' => $notify[0][0],
                    'message' => $notify[0][1]
                ]
            );
        }
        try {
            $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->firstOrFail();
            $user = auth()->user();
            $wallet = Wallet::where('provider', 'funding')->where('user_id', $user->id)->where('type', 'funding')->where('symbol', $request->symbol)->first();
            if ($request->amount < $method->min_limit) {
                $notify[] = ['error', 'Your Requested Amount is Smaller Than Minimum Amount.'];
                return response()->json(
                    [
                        'success' => true,
                        'type' => $notify[0][0],
                        'message' => $notify[0][1]
                    ]
                );
            }
            if ($request->amount > $method->max_limit) {
                $notify[] = ['error', 'Your Requested Amount is Larger Than Maximum Amount.'];
                return response()->json(
                    [
                        'success' => true,
                        'type' => $notify[0][0],
                        'message' => $notify[0][1]
                    ]
                );
            }

            if ($request->amount > $wallet->balance) {
                $notify[] = ['error', 'Your do not have Sufficient Balance For Withdraw.'];
                return response()->json(
                    [
                        'success' => true,
                        'type' => $notify[0][0],
                        'message' => $notify[0][1]
                    ]
                );
            }

            $charge = $method->fixed_charge + ($request->amount * $method->percent_charge / 100);
            $afterCharge = $request->amount - $charge;
            $finalAmount = getAmount($afterCharge * $method->rate);

            $withdraw = new Withdrawal();
            $withdraw->method_id = $method->id;
            $withdraw->user_id = $user->id;
            $withdraw->amount = getAmount($request->amount);
            $withdraw->currency = $method->currency;
            $withdraw->rate = $method->rate;
            $withdraw->charge = $charge;
            $withdraw->symbol = $wallet->symbol;
            $withdraw->final_amount = $finalAmount;
            $withdraw->after_charge = $afterCharge;
            $withdraw->trx = getTrx();
            $withdraw->save();
            $withdraw->clearCache();
            session()->put('wtrx', $withdraw->trx);
        } catch (\Throwable $th) {
            return response()->json(
                [
                    'success' => true,
                    'type' => 'error',
                    'message' => $th
                ]
            );
        }
        return response()->json(
            [
                'success' => true,
                'type' => 'success',
                'message' => 'Withdraw Initiated',
                'redirect' => route('user.withdraw.preview')
            ]
        );
    }

    public function withdrawPreview()
    {
        $data['withdraw'] = Withdrawal::with('method', 'user')->where('trx', session()->get('wtrx'))->where('status', 0)->latest()->firstOrFail();
        $data['page_title'] = "Withdraw Preview";
        $user = Auth::user();
        $data['wallet'] = Wallet::where('user_id', $user->id)->where('type', 'funding')->where('symbol', $data['withdraw']->symbol)->first();
        return view('user.withdraw.preview', $data);
    }


    public function withdrawSubmit(Request $request)
    {
        $withdraw = Withdrawal::with('method', 'user')->where('trx', session()->get('wtrx'))->where('status', 0)->latest()->firstOrFail();
        $rules = [];
        $inputField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($withdraw->method->user_data as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], 'mimes:jpeg,jpg,png');
                    array_push($rules[$key], 'max:2048');
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }
        $this->validate($request, $rules);
        $user = Auth::user();
        $wallet = Wallet::where('user_id', $user->id)->where('type', 'funding')->where('symbol', $withdraw->symbol)->first();

        if (getAmount($withdraw->final_amount) > $wallet->balance) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Your Current Balance.'];
            return back()->withNotify($notify);
        }

        $directory = date("Y") . "/" . date("m") . "/" . date("d");
        $path = imagePath()['verify']['withdraw']['path'] . '/' . $directory;
        $collection = collect($request);
        $reqField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($collection as $k => $v) {
                foreach ($withdraw->method->user_data as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {
                                try {
                                    $reqField[$inKey] = [
                                        'field_name' => $directory . '/' . uploadImg($request[$inKey], $path),
                                        'type' => $inVal->type,
                                    ];
                                } catch (\Exception $exp) {
                                    $notify[] = ['error', 'Could not upload your ' . $request[$inKey]];
                                    return back()->withNotify($notify)->withInput();
                                }
                            }
                        } else {
                            $reqField[$inKey] = $v;
                            $reqField[$inKey] = [
                                'field_name' => $v,
                                'type' => $inVal->type,
                            ];
                        }
                    }
                }
            }
            $withdraw['withdraw_information'] = $reqField;
        } else {
            $withdraw['withdraw_information'] = null;
        }

        $withdraw->status = 2;
        $withdraw->save();
        $wallet->balance -= $withdraw->amount * $withdraw->rate;
        $wallet->save();

        if ($wallet->save()) {
            $transaction = new Transaction();
            $transaction->user_id = $withdraw->user_id;
            $transaction->amount = getAmount($withdraw->amount);
            $transaction->post_balance = getAmount($wallet->balance);
            $transaction->charge = getAmount($withdraw->charge);
            $transaction->trx_type = '-';
            $transaction->details = getAmount($withdraw->amount * $withdraw->rate) . ' ' . $withdraw->currency . ' Withdraw Via ' . $withdraw->method->name;
            $transaction->trx =  $withdraw->trx;
            $transaction->save();
            $transaction->clearCache();
            try {
                notify($withdraw->user, 'WITHDRAW_USER_REQUESTED', [
                    'username' => $withdraw->user->username,
                    'site_name' => getNotify()->site_name,
                    "amount" => $withdraw->amount,
                    "currency" => $withdraw->symbol,
                    "trx" => $withdraw->trx,
                    "post_balance" => $withdraw->after_charge,
                    "charge" => $withdraw->charge,
                    "rate" => $withdraw->rate,
                    "delay" => $withdraw->method->delay,
                    "method_currency" => $withdraw->method_currency,
                    "method_name" => $withdraw->method->name,
                    "method_amount" => $withdraw->final_amo
                ]);
            } catch (Throwable $e) {
            }

            if ($transaction->save()) {
                $wallet_new_trx = new WalletsTransactions();
                $wallet_new_trx->user_id = $withdraw->user_id;
                $wallet_new_trx->symbol = $withdraw->symbol;
                $wallet_new_trx->amount = $withdraw->amount;
                $wallet_new_trx->amount_recieved = $withdraw->final_amount / getCoinRate($withdraw->symbol);
                $wallet_new_trx->charge = getAmount($withdraw->charge);
                $wallet_new_trx->to = $withdraw->symbol;
                $wallet_new_trx->type = '2';
                $wallet_new_trx->status = '2';
                $wallet_new_trx->trx = $withdraw->trx;
                $wallet_new_trx->details = getAmount($withdraw->final_amount) . ' ' . $withdraw->currency . ' Withdraw Via ' . $withdraw->method->name;
                $wallet_new_trx->wallet_type = 'funding';
                $wallet_new_trx->save();
                $wallet_new_trx->clearCache();
            }
        }

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New withdraw request from ' . $user->username;
        $adminNotification->click_url = route('admin.withdraw.details', $withdraw->id);
        $adminNotification->save();
        $adminNotification->clearCache();

        $notify[] = ['success', 'Withdraw Request Successfully Send'];
        return redirect()->route('app.home')->withNotify($notify);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $profile = User::where('id', $user->id)->first();
        $path = imagePath()['profileImage']['path'];
        $size = imagePath()['profileImage']['size'];
        if (isset($request->image)) {
            try {
                $filename = uploadImg($request->image, $path, $size);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            $profile->profile_photo_path = $filename;
            $profile->save();
            $notify[] = ['success', 'Profile Image Updated Successfully'];
            return back()->withNotify($notify);
        }
        $this->validate($request, [
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'image' => ['nullable', 'max:4096'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'zip' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
        ]);
        if ($request->email != $user->email) {
            $profile->name = $request->firstname . ' ' . $request->lastname;
            $profile->email = $request->email;
            $profile->email_verified_at = null;
            $profile->save();
            $user->sendEmailVerificationNotification();
        } else {
            $profile->name = $request->firstname . ' ' . $request->lastname;
            $profile->email = $request->email;
            $profile->firstname = $request->firstname;
            $profile->lastname = $request->lastname;
            $profile->zip = $request->zip;
            $profile->address = $request->address;
            $profile->state = $request->state;
            $profile->city = $request->city;
            $profile->country = $request->country;
            $profile->save();
        }

        $notify[] = ['success', 'Profile Updated Successfully'];
        return back()->withNotify($notify);
    }

    public function createref(Request $request, $reference): RegisterViewResponse
    {
        session()->put('reference', $reference);
        return app(RegisterViewResponse::class);
    }

    public function fetch_withdraw_history()
    {
        $logs = Withdrawal::where('user_id', Auth::id())->where('status', '!=', 0)->with('method')->latest()->get();
        return response()->json([
            'logs' => $logs
        ]);
    }
    public function fetch_deposit_history()
    {
        return response()->json([
            'logs' => (new Deposit)->getCached(auth()->user()->id)
        ]);
    }
    public function fetch_transaction_history()
    {
        $logs = auth()->user()->transactions()->latest()->get();
        return response()->json([
            'logs' => $logs
        ]);
    }

    public function fetchPlans(){
        $data['plans'] = PricingPlan::whereStatus(1)->get();
        $data['userPlan'] = Auth::user()->userplan == null ? null: Auth::user()->userplan->plan_name;
        $data['basic'] = GeneralSetting::first();
        $data['user'] = Auth::user();
        $data['user']['ccy'] = json_encode(Auth::user()->ccy);
        return response()->json([
            'data' => $data,
            'type' => 'success'
        ]);
    }

    public function submitPlan( Request $request )
    {
            $this->validate($request, [
                'plan_id' => 'required'
            ]);

            $currentplan = PlanLog::where('user_id', Auth::user()->id)->first();

            if($currentplan == null)
            {
                $currentplan = new PlanLog;
                $currentplan->user_id = Auth::user()->id;
            }
            else
            {
                if( $currentplan->is_paid )
                $currentplan->previous_pricing_plan = $currentplan->pricing_plan_id;
                
            }

            $currentplan->is_paid = false;

            $currentplan->pricing_plan_id = $request->plan_id;  

            $currentplan->save();
            return response()->json([
                'message' => 'plan', 'You have requested for an upgrade to '.$currentplan->pricingPlan->title.'! Kindly make a deposit of $' . number_format($currentplan->pricingPlan->rate, 2, '.', ',') .' to activate this plan!',
                'type' => 'success'
            ]);

            //return back()->with('success', 'Plan Updated for Upgrade.')->with('message', 'Your Plan will be accepted once you make the mininum deposit for the plan');
    }

    public function userVerifyLicense(Request $request)
    {
        $license = UserLicense::whereUserId(Auth::user()->id)->first();
        $licenseKey = $request->input('license_key');

        if ($license->license_keys == null || !in_array($licenseKey, $license->license_keys)) {
            return response()->json(['success' => false, 'message' => 'License key is invalid or not found in your account.']);
        }

        $license->delete();


        return response()->json(['success' => true]);
    }
}
