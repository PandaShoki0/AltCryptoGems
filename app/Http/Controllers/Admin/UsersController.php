<?php

namespace App\Http\Controllers\Admin;

use App\Models\Deposit;
use App\Http\Controllers\Controller;
use App\Models\Binance\BinanceCurrencies;
use App\Models\CoinbaseCurrencies;
use App\Models\CoinPair;
use App\Models\Currencies;
use App\Models\DemoDeposit;
use App\Models\Ecommerce\EcommerceLicense;
use App\Models\GeneralSetting;
use App\Models\Kucoin\KucoinCurrencies;
use App\Models\PlanLog;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\TradeLog;
use App\Models\PracticeLog;
use App\Models\PricingPlan;
use App\Models\TradeCategory;
use App\Models\TradeHistory;
use App\Models\TradeLimits;
use App\Models\TradePrediction;
use App\Models\UserLicense;
use App\Models\UserLogin;
use App\Models\UserSavedTrades;
use App\Models\Wallet;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public $api;
    public $provider;
    public function __construct()
    {
        $thirdparty = getProvider();
        if ($thirdparty != null) {
            $exchange_class = "\\ccxt\\$thirdparty->title";
            if ($thirdparty->title == 'kucoin') {
                $this->api = new $exchange_class(array(
                    'apiKey' => $thirdparty->api,
                    'secret' => $thirdparty->secret,
                    'password' => $thirdparty->password,
                    'options' => array(
                        'versions' => array(
                            'public' => array(
                                'GET' => array(
                                    'currencies/{currency}' => 'v2',
                                ),
                            ),
                        ),
                    ),
                    //'verbose'=> true
                ));
            } else if ($thirdparty->title == 'binance' || $thirdparty->title == 'binanceus') {
                $this->api = new $exchange_class(array(
                    'apiKey' => $thirdparty->api,
                    'secret' => $thirdparty->secret,
                    'password' => $thirdparty->password,
                    'options' => array(
                        'adjustForTimeDifference' => true,
                        'recvWindow' => 30000,
                    ),
                ));
            } else {
                $this->api = new $exchange_class(array(
                    'apiKey' => $thirdparty->api,
                    'secret' => $thirdparty->secret,
                    'password' => $thirdparty->password,
                ));
            }
            $this->provider = $thirdparty->title;
        } else {
            $this->provider = 'funding';
        }
    }
    public function allUsers()
    {
        abort_if(Gate::denies('user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'Manage Users';
        $type = 'all';
        return view('admin.users.list', compact('page_title', 'type'));
    }

    public function detail($id)
    {
        if (Gate::denies('user_edit')) {
            return response()->json(['error' => 'Forbidden'], Response::HTTP_FORBIDDEN);
        }
        $user = User::with('kyc_application')->findOrFail($id);
        $totalDeposit = Deposit::where('user_id', $user->id)
            ->where('status', 1)
            ->sum('amount');
        $totalWithdraw = Withdrawal::where('user_id', $user->id)
            ->where('status', 1)
            ->sum('amount');
        $totalTransaction = Transaction::where('user_id', $user->id)->count();
        $tradeLog = [
            'traded' => TradeLog::where('user_id', $user->id)->count(),
            'wining' => TradeLog::where('user_id', $user->id)
                ->where('result', 1)
                ->where('status', 1)
                ->count(),
            'losing' => TradeLog::where('user_id', $user->id)
                ->where('result', 2)
                ->where('status', 1)
                ->count(),
            'draw' => TradeLog::where('user_id', $user->id)
                ->where('result', 3)
                ->where('status', 1)
                ->count()
        ];
        $practiceLogCount = PracticeLog::where('user_id', $user->id)->count();
        $refer_by = User::where('id', $user->ref_by)->first();
        $wallets = Wallet::where('user_id', $user->id)->get();
        $wallet_type = (getProvider() != null) ? 'trading' : 'funding';
        return view('admin.users.detail', [
            'user' => $user,
            'totalDeposit' => $totalDeposit,
            'totalWithdraw' => $totalWithdraw,
            'totalTransaction' => $totalTransaction,
            'wallets' => $wallets,
            'tradeLog' => $tradeLog,
            'practiceLogCount' => $practiceLogCount,
            'refer_by' => $refer_by,
            'wallet_type' => $wallet_type
        ]);
    }

    public function wallet_create(Request $request)
    {
        $request->merge([
            'user_id' => $request->user_id,
            'symbol' => $request->symbol,
            'type' => $request->type,
        ]);

        if ($request->type === 'primary') {
            $ecoController = new \App\Http\Controllers\Extensions\Eco\WalletController();
            return $ecoController->store($request);
        } else {
            $walletController = new \App\Http\Controllers\WalletController();
            return $walletController->store($request);
        }
    }

    public function fetchWallets($id)
    {
        $user = User::find($id);

        // Get the currencies based on the provider
        if ($this->provider == 'coinbasepro') {
            $currencies = (new CoinbaseCurrencies())->getEnabled();
        } elseif ($this->provider == 'kucoin') {
            $currencies = (new KucoinCurrencies())->getEnabled();
        } elseif ($this->provider == 'binance' || $this->provider == 'binanceus') {
            $currencies = (new BinanceCurrencies())->getEnabled();
        } else {
            return response()->json([
                'error' => 'Invalid provider',
                'currencies' => [],
            ]);
        }

        // Get the wallets based on the provider
        if (Wallet::where('provider', '!=', 'local')->where('user_id', $user->id)->exists()) {
            $all_wallets = (new Wallet)->getCached($user->id);
            $wallets['trading'] = $all_wallets->where('provider', $this->provider);
            $wallets['funding'] = $all_wallets->where('provider', 'funding');
        } else {
            $wallets['trading'] = collect();
            $wallets['funding'] = collect();
        }

        // Merge wallet data into currency data
        $currenciesWithWallets = $currencies->map(function ($currency) use ($wallets) {
            foreach (['trading', 'funding'] as $walletType) {
                $currencyWallet = $wallets[$walletType]->where('symbol', $currency->symbol)->first();
                if ($currencyWallet) {
                    $currency->{$walletType . 'Wallet'} = $currencyWallet;
                }
            }
            return $currency;
        });

        $filteredCurrencies = [
            'funding' => [],
            'trading' => [],
        ];

        foreach ($currenciesWithWallets as $currency) {
            if (!isset($currency->fundingWallet)) {
                $filteredCurrencies['funding'][] = $currency->symbol;
            }

            if (!isset($currency->tradingWallet)) {
                $filteredCurrencies['trading'][] = $currency->symbol;
            }
        }

        return response()->json($filteredCurrencies);
    }

    public function fetchEcoWallets($id, \App\Http\Controllers\Extensions\Eco\WalletController $ecoController)
    {

        $response = $ecoController->index($id);

        $currencies = $response->getData()->currencies;

        // Filter out currencies that have a wallet with an id
        $filteredCurrencies = array_filter($currencies, function ($currency) {
            return !isset($currency->wallet);
        });

        // Reset array indices
        $filteredCurrencies = array_values($filteredCurrencies);

        // Extract only the symbols
        $symbols = array_map(function ($currency) {
            return $currency->symbol;
        }, $filteredCurrencies);

        return response()->json($symbols);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $rules = [
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
            'address' => 'max:160',
            'city' => 'max:60',
            'state' => 'max:60',
            'zip' => 'max:60',
            'country' => 'max:60',
            'phone' => 'max:60',
        ];

        if ($request->email !== $user->email) {
            $rules['email'] = 'required|email|max:160|unique:users,email,' . $user->id;
        }

        if (!empty($request->password)) {
            $rules['password'] = [
                'nullable',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised()
            ];
        }

        $request->validate($rules, [
            'firstname.required' => 'The first name field is required.',
            'firstname.max' => 'The first name may not be greater than 60 characters.',
            'lastname.required' => 'The last name field is required.',
            'lastname.max' => 'The last name may not be greater than 60 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.max' => 'The email may not be greater than 160 characters.',
            'email.unique' => 'The email has already been taken.',
            'address.max' => 'The address may not be greater than 160 characters.',
            'city.max' => 'The city may not be greater than 60 characters.',
            'state.max' => 'The state may not be greater than 60 characters.',
            'zip.max' => 'The ZIP code may not be greater than 60 characters.',
            'phone.max' => 'The phone number may not be greater than 60 characters.',
            'country.max' => 'The country may not be greater than 60 characters.',
            'password.min' => 'The password must be at least 8 characters long.',
            'password.letters' => 'The password must contain at least one letter.',
            'password.mixed_case' => 'The password must contain both uppercase and lowercase letters.',
            'password.numbers' => 'The password must contain at least one number.',
            'password.symbols' => 'The password must contain at least one symbol.',
            'password.uncompromised' => 'The password has been compromised and should not be used.',
        ]);



        if ($request->email != $user->email && User::whereEmail($request->email)->whereId('!=', $user->id)->count() > 0) {
            $notify[] = ['error', 'Email already exists.'];
            return back()->withNotify($notify);
        }
        if ($request->mobile != $user->mobile && User::where('mobile', $request->mobile)->whereId('!=', $user->id)->count() > 0) {
            $notify[] = ['error', 'Phone number already exists.'];
            return back()->withNotify($notify);
        }
        $request->merge(['status' => isset($request->status) ? 1 : 0]);
        $request->merge(['email_verified_at' => isset($request->email_verified_at) ? 1 : 0]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->state = $request->state;
        $user->zip = $request->zip;
        $user->country = $request->country;
        if ($request->phone) {
            $user->phone = $request->phone;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $notify[] = ['success', 'User detail has been updated'];
        return back()->withNotify($notify);
    }

    public function addSubBalance(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'amount' => 'required|numeric|gt:0'
        ]);
        if ($validate->fails()) {
            foreach (json_decode($validate->errors()) as $key => $error) {
                $notify[] = ['error', $error[0]];
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
            $user = User::findOrFail($id);
            $amount = getAmount($request->amount);
            $wallet = Wallet::where('user_id', $user->id)->where('address', $request->address)->where('symbol', $request->symbol)->first();
            $trx = getTrx();

            if ($request->act) {

                $wallet->balance += $amount;
                $wallet->save();
                $notify[] = ['success', $request->symbol . ' ' . $amount . ' has been added to ' . $user->username . ' balance'];
                if ($user) {
                    $transaction = new Transaction();
                    $transaction->user_id = $user->id;
                    $transaction->amount = $amount;
                    $transaction->post_balance = getAmount($wallet->balance);
                    $transaction->charge = 0;
                    $transaction->trx_type = '+';
                    $transaction->currency = $request->symbol;
                    $transaction->details = 'Added Balance Via Admin';
                    $transaction->trx =  $trx;
                    $transaction->save();
                    $transaction->clearCache();

                    createAdminNotification($user->id, $transaction->details, '#', $amount . ' ' . $request->symbol . ' has been added by ' . auth()->user()->username . ' to ' . $user->username . ' balance');
                    try {
                        notify($user, 'ADMIN_BALANCE_ADD', [
                            'username' => $user->username,
                            'site_name' => getNotify()->site_name,
                            "amount" => $transaction->amount,
                            "currency" => $request->symbol,
                            "trx" => $transaction->trx,
                            "post_balance" => $transaction->post_balance
                        ], ['email']);
                        $notify[] = ['success', 'Client Notified By Email Successfully'];
                    } catch (Throwable $e) {
                        $notify[] = ['warning', 'Mail Not Properly Set'];
                    }
                }
            } else {
                if ($amount > $wallet->balance) {
                    $notify[] = ['error', $user->username . ' has insufficient balance.'];
                    return response()->json(
                        [
                            'success' => true,
                            'type' => $notify[0][0],
                            'message' => $notify[0][1]
                        ]
                    );
                }

                $wallet->balance -= $amount;
                $wallet->save();
                $notify[] = ['success', $request->symbol . ' ' . $amount . ' has been subtracted from ' . $user->username . ' balance'];
                if ($user) {
                    $transaction = new Transaction();
                    $transaction->user_id = $user->id;
                    $transaction->amount = $amount;
                    $transaction->post_balance = getAmount($wallet->balance);
                    $transaction->charge = 0;
                    $transaction->trx_type = '-';
                    $transaction->details = 'Subtract Balance Via Admin';
                    $transaction->trx =  $trx;
                    $transaction->currency = $request->symbol;
                    $transaction->save();
                    $transaction->clearCache();
                    createAdminNotification($user->id, $transaction->details, '#', $amount . ' ' . $request->symbol . ' has been subtracted by ' . auth()->user()->username . ' from ' . $user->username . ' balance');
                    try {
                        notify($user, 'ADMIN_BALANCE_SUBTRACTED', [
                            'username' => $user->username,
                            'site_name' => getNotify()->site_name,
                            "amount" => $transaction->amount,
                            "currency" => $request->symbol,
                            "trx" => $transaction->trx,
                            "post_balance" => $transaction->post_balance
                        ]);
                        $notify[] = ['success', 'Client Notified By Email Successfully'];
                    } catch (Throwable $e) {
                        $notify[] = ['warning', 'Mail Not Properly Set'];
                    }
                }
            }
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
                'type' => $notify[0][0],
                'message' => $notify[0][1]
            ]
        );
    }

    public function showEmailSingleForm($id)
    {
        abort_if(Gate::denies('user_mailer'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $user = User::findOrFail($id);
        $page_title = 'Send Email To: ' . $user->username;
        return view('admin.users.email_single', compact('page_title', 'user'));
    }

    public function sendEmailSingle(Request $request, $id)
    {
        abort_if(Gate::denies('user_mailer'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        $user = User::findOrFail($id);
        $subject = $request->subject;
        $message = $request->message;

        notify($user, 'SEND_MAIL', [
            'site_name' => getNotify()->site_name,
            'subject' => $subject,
            'message' => $message,
            'username' => $user->username
        ], ['email']);
        try {
            $notify[] = ['success', $user->username . ' will receive an email shortly.'];
        } catch (Throwable $e) {
            $notify[] = ['warning', 'Mail Not Properly Set'];
        }

        return back()->withNotify($notify);
    }

    public function showEmailAllForm()
    {
        abort_if(Gate::denies('user_mailer'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'Send Email To All Users';
        return view('admin.users.email_all', compact('page_title'));
    }

    public function sendEmailAll(Request $request)
    {
        abort_if(Gate::denies('user_mailer'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        foreach (User::where('status', 1)->cursor() as $user) {
            $subject = $request->subject;
            $message = $request->message;
            try {
                notify($user, 'SEND_MAIL', [
                    'site_name' => getNotify()->site_name,
                    'subject' => $subject,
                    'message' => $message,
                    'username' => $user->username
                ], ['email']);
            } catch (Throwable $e) {
                $notify[] = ['warning', 'Mail Not Properly Set'];
            }
        }

        $notify[] = ['success', 'All users will receive an email shortly.'];
        return back()->withNotify($notify);
    }

    // import view
    public function import()
    {
        $page_title = 'Import Users';
        return view('admin.users.import', compact('page_title'));
    }
    public function importing(Request $request)
    {
        $file = $request->file('file');
        if (auth()->user()->role_id != 1) {
            $response['status'] = 'error';
            $response['message'] = 'You do not have permission to import users';
            return $response;
        }

        $response = [];

        if ($file->getClientOriginalExtension() == 'csv') {
            $csvFile = fopen($file->getPathname(), 'r');

            // Get the CSV headers and check that they match the expected structure
            $headers = fgetcsv($csvFile);
            $expectedHeaders = ['email', 'password', 'name', 'firstname', 'lastname', 'username', 'country', 'zip', 'state', 'city', 'ref_by', 'role_id', 'phone'];

            if ($headers !== $expectedHeaders) {
                $response['status'] = 'error';
                $response['message'] = 'Invalid CSV file structure';
                return $response;
            }

            // Read the CSV data into an array and do something with it
            $rowCount = 0;
            $importedUsers = [];
            while (($row = fgetcsv($csvFile)) !== false) {
                $rowCount++;

                // Do not create a user if it already exists
                $user = User::where('email', $row[0])->orWhere('username', $row[5])->first();
                if ($user) {
                    continue;
                }

                // Create the user
                $createdUser = User::create([
                    'email' => $row[0],
                    'password' => Hash::make($row[1]),
                    'name' => $row[2],
                    'firstname' => $row[3],
                    'lastname' => $row[4],
                    'username' => $row[5],
                    'country' => $row[6],
                    'zip' => $row[7],
                    'state' => $row[8],
                    'city' => $row[9],
                    'ref_by' => $row[10],
                    'role_id' => $row[11],
                    'phone' => $row[12],
                ]);

                $importedUsers[] = [
                    'email' => $createdUser->email,
                    'name' => $createdUser->name,
                    'role' => $createdUser->role->title,
                ];
            }

            fclose($csvFile);
            $response['status'] = 'success';
            $response['message'] = 'CSV import successful';
            $response['users'] = $importedUsers;
        } else {
            $response['success'] = false;
            $response['message'] = 'Invalid file type';
        }

        return $response;
    }




    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=users_template.csv',
        ];

        $templateData = [
            ['email', 'password', 'name', 'firstname', 'lastname', 'username', 'country', 'zip', 'state', 'city', 'ref_by', 'role_id', 'phone'],
        ];

        $stream = fopen('php://temp', 'r+');
        foreach ($templateData as $row) {
            fputcsv($stream, $row);
        }
        rewind($stream);

        $contents = stream_get_contents($stream);

        return response($contents, 200, $headers);
    }

    public function manage($id)
    {
        $user = User::findorFail($id);
        $data['page_title'] = "User Manage";
        $data['user'] = $user;
        $data['last_login'] = UserLogin::whereUser_id($user->id)->orderBy('id', 'desc')->first();
        $data['currencies'] = Currencies::where('status', 1)->get();
        return view('admin.users.manage', $data);
    }

    public function ManageBalanceByUsers($id)
    {
        $user =  User::find($id);
        $page_title = "ADD / SUBSTRUCT BALANCE";
        $last_login = UserLogin::whereUser_id($user->id)->orderBy('id', 'desc')->first();
        $url = route('admin.users.balance.update');
        $account_type = 'live';
        return view('admin.users.balance-manage', compact('user', 'url', 'account_type', 'page_title', 'last_login'));
    }

    public function ManageDemoBalanceByUsers($id)
    {
        $user =  User::find($id);
        $page_title = "ADD / SUBTRACT DEMO BALANCE";
        $url = route('admin.users.demobalance.update');
        $account_type = 'demo';
        $last_login = UserLogin::whereUser_id($user->id)->orderBy('id', 'desc')->first();
        return view('admin.users.balance-manage', compact('user', 'url', 'account_type', 'page_title', 'last_login'));
    }

    public function saveBalanceByUsers(Request $request)
    {

        $basic = GeneralSetting::first();

        $user = User::find($request->id);

        $wallet = Wallet::find($request->wallet);

        if ($wallet == null) {
            Wallet::create([
                'user_id' => $user->id,
                // 'gateway_id' => $wallet->gateway_id,
                'balance' => '0.00',
                'balance_demo' => '0.00',
                'is_default' => 0,
                // 'wallet_acc' => ''
            ]);
        }

        $this->validate($request, [
            'amount' => 'required|numeric|min:0',
            'message' => 'required',
            'wallet'  => 'required'
        ]);


        if ($request->operation == "on") {
            $wallet->balance += $request->amount;
            $wallet->save();

            $txt = 'Your ' . $wallet->symbol . ' Wallet has been credited with ' . $request->amount . ' ' . $wallet->symbol . '<br>' .  $request->message;

            // notify($user, $wallet->gateway->name . ' Wallet - Credited', $txt);

            $msg2 = "A deposit of " . $request->amount . $wallet->symbol . " was just approved for client " . $user->name;


            $tlog['user_id'] = $user->id;
            $tlog['trx'] =  str_random(16);
            $tlog['amount'] = $request->currency_amount;
            // $tlog['coin_amount'] = $request->amount;
            // $tlog['wallet_id'] = $wallet->id;
            $tlog['post_balance'] = $wallet->balance;
            $tlog['trx_type'] = '+';
            $tlog['currency'] = $wallet->symbol;
            // $tlog['title'] = $wallet->gateway->name .' successfully credited with '. $wallet->amount. $wallet->gateway->code;
            // $tlog['trans_type'] = 'credit';
            $tlog['details'] = $wallet->symbol . ' Wallet Credited Successfully with ' . $request->amount . $wallet->symbol;
            Transaction::create($tlog);

            // send_email('karo4u2007@gmail.com', 'Jefferson K', $request->amount . ' ' . $wallet->gateway->name. ' NEW DEPOSIT', $msg2);

            // send_email('brandoniked@gmail.com', 'Chief Trade', $request->amount . ' ' . $wallet->gateway->name. ' NEW DEPOSIT', $msg2);

        } else {
            if (($wallet->balance > 0) && ($request->amount < $wallet->balance)) {
                $wallet->balance -= $request->amount;
                $wallet->save();

                $txt = 'Your ' . $wallet->symbol . ' Wallet has been debited with ' . $request->amount . ' ' . $wallet->symbol . '<br>' .  $request->message;

                // notify($user, $wallet->gateway->name . ' Wallet - Debited', $txt);

                $tlog['user_id'] = $user->id;
                $tlog['trx'] =  str_random(16);
                $tlog['amount'] = $request->currency_amount;
                // $tlog['coin_amount'] = $request->amount;
                // $tlog['wallet_id'] = $wallet->id;
                $tlog['post_balance'] = $wallet->balance;
                $tlog['type'] = '-';
                $tlog['currency'] = $wallet->symbol;
                // $tlog['title'] = $wallet->gateway->name .' successfully debited with '. $wallet->amount. $wallet->gateway->code;
                // $tlog['trans_type'] = 'debit';
                $tlog['details'] = $wallet->symbol . ' Wallet Debited Successfully with ' . $request->amount . $wallet->symbol;
                Transaction::create($tlog);
            } else {
                return back()->with('alert', 'Insufficient Balance To Substract!');
            }
        }

        return back()->with('success', 'Deposit Successfully Completed!');
    }

    public function saveDemoBalanceByUsers(Request $request)
    {
        $basic = GeneralSetting::first();

        $user = User::find($request->id);

        $wallet = Wallet::where('user_id', $user->id)->whereId($request->wallet)->first();

        if ($wallet == null) {
            Wallet::create([
                'user_id' => $user->id,
                // 'gateway_id' => $wallet->gateway_id,
                'balance' => '0.00',
                'balance_demo' => '0.00',
                'is_default' => 0,
                // 'wallet_acc' => ''
            ]);
        }

        $this->validate($request, [
            'amount' => 'required|numeric|min:0',
            'message' => 'required'
        ]);

        if ($request->operation == "on") {
            $wallet->balance_demo += $request->amount;
            $wallet->save();

            $demodeposit = new DemoDeposit();
            $demodeposit->user_id =  $user->id;
            $demodeposit->wallet_id =  $request->wallet;
            $demodeposit->coin_amount =  $request->amount;
            $demodeposit->currency_amount = $request->currency_amount;
            $demodeposit->save();

            $txt = 'Your Demo ' . $wallet->symbol . ' wallet has been credited with ' . $request->amount . ' ' . $wallet->symbol . '<br>' .  $request->message;

            // notify($user, 'Demo '.$wallet->gateway->name.' Wallet Credit Alert', $txt);
        } else {
            if (($wallet->balance_demo > 0) && ($request->amount < $wallet->balance_demo)) {
                $wallet->balance_demo -= $request->amount;
                $wallet->save();

                $demodeposit = new DemoDeposit;
                $demodeposit->user_id =  $user->id;
                $demodeposit->wallet_id =  $request->wallet;
                $demodeposit->coin_amount =  (0 - $request->amount);
                $demodeposit->currency_amount = (0 - $request->currency_amount);
                $demodeposit->save();

                $txt = 'Your Demo ' . $wallet->symbol . ' account has been debited with ' . $request->amount . ' ' . $wallet->symbol . '<br>' .  $request->message;

                notify($user, 'Demo ' . $wallet->symbol . ' Wallet Debit Alert', $txt);
            } else {
                return back()->with('alert', 'Insufficient Balance To Substract!');
            }
        }

        return back()->with('success', 'Deposit Successfully Completed!');
    }

    public function generatePredictions($user_id)
    {
        $user = User::find($user_id);

        $data['user'] = $user;
        $data['symbols'] = CoinPair::whereStatus(1)->orderBy('name', 'asc')->get();

        $data['page_title'] = 'Generate Predictions for ' . $user->name;
        $data['predictions_demo'] = TradePrediction::whereTradeType('demo')->whereUserId($user->id)->latest()->paginate(30);
        $data['predictions'] = TradePrediction::whereTradeType('live')->whereUserId($user->id)->latest()->paginate(30);
        return view('admin.users.predictions', $data);
    }

    public function userTradeManager($user_id)
    {
        $user = User::find($user_id);

        $data['page_title'] = "Trade Position for " . $user->name;

        $data['user'] = $user;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.coingecko.com/api/v3/exchange_rates');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $_rates = json_decode(curl_exec($ch));
        $server_rates = $_rates->rates ?? 0;
        curl_close($ch);
        $data['rates'] = $server_rates;

        $nowTime = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();

        $data['wallet'] = $wallet =  Wallet::where('user_id', $user->id)->whereIsDefault(1)->first();

        $data['mycurrency'] = $user->ccy;

        $data['initialcat'] = TradeCategory::latest()->whereStatus(1)->first();

        $data['tradeCategory'] = TradeCategory::whereStatus(1)->get();

        $data['pairs'] = CoinPair::whereStatus(1)->orderBy('name', 'asc')->get();

        $livetrades = TradeHistory::whereUserId($user->id)->where('trade_type', 'live')->latest()->get();

        $margin_used_raw = TradeHistory::whereUserId($user->id)->wherePositionStatus('open')->whereWalletId($wallet->id)->whereTradeType('live')->where('end_time', '>', $nowTime)->sum('amount_margin_user_currency');

        $data['margin_used'] = number_format($margin_used_raw, $user->ccy->decimal_digits);

        $data['profit_loss_user'] = TradeHistory::whereUserId($user->id)->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType('live')->where('end_time', '>', $nowTime)->sum('profit_loss_user');

        return view('admin.users.trade', $data);
    }

    public function userPlan($userid)
    {
        $data['page_title'] = 'Plan for ' . User::find($userid)->name;
        $data['user'] = User::find($userid);
        $data['plans'] = PricingPlan::whereStatus(1)->get();
        $data['plan'] = PlanLog::whereUserId($userid)->first();
        return view('admin.users.plan', $data);
    }

    public function updateUserPlan(Request $request, $user_id)
    {
        $this->validate($request, [
            'plan'  => 'required'
        ]);

        $user = User::find($user_id);

        $mac = PlanLog::whereUserId($user_id)->first();
        //check if amount can carry plan
        $mac->status = true;
        $mac->is_paid = true;
        $mac->pricing_plan_id  = $request->plan;
        $mac->previous_pricing_plan = $mac->pricing_plan_id !== null ? $mac->pricing_plan_id : null;
        $res = $mac->save();

        if ($res) {
            return back()->with('success', 'Plan for ' . $user->name . ' Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Approving Plan');
        }
    }

    public function savePredictions(Request $request)
    {

        $this->validate($request, [
            'amount_to' => 'required|numeric',
            'amount_from' => 'required|numeric',
            'symbols'   => 'required',
            'number_trades' => 'required',
            'rates' => 'required'
        ]);

        //curreny_user

        if ($request->amount_from > $request->amount_to) {
            return back()->with('alert', 'Amount From cannot be greater than Amount to');
        }

        $options = ['buy', 'sell'];

        $rates = json_decode($request->rates);


        for ($i = 0; $i < $request->number_trades; $i++) {

            $amount = round(rand($request->amount_from, $request->amount_to), 2);

            $k = rand(0, (count($request->symbols) - 1));
            $r = rand(0, (count($options) - 1));
            $wt = rand(0, (count($request->winning_time) - 1));

            $take_profit = floor(rand($request->min_take_profit, $request->max_take_profit));
            $stop_loss = floor(rand($request->min_stop_loss, $request->max_stop_loss));

            $action = $options[$r];
            $symbols = $request->symbols[$k];
            $winning_time = $request->winning_time[$wt];

            $assets = CoinPair::find($symbols);

            try {
                $new_asset = $rates->{strtolower($assets->fromsym)};
            } catch (\Exception $e) {

                return back()->with('alert', $e->getMessage());

                // dd( $e );
            }

            $min_quantity = ($amount / $rates->{$request->curreny_user}->value) * $new_asset->value;

            if ($min_quantity == null) {
                break;
            }

            //get base from posted rates.. and return a quantity
            $res = TradePrediction::create([
                'user_id' => $request->user_id,
                'trade_type' => $request->trade_type !== null ? 'live' : 'demo',
                'take_profit' => $take_profit,
                'stop_loss' => $stop_loss,
                'user_id' => $request->user_id,
                'trade_amount' => $amount,
                'min_quantity' => round($min_quantity, 3),
                'trade_action' => $action,
                'is_used'   => false,
                'trade_symbols' => $symbols,
                'win_time'  => $winning_time
            ]);
        }
        if ($res) {
            return back()->with('success', 'Predictions Generated!');
        } else {
            return back()->with('alert', 'Problem With Generating Predictions');
        }
    }

    public function showPredictions($status = 'live',  $user_id)
    {
        $data['page_title'] = 'Show ' . $status . ' predictions for ' . User::find($user_id)->name;
        $data['predictions'] = TradePrediction::whereIsUsed(0)->whereUserId($user_id)->whereTradeType($status)->latest()->paginate(30);
        $data['status'] = $status;
        $data['user_id'] = $user_id;

        $data['predicted_all'] = "";

        foreach ($data['predictions'] as $prediction) {
            $data['predicted_all'] .= $prediction->tradeSymbol->fromsym . '-' . $prediction->tradeSymbol->tosym .  ' | ' .  ucwords($prediction->trade_action)  .  ' | Contracts.: ' .  $prediction->min_quantity . '| TP.: ' . $prediction->take_profit .  ' | SL.: ' . $prediction->stop_loss . "\n";
        }

        // dd($data['predictions']);

        return view('admin.users.showprediction', $data);
    }

    public function deletePredictions(Request $request)
    {
        try {
            $this->validate($request, [
                'prediction' => 'required'
            ]);
    
    
            if ($request->has('trade')) {
    
                $rates = json_decode($request->rates);
    
                $success_count = 0;
                $message = "";
                $user = null;
                // dd($request->prediction);
                foreach ($request->prediction as $prediction) {
    
                    $today = (new DateTime('Europe/London'))->setTime(0, 0);
    
                    $signal = TradePrediction::find($prediction);
                    if (!$signal) {
                        return back()->with('alert', 'Prediction not found.');
                    }
    
                    $wallet = Wallet::whereUserId($signal->user_id)->whereIsDefault(1)->first();
    
                    $user = User::find($signal->user_id);
    
                    $coinpair = CoinPair::find($signal->trade_symbols);
    
                    // whereFromsym( $pairs[0] )->whereTosym( $pairs[1])->first();
    
                    try {
                        $currency_equi = $rates->{strtolower($user->ccy->code)};
                    } catch (\Exception $e) {
                        $currency_equi = $rates->usd;
                    }
    
                    try {
                        $wallet_rate = $rates->{strtolower($wallet->symbol)};
                    } catch (\Exception $e) {
                        $wallet_rate = $rates->btc;
                    }
    
    
                    try {
                        $fromPrice = $rates->{strtolower($coinpair->fromsym)};
                        $toPrice = $rates->{strtolower($coinpair->tosym)};
                    } catch (\Exception $e) {
                        $fromPrice = $rates->btc;
                        $toPrice = $rates->btc;
                    }
    
                    $price = ($toPrice->value / $fromPrice->value);
                    //from price and to price
    
    
                    $trade_currency = strtolower($coinpair->tosym);
                    try {
                        DB::beginTransaction();
    
                        if ($user->userplan != null && $user->userplan->is_paid) {
                            if ($user->plan == 1)
                                $max = 70;
                            elseif ($user->plan == 2)
                                $max = 35;
                            elseif ($user->plan == 3)
                                $max = 10;
                            elseif ($user->plan == 4)
                                $max = 3;
                        } else {
                            $max = 70;
                        }
    
    
    
                        $total_leverage = $max;
    
                        $total_leverage = ($total_leverage > 99) ? $max : (($total_leverage < 3) ? $max : $total_leverage);
    
                        $total_qty_price = ($price * $signal->min_quantity);
    
                        $total_margin = $total_qty_price * ($total_leverage / 100);
    
                        $total_value = ($total_margin * (100 / $total_leverage));
    
                        $amount_value_user_currency = ($total_margin / $toPrice->value) * $currency_equi->value;
                        $amount_margin_user_currency = ($total_value / $toPrice->value) * $currency_equi->value;
    
                        // dump($total_margin);
                        // dump($total_value);
                        // dump($amount_margin_user_currency);                
                        // dump($amount_value_user_currency);
                        // dump($signal->min_quantity);
    
    
                        // $wallet_coin_amount = ($amount_margin_user_currency) / $currency_equi->value;
    
    
                        // $wallet_amount = ($amount_margin_user_currency / $rates->{strtolower($user->ccy->code)}->value ) * $wallet_rate->value;
                        $wallet_amount = floatval($amount_margin_user_currency);
    
    
                        // $wallet_currency = ($wallet->balance * $rates->{strtolower($user->ccy->code)}->value) / $wallet_rate->value;
    
                        if ($signal->trade_type == 'live') {
                            if ($wallet_amount > $wallet->balance) {
                                $message = "You do not have enough balance in your live account";
                                continue;
                            } else {
                                $wallet->balance  -=  floatval($wallet_amount);
                            }
                        } else {
                            if ($wallet_amount > $wallet->balance_demo) {
                                $message = "You do not have enough balance in your demo account";
                                continue;
                            } else {
                                $wallet->balance_demo  -=  floatval($wallet_amount);
                            }
                        }
    
    
                        $wallet->save();
    
    
    
                        $newTrade = new TradeHistory;
    
                        $newTrade->trade_id =  strtoupper(Str::random(10));
                        $newTrade->user_id = $signal->user_id;
                        $newTrade->symbols = $signal->trade_symbols;
                        $newTrade->wallet_id = $wallet->id;
                        $newTrade->wallet_debit = $wallet_amount;
                        $newTrade->trade_action = $signal->trade_action;
                        $newTrade->trade_type = $signal->trade_type;
                        $newTrade->profit_loss = '0.00';
                        $newTrade->leverage = $total_leverage;
                        $newTrade->price =  $price;
                        $newTrade->close_price = '0.00';
                        $newTrade->position_status = 'open';
                        $newTrade->trade_value = $total_value;
                        $newTrade->trade_margin = $total_margin;
                        $newTrade->amount_value_user_currency = $amount_value_user_currency;
                        $newTrade->amount_margin_user_currency = $amount_margin_user_currency;
                        $newTrade->trade_currency = $trade_currency;
                        $newTrade->user_currency = strtolower($user->ccy->code);
                        $newTrade->quantity = $signal->min_quantity;
                        $newTrade->stop_loss = floatval($signal->stop_loss);
                        $newTrade->take_profit = floatval($signal->take_profit);
                        $newTrade->executed_by = $user->name;
                        $newTrade->to_verdict = 'to_win';
                        $newTrade->start_time = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();
                        $newTrade->end_time = Carbon::now(new DateTimeZone('Europe/London'))->addDays(7)->toDateTimeString();
                        $newTrade->end_reason = 'pretrade';
                        $newTrade->win_time = $signal->win_time == null ? 0 : $signal->win_time;
    
                        $newTrade->save();
    
                        //create a transaction log for the live account
                        if ($request->trade_type == "live") {
                            $tlog['user_id'] = $user->id;
                            $tlog['trx'] =  str_random(16);
                            $tlog['amount'] = $signal->trade_amount;
                            // $tlog['coin_amount'] = $wallet_coin_amount;
                            // $tlog['wallet_id'] = $wallet->id;
                            $tlog['post_balance'] = $wallet->balance;
                            $tlog['trx_type'] = '-';
                            $tlog['currency'] = $wallet->symbol;
                            // $tlog['title'] = $wallet->symbol .' debited with '. $wallet_coin_amount. $wallet->symbol;
                            // $tlog['trans_type'] = 'debit';
                            $tlog['details'] = $wallet->symbol . ' wallet debited with ' . $wallet_amount . $wallet->symbol . ' for trade position id:' . $newTrade->trade_id;
                            Transaction::create($tlog);
                        }
    
    
                        $signal->is_used = true;
                        $signal->save();
                        DB::commit();
                    } catch (\Exception $e) {
                        DB::rollBack();
                        Log::error('Error in deletePredictions: ' . $e->getMessage());
                        return back()->with('alert', $e->getMessage());
                    }
    
                    $success_count =  $success_count + 1;
                }
                // Log::error(json_encode([
                //     'action'    => 'Trade Generation',
                //     'source'    => 'admin',
                //     'user_id'   => $user ? $user?->id : 0,
                //     'message'   => $message ?: "Successfully executed.",
                //     'count'     => $success_count
                // ]));
    
                if ($success_count <= 0 && !empty($message)) {
                    return back()->with('alert', $message);
                }
                if ($success_count > 0 && (count($request->prediction) != $success_count)) {
                    return back()->with('alert', 'Some trade are not executed. Please check your account available amount.');
                }
    
                return back()->with('success', $success_count . ' trades executed successfully');
            }
    
            if ($request->has('delete')) {
                $res = TradePrediction::whereIn('id', $request->prediction)->delete();
    
                if ($res) {
                    return back()->with('success', 'Predictions Deleted!');
                } else {
                    return back()->with('alert', 'Problem With Deleting Predictions');
                }
            }
        } catch (\Exception $e) {
            Log::error('Error in deletePredictions: ' . $e->getMessage());
        
            return back()->with('alert', $e->getMessage());
        }
    }

    public function userManageLicense($user_id)
    {
        $user = User::find($user_id);
        $data['page_title'] = "Trade Position for " . $user->name;

        $data['user'] = $user;

        $data['license'] = UserLicense::whereUserId($user_id)->first();

        return view('admin.users.manage-licenses', $data);
    }

    public function userGenerateLicense(Request $request, $user_id)
    {

        $request->validate([
            'license_prefix' => 'required|min:2|max:4',
            'license_number' => 'required|numeric'
        ]);

        //remove existing licenses for user
        UserLicense::whereUserId($user_id)->delete();
        $license_keys = [];
        //generate licenses...
        for ($i = 0; $i <= $request->license_number; $i++) {
            $license_keys[] = $request->license_prefix . strtoupper(Str::random(8));
        }

        $license_settings = [
            'prompt' => 'no_prompt',
            'prompt_interval' => '0',
            'prompt_access' => 'none'
        ];

        //insert new
        $newLicense = new UserLicense;
        $newLicense->user_id = $user_id;
        $newLicense->license_keys = $license_keys;
        $newLicense->license_settings = $license_settings;
        $newLicense->status = 0;
        $newLicense->last_prompted = null;

        if ($newLicense->save()) {
            return back()->with('success', 'Licenses generated for user!');
        } else {
            return back()->with('alert', 'Could not generate licenses at the moment');
        }
    }

    public function userUpdateLicensePrompt(Request $request, $user_id)
    {
        $licenses = UserLicense::whereUserId($user_id)->first();
        if ($licenses == null) {
            return back()->with('alert', 'Generate a License for this user to effect this change.');
        }
        if ($request->message !== null) {
            $licenses->message = $request->message;
        }

        if ($request->license_prompt != 'none') {
            $license_settings = [
                'prompt' => $request->license_prompt,
                'prompt_interval' => '0',
                'prompt_access' => $request->prompt_access
            ];
            $licenses->license_settings = $license_settings;
        } else {
            $license_settings = [
                'prompt' => 'no_prompt',
                'prompt_interval' => '0',
                'prompt_access' => 'none'
            ];
            $licenses->license_settings = $license_settings;
        }

        if ($licenses->save()) {

            $user = User::find($user_id);
            $user->is_license_prompt = $request->license_prompt == "none" ? 0 : 1;
            $user->save();
            return back()->with('success', 'License Status updated!');
        } else {
            return back()->with('alert', 'Could not update license status at the moment');
        }
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

    public function pendAccountMessage(Request $request, $user_id)
    {
        $request->validate([
            'pend_message' => 'required'
        ]);

        $mac = User::find($user_id);
        $mac->is_pend = 1;
        $mac->pend_message = $request->pend_message;
        $res = $mac->save();

        if ($res) {
            return back()->with('success', ' Pending added to User Successfully!');
        } else {
            return back()->with('alert', 'Problem adding Pending Status');
        }
    }

    public function unpendAccount($user_id)
    {
        $mac = User::find($user_id);
        $mac->is_pend = 0;
        $res = $mac->save();

        if ($res) {
            return back()->with('success', ' Pending removed Successfully!');
        } else {
            return back()->with('alert', 'Problem removing Pending Status');
        }
    }

    public function deactivateWithdrawal(Request $request, $user_id)
    {
        $request->validate([
            'pend_withdrawal_message' => 'required'
        ]);

        $mac = User::find($user_id);
        $mac->pend_withdraw = 1;
        $mac->pend_withdraw_message = $request->pend_withdrawal_message;
        $res = $mac->save();

        if ($res) {
            return back()->with('success', ' Withdrawal Deactivated for this User Successfully!');
        } else {
            return back()->with('alert', 'Problem deactivating user withdrawal status');
        }
    }


    public function activateWithdrawal($user_id)
    {
        $mac = User::find($user_id);
        $mac->pend_withdraw = 0;
        $mac->pend_withdraw_message = "";
        $res = $mac->save();

        if ($res) {
            return back()->with('success', ' Withdrawal activated Successfully!');
        } else {
            return back()->with('alert', 'Problem activating withdrawal Status');
        }
    }

    public function userTrans($id)
    {
        $user = User::find($id);
        $page_title = "$user->username - All Transaction";
        $deposits = Transaction::whereUser_id($id)->paginate(30);
        return view('admin.users.user-trans', compact('deposits', 'page_title'));
    }

    public function userDeposit($id)
    {
        $user = User::find($id);
        $page_title = "$user->username - All Deposit";
        // $deposits = Deposit::whereUser_id($id)->where('proof', '<>', null)->latest()->paginate(30);
        $deposits = Deposit::whereUser_id($id)->where('status', 1)->latest()->paginate(30);
        return view('admin.users.user-deposit-log', compact('deposits', 'page_title', 'user'));
    }

    public function userPendingDeposit($id)
    {
        $user = User::find($id);
        $page_title = "$user->username - All Pending Deposits";
        $deposits = Deposit::whereUser_id($id)->where('status', 2)->latest()->paginate(30);
        return view('admin.users.user-pending-deposit-log', compact('deposits', 'page_title', 'user'));
    }

    public function delete($deposit)
    {
        Deposit::destroy($deposit);
        return back()->with('success', 'Deposit Deleted Successfully!');
    }

    public function approve(Request $request, $id)
    {
        $deposit = Deposit::findorFail($id);

        $basic = GeneralSetting::first();

        $deposit['status'] = 1;
        $deposit->save();

        $user = User::find($deposit['user_id']);
        // $user['balance'] = $user->balance + $deposit['amount'];
        // $user->save();

        $wallet = Wallet::where('user_id', $user->id)->whereSymbol($deposit['method_currency'])->first();

        if ($wallet == null) {
            $wallet = Wallet::create([
                'user_id' => $user->id,
                'balance' => $deposit['final_amo'],
                'symbol' => $deposit['method_currency'],
                'balance_demo' => '0.00',
                'is_default' =>  0,
            ]);
        } else {
            $wallet->balance = $wallet->balance + $deposit['final_amo'];
            $wallet->save();
        }


        if ($user->refid != 0) {
            //     $pack = Package::first();
            //     $gnl= General::first();
            //    $refer = User::find($user->refid);
            //    $coms = ($gnl->refcom*$deposit['btc_amount'])/100;
            //    $refer['balance'] = $refer->balance + $coms;
            //    $refer->save();

            //     $rlog['user_id'] = $refer->id;
            //    $rlog['trxid'] = str_random(16);
            //    $rlog['amount'] = $coms;
            //    $rlog['balance'] = $refer->balance;
            //    $rlog['type'] = 1;
            //    $rlog['details'] = 'Referal Commision';
            //    Translog::create($rlog);
        }

        $tlog['user_id'] = $user->id;
        $tlog['trx'] =  $deposit['trx_id'];
        $tlog['amount'] = $deposit['currency_amount'];
        //    $tlog['coin_amount'] = $deposit['coin_amount'];
        //    $tlog['wallet_id'] = $deposit['wallet_id'];
        $tlog['post_balance'] = $wallet->balance;
        $tlog['currency'] = $wallet->symbol;
        $tlog['trx_type'] = '+';
        //    $tlog['title'] = 'Deposit of '. $deposit['coin_amount']. $deposit['coin_code'] . ' successful.' ;
        //    $tlog['trans_type'] = 'deposit';
        $tlog['details'] = 'Deposit of ' . $deposit['currency_amount'] . $deposit['method_currency'] . ' into ' . $wallet->symbol . ' successful.';

        Transaction::create($tlog);

        $msg =  'Your Deposit has been processed successfully.';

        $txt = $msg . '<br>Your ' . $wallet->symbol . ' wallet  has been credited with ' . $deposit['currency_amount'] . $deposit['method_currency'];

        if ($basic->email_notification) {
            try {
                notify($user, 'SEND_MAIL', [
                    'site_name' => getNotify()->site_name,
                    'subject' => $deposit['currency_amount'] . $deposit['method_currency']  . ' deposit processed',
                    'message' => $txt,
                    'username' => $user->username
                ], ['email']);
            } catch (Throwable $e) {
                $notify[] = ['warning', 'Mail Not Properly Set'];
            }
        }

        // $msg2 = "A deposit of " . $deposit['currency_amount']. $deposit['method_currency'] . " was just approved for client " . $user->name;

        // send_email('alertme@trademycapital.com', 'RussBillions',  $deposit['coin_amount']. $deposit['coin_code']. ' New ' . $deposit['coin_amount']. $deposit['coin_code'] . ' Deposit', $msg2);

        return back()->with('success', 'Deposit Request Approved Successfully!');
    }

    public function correctDeposit($user_id)
    {
        $deposits = Deposit::whereUser_id($user_id)->whereStatus(1)->latest()->get();

        $num = 0;

        foreach ($deposits as $deposit) {

            if ($deposit->amount == 0) {

                // $deposit->coin_amount = floatval($deposit->coin_amount);
                // $coin_amount =  $deposit->coin_amount;

                $deposit->amount = floatval($deposit->amount);
                $newDate = strstr(date(DATE_W3C, strtotime($deposit->created_at)), '+', true);

                $newDate = $newDate . '.0000000Z';


                $ch = curl_init();

                // set url
                curl_setopt($ch, CURLOPT_URL, "https://rest.coinapi.io/v1/exchangerate/" . strtoupper($deposit->symbol) . '/' . strtoupper($deposit->method_currency));

                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'X-CoinAPI-Key: 7E4C1B5B-6073-4FA1-B78B-3EA98E0BC0F3'
                ));

                //return the transfer as a string
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                // $output contains the output string
                $response = curl_exec($ch);

                // close curl resource to free up system resources
                curl_close($ch);

                try {
                    $result  = json_decode($response);
                    //   dd($result);

                } catch (\Exception $ex) {
                    echo $ex->getMessage();
                    exit;
                }

                $fiat = $result->rate * $deposit->amount;


                $deposit->final_amo = number_format($fiat, 2);


                if ($deposit->save()) {
                    $num += 1;
                }
            }
        }


        return back()->with('success', $num . ' fixed and saved!');
    }


    public function userWithdraw($id)
    {
        $user = User::find($id);
        $page_title = "$user->username - All Withdraw Request";

        $deposits = Withdrawal::whereUser_id($id)->latest()->paginate(30);
        return view('admin.users.user-withdraw', compact('deposits', 'page_title'));
    }

    public function executeTrade(Request $request, $user_id)
    {

        $rates = json_decode($request->rates);

        $pairs = explode('-', $request->product_id);

        $coinpair = CoinPair::whereFromsym($pairs[0])->whereTosym($pairs[1])->first();

        $today = (new DateTime('Europe/London'))->setTime(0, 0);

        $user = User::find($user_id);

        if ($user->is_pend) {
            return response(['Pending' => 'Account is currently Pending! Contact Helpdesk'], 422)->header('Content-Type', 'application/json');
        }

        if ($request->trade_type == 'live') :

            $userPlan = PlanLog::whereUserId($user_id)->first();

            if (!$userPlan->is_paid && $userPlan->previous_pricing_plan == null) {
                return response(['Plan' => 'User\'s Account Type is currently not active! Credit with the minimum deposit required for the account type to continue trading!'], 422)->header('Content-Type', 'application/json');
            }

            $recordLimits = TradeLimits::whereUserId($user_id)->first();

            if ($recordLimits == null) {
                $recordLimits = new TradeLimits;
                $recordLimits->user_id = $user_id;
                $recordLimits->trades = 1;
                $recordLimits->save();
            } else {
                if ($today->format('Y-m-d H:i:s') > $recordLimits->updated_at) {
                    $recordLimits->user_id = $user_id;
                    $recordLimits->trades = 1;
                    $recordLimits->save();
                } else {
                    $recordLimits->user_id = $user_id;
                    $recordLimits->trades = $recordLimits->trades + 1;
                    $recordLimits->save();
                }

                if ($userPlan->currentplan->trade_limit != 0 && ($recordLimits->trades > $userPlan->currentplan->trade_limit)) {
                    return response(['Limit' => 'User\'s daily Trade Limits! Upgrade your Account Type'], 422)->header('Content-Type', 'application/json');
                }
            }
        endif;

        if ($request->prediction == null) {
            $win_time = 0;
            $result = false;
        } else {

            $win_time = $request->winning_time;

            $result = true;
        }


        $profile = User::find($user_id);

        $wallet = Wallet::whereUserId($user_id)->whereIsDefault(1)->first();

        try {
            $currency_equi = $rates->{strtolower($profile->ccy->code)};
        } catch (\Exception $e) {
            $currency_equi = $rates->usd;
        }

        try {
            $wallet_rate = $rates->{strtolower($wallet->symbol)};
        } catch (\Exception $e) {
            $wallet_rate = $rates->btc;
        }

        $amount  = floatval($request->amount_margin_user_currency);
        $wallet_amount = $amount;
        // $wallet_amount = ($amount / $rates->{strtolower($profile->ccy->code)}->value ) * $wallet_rate->value;

        if ($request->trade_type == "live") {

            $wallet_currency = ($wallet->balance * $rates->{strtolower($profile->ccy->code)}->value) / $wallet_rate->value;

            if ($wallet_amount > $wallet->balance) {
                return response(['Amount' => 'Required margin ' . $profile->ccy->symbol . number_format($amount, $profile->ccy->decimal_digits) . ' is Larger Then Users Current wallet ' . $profile->ccy->symbol . number_format($wallet_currency, $profile->ccy->decimal_digits)], 422)->header('Content-Type', 'application/json');
            } else {

                $wallet->balance  -=  floatval($wallet_amount);
            }

            // $balance = (($wallet->balance * $currency_equi->value)/ $wallet_rate->value);
            $balance = $wallet->balance;

            $balance_fmt = number_format($balance, $profile->ccy->decimal_digits);
        }

        $wallet->save();


        $newTrade = new TradeHistory;

        $newTrade->trade_id =  strtoupper(Str::random(10));
        $newTrade->user_id = $user_id;
        $newTrade->wallet_debit = $wallet_amount;
        $newTrade->symbols = $coinpair->id;
        $newTrade->wallet_id = $wallet->id;
        $newTrade->trade_action = $request->trade_action;
        $newTrade->trade_type = $request->trade_type;
        $newTrade->profit_loss = '0.00';
        $newTrade->leverage = $request->leverage_input;
        $newTrade->price =  $request->price;
        $newTrade->close_price = '0.00';
        $newTrade->position_status = 'open';
        $newTrade->trade_value = $request->trade_amount_value;
        $newTrade->trade_margin = $request->trade_amount_margin;
        $newTrade->amount_value_user_currency = $request->amount_value_user_currency;
        $newTrade->amount_margin_user_currency = $request->amount_margin_user_currency;
        $newTrade->trade_currency = $request->trade_currency;
        $newTrade->user_currency = strtolower($profile->ccy->code);
        $newTrade->quantity = $request->quantity;
        $newTrade->stop_loss = floatval($request->stop_loss);
        $newTrade->take_profit = floatval($request->take_profit);
        $newTrade->executed_by = Auth::user()->name;
        $newTrade->to_verdict = (($result == false) ? 'to_loss' :  'to_win');
        $newTrade->start_time = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();
        $newTrade->end_time = Carbon::now(new DateTimeZone('Europe/London'))->addDays(7)->toDateTimeString();
        $newTrade->end_reason = 'pretrade';
        $newTrade->win_time = $win_time;

        $newTrade->save();

        //create a transaction log for the live account
        if ($request->trade_type == "live") {
            $tlog['user_id'] = $user_id;
            $tlog['trx'] =  $newTrade->trade_id;
            $tlog['amount'] = $amount;
            // $tlog['coin_amount'] = $wallet_amount;
            // $tlog['wallet_id'] = $wallet->id;
            $tlog['post_balance'] = $wallet->balance;
            $tlog['trx_type'] = '-';
            $tlog['currency'] = $wallet->symbol;
            // $tlog['title'] = $wallet->gateway->name .' debited with '. $wallet_amount. $wallet->gateway->code;
            // $tlog['trans_type'] = 'debit';
            $tlog['details'] = $wallet->symbol . ' wallet debited with ' . $wallet_amount . $wallet->symbol . ' for trade position id:' . $newTrade->trade_id;
            Transaction::create($tlog);
        }


        $message = 'New ' . ucwords($request->trade_action) . ' Position opened for ' . $request->product_id . ' at ' . $request->price . ' for ' . $profile->ccy->symbol . number_format($request->amount_margin_user_currency, $profile->ccy->decimal_digits);

        //if autotrader... mark as saved trade
        if ($request->save_trade_id != null) {
            UserSavedTrades::whereId($request->save_trade_id)->delete();
        }

        $nowTime = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();

        $positions_count = TradeHistory::whereUserId($user_id)->whereTradeType($request->trade_type)->wherePositionStatus('open')->where('end_time', '>', $nowTime)->count();

        return response([
            'status' => 'success',
            'message' => $message,
            'positions' => $positions_count,
        ], 200)->header('Content-Type', 'application/json');
    }


    public function closeTradeApi(Request $request)
    {
        $rates = (object)$request->rates;

        $profile = Auth::user();

        $tradeHistory = TradeHistory::whereUserId(Auth::user()->id)->whereId($request->_payload['id'])->first();

        $tradeHistory->end_reason = 'user';
        $tradeHistory->position_status = 'close';

        $tradeHistory->stop_time = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();

        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();

        try {
            $currency_equi = $rates->{strtolower($profile->ccy->iso_name)};
        } catch (\Exception $e) {
            $currency_equi = $rates->usd;
        }

        try {
            $wallet_rate = $rates->{strtolower($wallet->gateway->code)};
        } catch (\Exception $e) {
            $wallet_rate = $rates->btc;
        }


        if ($tradeHistory->trade_type == 'live') {

            $user_margin = $rates->{strtolower($request->_payload['user_currency'])};

            $trade_royalties = (floatval($request->_payload['amount_margin_user_currency']) + floatval($request->_payload['profit_loss_user']));

            $amount_in_wallet_rate = (floatval($request->_payload['amount_margin_user_currency']) / $user_margin['value']) * $wallet_rate['value'];

            $user_curr_slug = strtolower($tradeHistory->user_currency);

            $profit_loss = (floatval($request->_payload['profit_loss_user']) / $user_margin['value']) * $wallet_rate['value'];

            $wallet_amount =  floatval($tradeHistory->wallet_debit) + $profit_loss;

            //update closing values
            $tradeHistory->profit_loss = $profit_loss;

            $tradeHistory->profit_loss_user = floatval($request->_payload['profit_loss_user']);

            $wallet->balance += $wallet_amount;

            $wallet->save();

            $tradeHistory->save();

            $tlog['user_id'] = Auth::user()->id;
            $tlog['trx'] =  str_random(16);
            $tlog['currency_amount'] = $trade_royalties;
            $tlog['coin_amount'] = $wallet_amount;
            $tlog['wallet_id'] = $wallet->id;


            $tlog['balance'] = $wallet->balance;
            $tlog['type'] = '+';
            $tlog['title'] = $wallet->gateway->name . ' credited with ' . $wallet_amount . $wallet->gateway->code;
            $tlog['trans_type'] = 'credit';
            $tlog['details'] = $wallet->gateway->name . ' wallet credited with ' . $wallet_amount . $wallet->gateway->code . ' for trade position id:' . $tradeHistory->trade_id;
            Transaction::create($tlog);
        }


        if ($tradeHistory->trade_type == 'demo') {

            $user_margin = $rates->{strtolower($request->_payload['user_currency'])};

            $trade_royalties = ($request->_payload['amount_margin_user_currency'] + $request->_payload['profit_loss_user']);

            $amount_in_wallet_rate = ($request->_payload['amount_margin_user_currency'] / $user_margin['value']) * $wallet_rate['value'];


            $trade_royalties =  ($tradeHistory->amount_margin_user_currency + floatval($request->_payload['profit_loss_user']));


            $user_curr_slug = strtolower($tradeHistory->user_currency);


            $profit_loss = ($request->_payload['profit_loss_user'] / $user_margin['value']) * $wallet_rate['value'];


            $wallet_amount =  floatval($tradeHistory->wallet_debit) + $profit_loss;


            $tradeHistory->profit_loss = $profit_loss;

            $tradeHistory->profit_loss_user = $request->_payload['profit_loss_user'];

            //  dd($wallet_amount);
            $wallet->balance_demo += $wallet_amount;

            $wallet->save();

            $tradeHistory->save();
        }

        $tradeHistory->save();

        $wallet->save();

        $nowTime = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();

        $positions = TradeHistory::whereUserId(Auth::user()->id)->wherePositionStatus('open')->whereTradeType($tradeHistory->trade_type)->whereWalletId($wallet->id)->where('end_time', '>', $nowTime)->count();

        $position_assets = TradeHistory::whereUserId(Auth::user()->id)->wherePositionStatus('open')->whereWalletId($wallet->id)->whereTradeType($tradeHistory->trade_type)->where('end_time', '>', $nowTime)->get();
        $check_assets = [];
        $final_assets = [];
        foreach ($position_assets as $asset) {
            $asset_append = [
                "id"    => $asset->sym->fromsym . "-" . $asset->sym->tosym,
                "label" => $asset->sym->pair_name
            ];
            if (!in_array($asset_append, $check_assets)) {
                $final_assets[] = $asset_append;
                $check_assets[] = $asset_append;
            }
        }

        if ($tradeHistory->trade_type == "live") {

            $balance = (($wallet->balance * $currency_equi['value']) / $wallet_rate['value']);

            $balance_fmt = number_format($balance, $profile->ccy->decimal_digits);
        } elseif ($tradeHistory->trade_type == "demo") {

            $balance = (($wallet->balance_demo * $currency_equi['value']) / $wallet_rate['value']);

            $balance_fmt = number_format($balance, $profile->ccy->decimal_digits);
        }


        $message = ucwords($tradeHistory->trade_action) . " position for " . $tradeHistory->sym->pair_name . " with ID " . strtoupper($tradeHistory->trade_id) . " successfully closed!";

        $margin_used = TradeHistory::whereUserId(Auth::user()->id)->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($tradeHistory->trade_type)->where('end_time', '>', $nowTime)->sum('amount_margin_user_currency');

        return response()->json([
            'status' => true,
            'positions' => $positions,
            'message' => $message,
            'position_assets' => $final_assets,
            'margin_used' => $profile->ccy->symbol . number_format($margin_used, $profile->ccy->decimal_digits),
            'balance' => $balance,
            'balance_fmt' => $profile->ccy->symbol . $balance_fmt
        ]);
    }

    public function tradeHistoryUser($user_id)
    {
        $user = User::find($user_id);
        $wallet = Wallet::whereUserId($user_id)->whereIsDefault(1)->first();
        $trade_type = "live";
        $data['user'] = $user;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.coingecko.com/api/v3/exchange_rates');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $_rates = json_decode(curl_exec($ch));
        $server_rates = $_rates->rates ?? 0;
        curl_close($ch);
        $data['rates'] = $server_rates;
        $data['history'] = TradeHistory::whereUserId($user_id)->where('trade_type', $trade_type)->whereWalletId($wallet->id)->wherePositionStatus('open')->latest()->paginate(30);
        // dd($data['history']);
        $data['mycurrency'] = $user->ccy;
        return view('admin.users.live-history', $data);
    }

    public function confirmTradePositionClose(Request $request, $user_id)
    {

        $tradeHistory = TradeHistory::find($request->history_id);

        return response()->json($tradeHistory, 200);
    }

    public function closeTradePosition(Request $request, $user_id)
    {

        $request->validate([
            'rates' => 'required'
        ]);
        $rates = (object)json_decode($request->rates);


        $tradeHistory = TradeHistory::whereUserId($user_id)->whereId($request->history_id)->first();


        $tradeHistory->end_reason = 'user';
        $tradeHistory->position_status = 'close';

        $tradeHistory->stop_time = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();
        $tradeHistory->save();


        $wallet = Wallet::whereUserId($user_id)->whereIsDefault(1)->first();

        //    try{
        //        $currency_equi = $rates->{strtolower($user->ccy->name)};
        //    }catch( \Exception $e ){
        //         $currency_equi = $rates->usd;           
        //    }

        try {
            $wallet_rate = $rates->{strtolower($wallet->symbol)};
        } catch (\Exception $e) {
            $wallet_rate = $rates->btc;
        }


        $user_margin = $rates->{strtolower($tradeHistory->user_currency)};


        $profit_loss = ($tradeHistory->profit_loss_user / $user_margin->value) * $wallet_rate->value;

        $wallet_amount =  floatval($tradeHistory->wallet_debit) + $profit_loss;

        $wallet->balance += $wallet_amount;

        $trade_converted = ($wallet_amount * $user_margin->value) / $wallet_rate->value;

        $user_curr_slug = strtolower($tradeHistory->user_currency);


        $tlog['user_id'] = Auth::user()->id;
        $tlog['trx'] =  str_random(16);
        $tlog['amount'] = $trade_converted;
        // $tlog['coin_amount'] = $wallet_amount;
        // $tlog['wallet_id'] = $wallet->id;
        $tlog['post_balance'] = $wallet->balance;
        $tlog['trx_type'] = '+';
        $tlog['currency'] = $wallet->symbol;

        // $tlog['title'] = $wallet->symbol .' credited with '. $wallet_amount. $wallet->symbol;
        // $tlog['trans_type'] = 'credit';
        $tlog['details'] = $wallet->symbol . ' wallet credited with ' . $wallet_amount . $wallet->symbol . ' for trade position id:' . $tradeHistory->trade_id;
        Transaction::create($tlog);

        $wallet->save();

        $message = ucwords($tradeHistory->trade_action) . " position for " . $tradeHistory->sym[0]->name . " with ID " . strtoupper($tradeHistory->trade_id) . " successfully closed!";


        $notifications = array('message' => $message, 'alert-type' => 'success');

        return back()->with($notifications);
    }

    public function deleteTradePosition(Request $request, $user_id)
    {

        $tradeHistory = TradeHistory::find($request->id);

        $userWallet = Wallet::find($tradeHistory->wallet_id);

        $transaction = Transaction::whereTrx($tradeHistory->trade_id)->whereUserId($user_id)->first();

        if ($tradeHistory != null) {
            $tradeHistory->delete();
        }

        if ($transaction != null) {
            $transaction->delete();
            $notifications = array('message' => 'Transaction deleted successfully!', 'alert-type' => 'success');
        } else {
            $notifications = array('message' => 'Transaction could not be deleted', 'alert-type' => 'alert');
        }


        return back()->with($notifications);
    }


    public function userPasschange(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate(
            $request,
            [
                'password' => 'required|string|min:5|confirmed'
            ]
        );
        if ($request->password == $request->password_confirmation) {
            $user->password = bcrypt($request->password);
            $user->save();
            $msg = 'Password Changed By Admin. New Password is: ' . $request->password;
            // send_email($user->email, $user->username, 'Password Changed', $msg);

            try {
                notify($user, 'SEND_MAIL', [
                    'site_name' => getNotify()->site_name,
                    'subject' => 'Password Changed',
                    'message' => $msg,
                    'username' => $user->username
                ], ['email']);
            } catch (Throwable $e) {
                $notify[] = ['warning', 'Mail Not Properly Set'];
            }

            $notification = array('message' => 'Password Changed', 'alert-type' => 'success');
            return back()->with($notification);
        } else {
            $notification = array('message' => 'Password Not Matched', 'alert-type' => 'warning');
            return back()->with($notification);
        }
    }

    public function profitRange(Request $request, $user)
    {

        $userObj = User::find($user);
        $userObj->trade_booster = $request->trade_booster;

        if ($userObj->save()) {
            return back()->with('success', 'Profit Range set successfully!');
        }

        return back()->with('error', 'User Deleted successfully!');
    }

    public function updateDefaultWallet(Request $request, $user)
    {

        $getDefault = Wallet::whereUserId($user)->whereIsDefault(1)->first();
        $getDefault->is_default = 0;
        $getDefault->save();


        $userWallet = Wallet::whereUserId($user)->whereId($request->wallet)->first();
        $userWallet->is_default = 1;
        $userWallet->save();


        if ($userWallet) {
            return back()->with('success', 'Default Wallet Updated!');
        } else {
            return back()->with('alert', 'Problem With Updating Default Wallet');
        }
    }

    public function userFixTrade($user_id)
    {

        //fix page... fix all deposits unfixed

        $user = User::find($user_id);

        $data['user'] = $user;

        $data['page_title'] = "Trade Position for " . $user->name;

        $data['user'] = $user;

        $data['mycurrency'] = $mycurrency = $user->ccy;

        $mycurrency_code = strtolower($mycurrency->code);

        $data['wallet'] = $wallet =  Wallet::where('user_id', $user->id)->whereIsDefault(1)->first();

        $data['depositCoinAmountDemo'] = DemoDeposit::whereWalletId($wallet->id)->whereUserId($user->id)->sum('coin_amount');


        $profile = $user;

        try {
            $ch = curl_init();
            // set url
            curl_setopt($ch, CURLOPT_URL, 'https://api.coingecko.com/api/v3/exchange_rates');
            //return the transfer as a string
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // $output contains the output string
            $_rates = json_decode(curl_exec($ch));

            $server_rates = $_rates->rates;
            // close curl resource to free up system resources
            curl_close($ch);
        } catch (\Exception $e) {
            return back()->with('alert', $e->getMessage());
        }

        $output = 1 / floatval($server_rates->{strtolower($profile->ccy->code)}->value);

        $currency_equi = floatval($server_rates->{strtolower($profile->ccy->code)}->value);

        try {

            $coin_amount = floatval($server_rates->{strtolower($wallet->symbol)}->value);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            //use btc as the default if the coin rate generates an error 
            $coin_amount = floatval($server_rates->btc->value);
        }


        $data['coin_amount'] = $coin_amount;

        $data['currency_equi'] = $currency_equi;

        $data['rates'] = $server_rates;

        $data['initialcat'] = TradeCategory::latest()->whereStatus(1)->first();

        $data['tradeCategory'] = TradeCategory::whereStatus(1)->get();

        $data['mycurrency_code'] = $mycurrency_code;

        $data['pairs'] = CoinPair::whereStatus(1)->orderBy('name', 'asc')->get();

        $livetrades = TradeHistory::whereUserId($user->id)->where('trade_type', 'live')->latest()->get();

        return view('admin.users.fixtrade', $data);
    }

    public function approvePlan(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $mac = PlanLog::whereUserId($user_id)->first();
        //check if amount can carry plan
        $mac->status = true;
        $mac->is_paid = true;
        $res = $mac->save();

        if ($res) {
            return back()->with('success', 'Plan for ' . $user->name . ' Approved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Approving Plan');
        }
    }

    public function createPlan()
    {
        $data['page_title'] = 'Add New Plan';
        return view('admin.users.create-plan', $data);
    }

    public function storePlan(Request $request)
    {

        $request->validate(
            [
                'title' => 'required',
                'rate' => 'required|numeric',
                'trade_limit' => 'required',
                'icon' => 'required',
                'details' => 'required'
            ],
            [
                'title.required' => 'Plan Title Must not be empty',
                'rate.required' => 'Plan price must not be empty',
                'rate.numeric' => 'Plan price must be numeric value',
                'icon.required' => 'Plan Icon is required',
            ]
        );
        $basic = GeneralSetting::first();

        // $in = Input::except('_token','details');
        $in = $request->except(['_token', 'details']);
        $in['rate'] = round($request->rate, $basic->decimal);

        $in['details'] = json_encode($request->details);

        $in['status'] = $request->status == 'on' ? '1' : '0';

        $res = PricingPlan::create($in);

        if ($res) {
            return back()->with('success', 'Saved Successfully!');
        } else {
            return back()->with('alert', 'Problem With Adding New Unit');
        }
    }

    public function plans()
    {
        $data['page_title'] = 'All Plan';
        $data['plans'] = PricingPlan::latest()->paginate(20);
        return view('admin.users.plans', $data);
    }


    public function editPlan($id)
    {
        $data['page_title'] = 'Edit Plan';
        $data['plan'] = PricingPlan::find($id);
        return view('admin.users.edit-plan', $data);
    }

    public function updatePlan(Request $request)
    {
        $basic = GeneralSetting::first();


        $data = PricingPlan::find($request->id);
        $request->validate(
            [
                'title' => 'required',
                'rate' => 'required|numeric',
                'trade_limit' => 'required',
                'icon' => 'required',
                'details' => 'required'
            ],
            [
                'title.required' => 'Plan Title Must not be empty',
                'rate.required' => 'Plan rate must not be empty',
                'rate.numeric' => 'Plan rate must be numeric value'
            ]
        );


        // $in = Input::except('_token','details');
        $in = $request->except(['_token', 'details']);
        $in['rate'] = round($request->rate, $basic->decimal);
        $in['details'] = json_encode($request->details);
        $in['status'] = $request->status == 'on' ? '1' : '0';

        $res = $data->fill($in)->save();

        if ($res) {
            return back()->with('success', 'Updated Successfully!');
        } else {
            return back()->with('alert', 'Problem With Updating Plan');
        }

        return $data;
    }
}
