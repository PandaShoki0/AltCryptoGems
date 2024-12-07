<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Extension;
use App\Models\TradeLog;
use App\Models\GeneralSetting;
use App\Models\ScheduledOrders;
use Carbon\Carbon;
use DateTimeZone;
use DateTime;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\TradeHistory;
use App\Models\UserWallet;
use App\Models\CoinPair;
use App\Models\PlanLog;
use App\Models\TradeLimits;
use App\Models\Transaction;
use App\Models\User;
use App\Models\TradePrediction;
use App\Models\UserProfile;
use App\Models\UserSavedTrades;
use Illuminate\Support\Str;
use App\Models\Wallet;

class AdminTradeController extends Controller
{

    public function executeTrade(Request $request)
    {

        $request->validate([
            'quantity' => 'required|numeric'
        ], [
            'quantity.required' => 'Enter a valid amount contracts',
            'quantity.numeric' => 'Amount contracts must be a number'
        ]);

        $rates = json_decode($request->rates);

        $pairs = explode('-', $request->product_id);

        $coinpair = CoinPair::whereFromsym($pairs[0])->whereTosym($pairs[1])->first();

        $today = (new DateTime('Europe/London'))->setTime(0, 0);

        $user = User::find(Auth::user()->id);
        if($user->is_pend) {
            return response(['Pend' => $user->pend_message], 422)->header('Content-Type', 'application/json');   
        }

        if ($request->trade_type == 'live') :
            
            $userPlan = PlanLog::whereUserId(Auth::user()->id)->first();
            
            if (!$userPlan) {
                return response(['Plan' => 'You do not have any plan. Buy a plan first!'], 422)->header('Content-Type', 'application/json');
            }

            if (!$userPlan->is_paid && $userPlan->previous_pricing_plan == null) {
                return response(['Plan' => 'Your Account Type is currently not active! Make the minimum deposit required for the account type to continue trading!'], 422)->header('Content-Type', 'application/json');
            }

            $recordLimits = TradeLimits::whereUserId(Auth::user()->id)->first();

            if ($recordLimits == null) {
                $recordLimits = new TradeLimits;
                $recordLimits->user_id = Auth::user()->id;
                $recordLimits->trades = 1;
                $recordLimits->save();
            } else {
                if ($today->format('Y-m-d H:i:s') > $recordLimits->updated_at) {
                    $recordLimits->user_id = Auth::user()->id;
                    $recordLimits->trades = 1;
                    $recordLimits->save();
                } else {
                    $recordLimits->user_id = Auth::user()->id;
                    $recordLimits->trades = $recordLimits->trades + 1;
                    $recordLimits->save();
                }

                if ($userPlan->currentplan->trade_limit != 0 && ($recordLimits->trades > $userPlan->currentplan->trade_limit)) {
                    return response(['Limit' => 'You have exceeded your daily Trade Limits! To continue trading, Upgrade your Account Type'], 422)->header('Content-Type', 'application/json');
                }
            }
        endif;

        $signal = TradePrediction::whereUserId(Auth::user()->id)->whereTakeProfit(floatval($request->take_profit))->whereStopLoss(floatval($request->stop_loss))->where('min_quantity', '>=', floatval($request->quantity))->whereTradeAction($request->trade_action)->whereTradeType($request->trade_type)->whereTradeSymbols($coinpair->id)->whereIsUsed(false)->first();
        if ($signal == null) {
            $rand = rand(1, 6);

            $win_time = 0;

            if ($rand > 2) {
                $result = false;
            } else {
                $result = true;
            }
        } else {

            $win_time = $signal->win_time;
            $signal->is_used = true;

            $result = true;
        }


        // $profile = UserProfile::whereUserId(Auth::user()->id)->first(); 

        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();

        // try {
        //     $currency_equi = $rates->{strtolower(Auth::user()->ccy->code)};
        // } catch (\Exception $e) {
        //     $currency_equi = $rates->usd;
        // }

        // try {
        //     $wallet_rate = $rates->{strtolower($wallet->symbol)};
        // } catch (\Exception $e) {
        //     $wallet_rate = $rates->btc;
        // }

        try{
            $currency_equi = $rates->{strtolower(strtolower(Auth::user()->ccy->code == 'USDT' ? 'USD' : Auth::user()->ccy->code))};
        }catch( \Exception $e ){
             $currency_equi = $rates->usd;           
        }
     
         try{
             $wallet_rate = $rates->{$wallet->symbol == 'USDT' ? 'usd' : strtolower($wallet->symbol)};
         }catch( \Exception $e){
             $wallet_rate = $rates->btc;
         }

        $amount  = floatval($request->amount_margin_user_currency);

        $wallet_amount = ($amount / $rates->{strtolower(Auth::user()->ccy->code)}->value) * $wallet_rate->value;
        // $wallet_amount = $amount;

        // dd($request->all(), $amount, $wallet_amount);

        if ($request->trade_type == "live") {

            $wallet_currency = ($wallet->balance * $rates->{strtolower(Auth::user()->ccy->code)}->value) / $wallet_rate->value;

            // if ($wallet_amount > $wallet->balance) {
                if ($wallet_amount > $wallet_currency) {
                return response(['Amount' => 'Required margin ' . Auth::user()->ccy->symbol . number_format($amount, Auth::user()->ccy->decimal_digits) . ' is Larger Then Your Current wallet ' . Auth::user()->ccy->symbol . number_format($wallet_currency, Auth::user()->ccy->decimal_digits)], 422)->header('Content-Type', 'application/json');
            } else {

                $wallet->balance  -=  floatval($wallet_amount);
            }

            $balance = (($wallet->balance * $currency_equi->value)/ $wallet_rate->value);
            // $balance = $wallet->balance;

            $balance_fmt = number_format($balance, Auth::user()->ccy->decimal_digits);
        } elseif ($request->trade_type == "demo") {

            $wallet_currency = ($wallet->balance_demo * $rates->{strtolower(Auth::user()->ccy->code)}->value) / $wallet_rate->value;


            // if ($wallet_amount > $wallet->balance_demo) {
                if ($wallet_amount > $wallet_currency) {
                return response(['Amount' => 'Required margin ' . Auth::user()->ccy->symbol . number_format($amount, Auth::user()->ccy->decimal_digits) . ' is Larger Then Your Current wallet ' . Auth::user()->ccy->symbol . number_format($wallet_currency, Auth::user()->ccy->decimal_digits)], 422)->header('Content-Type', 'application/json');
            } else {
                $wallet->balance_demo -= floatval($wallet_amount);
            }

            $balance = (($wallet->balance_demo * $currency_equi->value)/ $wallet_rate->value);
            // $balance = $wallet->balance_demo;

            $balance_fmt = number_format($balance, Auth::user()->ccy->decimal_digits);
        }

        if ($signal !== null) {
            $signal->save();
        }
        $wallet->balance = $wallet->balance < 0 ? 0.00 : $wallet->balance;
        $wallet->balance_demo = $wallet->balance_demo < 0 ? 0.00 : $wallet->balance_demo;
        $wallet->save();


        $newTrade = new TradeHistory;

        $newTrade->trade_id =  strtoupper(Str::random(10));
        $newTrade->user_id = Auth::user()->id;
        $newTrade->symbols = $coinpair->id;
        $newTrade->wallet_id = $wallet->id;
        $newTrade->wallet_debit = $wallet_amount;
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
        $newTrade->user_currency = strtolower(Auth::user()->ccy->code);
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
            $tlog['user_id'] = Auth::user()->id;
            $tlog['trx'] =  str_random(16);
            $tlog['amount'] = $amount;
            $tlog['status'] = 1;

            // $tlog['coin_amount'] = $wallet_amount;
            // $tlog['wallet_id'] = $wallet->id;
            $tlog['post_balance'] = $wallet->balance;
            $tlog['trx_type'] = '-';
            // $tlog['details'] = $wallet->gateway->name .' debited with '. $wallet_amount. $wallet->gateway->alias;
            $tlog['trans_type'] = 'debit';
            $tlog['currency'] = $wallet->symbol;
            $tlog['details'] = $wallet->symbol . ' wallet debited with ' . $wallet_amount . $wallet->symbol . ' for trade position id:' . $newTrade->trade_id;
            Transaction::create($tlog);
        }


        $message = 'New ' . ucwords($request->trade_action) . ' Position opened for ' . $request->product_id . ' at ' . $request->price . ' for ' . Auth::user()->ccy->symbol . number_format($request->amount_margin_user_currency, Auth::user()->ccy->decimal_digits);

        //if autotrader... mark as saved trade
        if ($request->save_trade_id != null) {
            UserSavedTrades::whereId($request->save_trade_id)->delete();
        }

        $nowTime = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();

        $positions_count = TradeHistory::whereUserId(Auth::user()->id)->whereTradeType($request->trade_type)->wherePositionStatus('open')->where('end_time', '>', $nowTime)->count();

        $position_assets = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $request->trade_type)->whereWalletId($wallet->id)->wherePositionStatus('open')->latest()->skip(0)->take(10)->get();

        // $position_assets = TradeHistory::whereUserId(Auth::user()->id)->wherePositionStatus('open')->whereWalletId($wallet->id)->whereTradeType($tradeHistory->trade_type)->where('end_time', '>', $nowTime)->get();
        $check_assets = [];
        $final_assets = [];
        $profit_loss_user = 0;
        foreach ($position_assets as $asset) {
            $profit_loss_user += $asset->profit_loss_user;
            $asset_append = [
                "id"    => $asset->sym[0]->fromsym . "-" . $asset->sym[0]->tosym,
                "label" => $asset->sym[0]->name
            ];
            if (!in_array($asset_append, $check_assets)) {
                $final_assets[] = $asset_append;
                $check_assets[] = $asset_append;
            }
        }

        $margin_used = TradeHistory::whereUserId(Auth::user()->id)->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($request->trade_type)->where('end_time', '>', $nowTime)->sum('amount_margin_user_currency');
        // $profit_loss_user = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($request->trade_type)->where('end_time', '>', $nowTime)->sum('profit_loss_user');
        $equity_raw = floatval($balance + $profit_loss_user);

        $equity = number_format($equity_raw, Auth::user()->ccy->decimal_digits);
        return response([
            'status' => 'success',
            'message' => $message,
            'positions' => $positions_count,
            'margin_used' => number_format($margin_used, Auth::user()->ccy->decimal_digits),
            'balance' => $balance,
            'balance_fmt' => Auth::user()->ccy->symbol . $balance_fmt,
            'equity' => $equity,
            'history' => $position_assets,
            'profit_loss_user' => $profit_loss_user,
            'final_assets'=> $final_assets
        ], 200)->header('Content-Type', 'application/json');
    }

    public function reloadTradeHistory(Request $request, $max)
    {
        $currentPage = $request->input('page', 1);
        $skip = ($currentPage - 1) * 10;
        $selected_trade = Auth::user()->demo_trade;
        $trade_type = ($selected_trade == "active") ? "demo" : "live";
        $data['isFull'] = ($max == "full") ? true : false;

        $paginate = ($max == "full") ? 35 : 10;

        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();

        // $data['history'] = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $trade_type)->whereWalletId($wallet->id)->wherePositionStatus('open')->get();
        $data['history'] = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $trade_type)->whereWalletId($wallet->id)->wherePositionStatus('open')->latest()->skip($skip)->take(10)->get();

        $check_assets = [];
        $final_assets = [];
        $profit_loss_user = 0;
        foreach ($data['history'] as $asset) {
            $profit_loss_user += $asset->profit_loss_user;
            $asset_append = [
                "id"    => $asset->sym[0]->fromsym . "-" . $asset->sym[0]->tosym,
                "label" => $asset->sym[0]->name
            ];
            if (!in_array($asset_append, $check_assets)) {
                $final_assets[] = $asset_append;
                $check_assets[] = $asset_append;
            }
        }
        $data['final_assets'] = $final_assets;
        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();
        if($trade_type == 'live'){
            $equity_raw = floatval($wallet->balance + $profit_loss_user);
        }else{
            $equity_raw = floatval($wallet->balance_demo + $profit_loss_user);
        }
        $equity = number_format($equity_raw, Auth::user()->ccy->decimal_digits);
        $data['profit_loss_user'] = $profit_loss_user;
        $data['equity'] = $equity;
        return response()->json([
            'data' => $data,
            'type' => 'success'
        ]);
        // return view('user.tradelive-history-reload', $data);
    }


    public function reloadTradeHistoryPage(Request $request)
    {
        $currentPage = $request->input('page', 1);
        $skip = ($currentPage - 1) * 10;
        $selected_trade = Auth::user()->demo_trade;
        $trade_type = ($selected_trade == "active") ? "demo" : "live";

        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();

        $data['history'] = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $trade_type)->whereWalletId($wallet->id)->wherePositionStatus('open')->latest()->skip($skip)->take(10)->get();

        $check_assets = [];
        $final_assets = [];
        $profit_loss_user = 0;
        foreach ($data['history'] as $asset) {
            $profit_loss_user += $asset->profit_loss_user;
            $asset_append = [
                "id"    => $asset->sym[0]->fromsym . "-" . $asset->sym[0]->tosym,
                "label" => $asset->sym[0]->name
            ];
            if (!in_array($asset_append, $check_assets)) {
                $final_assets[] = $asset_append;
                $check_assets[] = $asset_append;
            }
        }
        $data['final_assets'] = $final_assets;
        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();
        if($trade_type == 'live'){
            $equity_raw = floatval($wallet->balance + $profit_loss_user);
        }else{
            $equity_raw = floatval($wallet->balance_demo + $profit_loss_user);
        }
        $equity = number_format($equity_raw, Auth::user()->ccy->decimal_digits);

        $data['profit_loss_user'] = $profit_loss_user;
        $data['equity'] = $equity;
        return response()->json([
            'data' => $data,
            'type' => 'success'
        ]);
        // return view('user.tradelive-history-reload', $data);
    }

    public function liveFullHistory(Request $request)
    {
        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();
        $data['current_price'] = $request->current_prices;
        $selected_trade = Auth::user()->demo_trade;
        $trade_type = ($selected_trade == "active") ? "demo" : "live";

        $data['history'] = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $trade_type)->whereWalletId($wallet->id)->wherePositionStatus('open')->get();
        $data['isFull'] = true;
        return view('admin.tradelive-history', $data);
    }
    public function liveHistory(Request $request)
    {

        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();
        $data['current_price'] = $request->current_prices;
        $selected_trade = Auth::user()->demo_trade;
        $trade_type = ($selected_trade == "active") ? "demo" : "live";
        $data['history'] = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $trade_type)->whereWalletId($wallet->id)->wherePositionStatus('open')->get();
        $data['isFull'] = false;
        $data['mycurrency'] = Auth::user()->ccy;
        $data['myuser'] = Auth::user();

        return view('admin.tradelive-history', $data);
    }

    public function closedHistory()
    {
        $selected_trade = Auth::user()->demo_trade;
        $trade_type = ($selected_trade == "active") ? "demo" : "live";
        $data['closed_positions'] = TradeHistory::whereUserId(Auth::user()->id)->whereTradeType($trade_type)->wherePositionStatus('close')->orderBy('updated_at', 'DESC')->get();
        // return view('user.close-position-reload', $data);
        return response()->json([
            'data' => $data,
            'type' => 'success'
        ]);
    }

    public function reloadedEarnings()
    {
        $data['earnings'] = Transaction::whereUser_id(Auth::user()->id)->whereTrxType('+')->latest()->get();
        // return view('user.trade-earnings-reload', $data);
        return response()->json([
            'data' => $data,
            'type' => 'success'
        ]);
    }

    public function closeTradeApi(Request $request)
    {
        // dd($request->all());
        $currentPage = $request->input('page', 1);
        $skip = ($currentPage - 1) * 10;

        $rates = (object)$request->rates;

        $profile = Auth::user();

        $tradeHistory = TradeHistory::whereUserId(Auth::user()->id)->whereId($request->_payload['id'])->first();

        $tradeHistory->end_reason = 'user';
        $tradeHistory->position_status = 'close';

        $tradeHistory->stop_time = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();

        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();

        try {
            $currency_equi = $rates->{strtolower(strtolower(Auth::user()->ccy->code == 'USDT' ? 'USD' : Auth::user()->ccy->code))};
        } catch (\Exception $e) {
            $currency_equi = $rates->usd;
        }

        try {
            $wallet_rate = $rates->{$wallet->symbol == 'USDT' ? 'usd' : strtolower($wallet->symbol)};

        } catch (\Exception $e) {
            $wallet_rate = $rates->btc;
        }


        if ($tradeHistory->trade_type == 'live') {

            $user_margin = $rates->{strtolower($request->_payload['user_currency'])};

            $trade_royalties = (floatval($request->_payload['amount_margin_user_currency']) + floatval($request->_payload['profit_loss_user']));

            // $amount_in_wallet_rate = (floatval($request->_payload['amount_margin_user_currency']) / $user_margin['value']) * $wallet_rate['value'];

            // $user_curr_slug = strtolower($tradeHistory->user_currency);

            // $profit_loss = (floatval($request->_payload['profit_loss_user']) / $user_margin['value']) * $wallet_rate['value'];
            $profit_loss = floatval($request->_payload['profit_loss_user']);

            $wallet_amount =  floatval($tradeHistory->wallet_debit) + $profit_loss;

            // //update closing values
            $tradeHistory->profit_loss = floatval($request->_payload['profit_loss']);

            $tradeHistory->profit_loss_user = floatval($request->_payload['profit_loss_user']);

            $wallet->balance += $wallet_amount;
            $wallet->balance = $wallet->balance < 0 ? 0.00 : $wallet->balance;
            $wallet->balance_demo = $wallet->balance_demo < 0 ? 0.00 : $wallet->balance_demo;
            $wallet->save();

            $tradeHistory->save();

            $tlog['user_id'] = Auth::user()->id;
            $tlog['trx'] =  str_random(16);
            $tlog['amount'] = $trade_royalties;
            // $tlog['coin_amount'] = $wallet_amount;
            // $tlog['wallet_id'] = $wallet->id;


            $tlog['post_balance'] = $wallet->balance;
            $tlog['trx_type'] = '+';
            $tlog['currency'] = $wallet->symbol;

            // $tlog['title'] = $wallet->gateway->name .' credited with '. $wallet_amount. $wallet->gateway->code;
            // $tlog['trans_type'] = 'credit';
            $tlog['details'] = $wallet->symbol . ' wallet credited with ' . $trade_royalties . $wallet->symbol . ' for trade position id:' . $tradeHistory->trade_id;
            Transaction::create($tlog);
        }


        if ($tradeHistory->trade_type == 'demo') {

            $user_margin = $rates->{strtolower($request->_payload['user_currency'])};

            // $trade_royalties = ($request->_payload['amount_margin_user_currency'] + $request->_payload['profit_loss_user']);

            // $amount_in_wallet_rate = ($request->_payload['amount_margin_user_currency'] / $user_margin['value']) * $wallet_rate['value'];

            $trade_royalties =  ($tradeHistory->amount_margin_user_currency + floatval($request->_payload['profit_loss_user']));


            // $user_curr_slug = strtolower($tradeHistory->user_currency);


            // $profit_loss = ($request->_payload['profit_loss_user'] / $user_margin['value']) * $wallet_rate['value'];

            $profit_loss = floatval($request->_payload['profit_loss_user']);

            $wallet_amount =  floatval($tradeHistory->wallet_debit) + $profit_loss;


            $tradeHistory->profit_loss = floatval($request->_payload['profit_loss']);

            $tradeHistory->profit_loss_user = floatval($request->_payload['profit_loss_user']);

            //  dd($tradeHistory->wallet_debit, $profit_loss);
            $wallet->balance_demo += $wallet_amount;
            // dd($wallet);
            $wallet->save();

            $tradeHistory->save();
        }

        $tradeHistory->save();
        $wallet->balance = $wallet->balance < 0 ? 0.00 : $wallet->balance;
        $wallet->balance_demo = $wallet->balance_demo < 0 ? 0.00 : $wallet->balance_demo;
        $wallet->save();

        $nowTime = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();

        $positions = TradeHistory::whereUserId(Auth::user()->id)->wherePositionStatus('open')->whereTradeType($tradeHistory->trade_type)->whereWalletId($wallet->id)->where('end_time', '>', $nowTime)->count();
        $position_assets = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $tradeHistory->trade_type)->whereWalletId($wallet->id)->wherePositionStatus('open')->latest()->skip($skip)->take(10)->get();

        // $position_assets = TradeHistory::whereUserId(Auth::user()->id)->wherePositionStatus('open')->whereWalletId($wallet->id)->whereTradeType($tradeHistory->trade_type)->where('end_time', '>', $nowTime)->get();
        $check_assets = [];
        $final_assets = [];
        $profit_loss_user = 0;
        foreach ($position_assets as $asset) {
            $profit_loss_user += $asset->profit_loss_user;
            $asset_append = [
                "id"    => $asset->sym[0]->fromsym . "-" . $asset->sym[0]->tosym,
                "label" => $asset->sym[0]->name
            ];
            if (!in_array($asset_append, $check_assets)) {
                $final_assets[] = $asset_append;
                $check_assets[] = $asset_append;
            }
        }

        if ($tradeHistory->trade_type == "live") {

            $balance = (($wallet->balance * $currency_equi['value']) / $wallet_rate['value']);
            // $balance = $wallet->balance;
            $balance_fmt = number_format($balance, $profile->ccy->decimal_digits);
        } elseif ($tradeHistory->trade_type == "demo") {
            $balance = (($wallet->balance_demo * $currency_equi['value']) / $wallet_rate['value']);
            // $balance = $wallet->balance_demo;

            $balance_fmt = number_format($balance, $profile->ccy->decimal_digits);
        }


        $message = ucwords($tradeHistory->trade_action) . " position for " . $tradeHistory->sym[0]->name . " with ID " . strtoupper($tradeHistory->trade_id) . " successfully closed!";

        $margin_used = TradeHistory::whereUserId(Auth::user()->id)->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($tradeHistory->trade_type)->where('end_time', '>', $nowTime)->sum('amount_margin_user_currency');
        // $profit_loss_user = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($tradeHistory->trade_type)->where('end_time', '>', $nowTime)->skip($skip)->take(10)->sum('profit_loss_user');
        $equity_raw = floatval($balance + $profit_loss_user);

        $equity = number_format($equity_raw, $profile->ccy->decimal_digits);

        return response()->json([
            'status' => true,
            'positions' => $positions, 
            'message' => $message,
            'position_assets' => $final_assets,
            'history' => $position_assets,
            'margin_used' => $profile->ccy->symbol . number_format($margin_used, $profile->ccy->decimal_digits),
            'balance' => $balance,
            'balance_fmt' => $profile->ccy->symbol . $balance_fmt,
            'profit_loss_user' => $profit_loss_user,
            'equity' => $equity
        ]);
    }

    public function saveProfitLossApi(Request $request)
    {

        $rates = (object)$request->rates;

        $profile = Auth::user();

        $trade_session = Auth::user()->demo_trade;

        $default_trade_type = $trade_session == 'active' ? "demo" : "live";

        $nowTime = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();

        $wallet = Wallet::whereUserId(Auth::user()->id)->whereIsDefault(1)->first();

        try {
            $currency_equi = $rates->{strtolower(strtolower(Auth::user()->ccy->code == 'USDT' ? 'USD' : Auth::user()->ccy->code))};
        } catch (\Exception $e) {
            $currency_equi = $rates->usd;
        }

        try {
            $wallet_rate = $rates->{$wallet->symbol == 'USDT' ? 'usd' : strtolower($wallet->symbol)};

        } catch (\Exception $e) {
            $wallet_rate = $rates->btc;
        }


        foreach ($request->payload as $payload) { 

            $history = TradeHistory::whereId($payload['id'])->whereUserId(Auth::user()->id)->wherePositionStatus('open')->first();
            if ($history != null) {

                $history->profit_loss = $payload['pl'];

                $history->profit_loss_user =  $payload['converted_pl'];

                $time = strtotime($history->end_time) - strtotime($nowTime);

                $time = round($time / (24 * 60 * 60));

                if ($time == 0) {
                    //trade is finished and gots to close

                    $history->position_status = 'close';
                    $history->end_reason = 'expired';
                    $history->stop_time = $history->end_time;
                    if ($history->trade_type == 'live') {

                        $trade_royalties =  ($history->amount_margin_user_currency + floatval($payload['converted_pl']));


                        $user_curr_slug = strtolower($history->user_currency);


                        $profit_loss = ((floatval($payload['converted_pl']) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"]);

                        $wallet_amount = $profit_loss + floatval($history->wallet_debit);

                        $wallet->balance += $wallet_amount;

                        $tlog['user_id'] = Auth::user()->id;
                        $tlog['trx'] =  str_random(16);
                        $tlog['amount'] = $trade_royalties;
                        $tlog['status'] = 1;

                        // $tlog['coin_amount'] = $wallet_amount;
                        // $tlog['wallet_id'] = $wallet->id;
                        $tlog['post_balance'] = $wallet->balance;
                        $tlog['trx_type'] = '+';
                        // $tlog['details'] = $wallet->gateway->name .' debited with '. $wallet_amount. $wallet->gateway->alias;
                        // $tlog['trans_type'] = 'credit';
                        $tlog['currency'] = $wallet->symbol;
                        $tlog['details'] = $wallet->symbol . ' wallet credited with ' . $wallet_amount . $wallet->symbol . ' for autoclosed trade position id:' . $history->trade_id;
                        Transaction::create($tlog);

                        // $tlog['user_id'] = Auth::user()->id;
                        // $tlog['trx'] =  str_random(16);
                        // $tlog['currency_amount'] = $trade_royalties;
                        // $tlog['coin_amount'] = $wallet_amount;
                        // $tlog['wallet_id'] = $wallet->id;
                        // $tlog['balance'] = $wallet->balance;
                        // $tlog['type'] = '+';
                        // $tlog['title'] = $wallet->gateway->name .' credited with '. $wallet_amount. $wallet->gateway->code;
                        // $tlog['trans_type'] = 'credit';
                        // $tlog['details'] = $wallet->gateway->name . ' wallet credited with ' . $wallet_amount.$wallet->gateway->code. ' for autoclosed trade position id:' . $history->trade_id;
                        // Trx::create( $tlog );

                    }


                    if ($history->trade_type == 'demo') {
                        $trade_royalties =  ($history->amount_margin_user_currency + floatval($payload['converted_pl']));

                        $user_curr_slug = strtolower($history->user_currency);
                        // $wallet_amount = ($trade_royalties / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"];


                        $profit_loss = ((floatval($payload['converted_pl']) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"]);

                        $wallet_amount = $profit_loss + floatval($history->wallet_debit);

                        $wallet->balance_demo += $wallet_amount;
                    }
                } elseif ($time < 0) {
                    $history->position_status = 'close';
                    $history->end_reason = 'expired';
                    $history->stop_time = $history->end_time;
                    if ($history->trade_type == 'live') {
                        $trade_royalties =  (floatval($history->amount_margin_user_currency) + floatval($history->profit_loss_user));


                        $user_curr_slug = strtolower($history->user_currency);

                        $profit_loss = ((floatval($history->profit_loss_user) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"]);

                        $wallet_amount = $profit_loss + floatval($history->wallet_debit);

                        $wallet->balance += $wallet_amount;

                        $tlog['user_id'] = Auth::user()->id;
                        $tlog['trx'] =  str_random(16);
                        $tlog['amount'] = $trade_royalties;
                        // $tlog['coin_amount'] = $wallet_amount;
                        // $tlog['wallet_id'] = $wallet->id;
                        $tlog['post_balance'] = $wallet->balance;
                        $tlog['trx_type'] = '+';
                        $tlog['currency'] = $wallet->symbol;
                        // $tlog['title'] = $wallet->gateway->name .' credited with '. $wallet_amount. $wallet->gateway->code;
                        // $tlog['trans_type'] = 'credit';
                        $tlog['details'] = $wallet->symbol . ' wallet credited with ' . $wallet_amount . $wallet->symbol . ' for trade position id:' . $history->trade_id;
                        Transaction::create($tlog);
                    }


                    if ($history->trade_type == 'demo') {
                        $trade_royalties =  ($history->amount_margin_user_currency + floatval($history->profit_loss_user));

                        $user_curr_slug = strtolower($history->user_currency);
                        // $wallet_amount = ($trade_royalties / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"];

                        $profit_loss = ((floatval($history->profit_loss_user) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"]);

                        $wallet_amount = $profit_loss + floatval($history->wallet_debit);


                        $wallet->balance_demo += $wallet_amount;
                    }
                }


                if ($history->take_profit != 0 && (floatval($payload['converted_pl']) >= $history->take_profit)) {
                    //take_profit and close trade is true.
                    $history->position_status = 'close';
                    $history->end_reason = 'auto';
                    $history->stop_time = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();
                    $user_curr_slug = strtolower($history->user_currency);
                    $trade_currency = strtolower($history->trade_currency);
                    $new_profit_loss_currency = (floatval($history->take_profit) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"];


                    if ($history->trade_type == 'live') {
                        
                        $user_margin = $rates->{strtolower($history->user_currency)};

                        $trade_royalties = (floatval($history->amount_margin_user_currency) + floatval($history->take_profit));
            
                        // $amount_in_wallet_rate = (floatval($request->_payload['amount_margin_user_currency']) / $user_margin['value']) * $wallet_rate['value'];
            
                        // $user_curr_slug = strtolower($tradeHistory->user_currency);
                        $profit_loss = floatval($history->take_profit);

                        // $profit_loss = (floatval($history->take_profit) / $user_margin['value']) * $wallet_rate['value'];
                        // $profit_loss = floatval($request->_payload['profit_loss_user']);
            
                        $wallet_amount =  floatval($history->wallet_debit) + $profit_loss;
            








                        // $trade_royalties =  ($history->amount_margin_user_currency + floatval($history->take_profit));


                        // $user_curr_slug = strtolower($history->user_currency);
                        // // $wallet_amount = ($trade_royalties / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"];

                        // $profit_loss = ((floatval($history->take_profit) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"]);

                        // $wallet_amount = $profit_loss + floatval($history->wallet_debit);

                        $wallet->balance += $wallet_amount;
                        // dd("take_profit",$profit_loss, $wallet_amount, $wallet->balance);

                        $tlog['user_id'] = Auth::user()->id;
                        $tlog['trx'] =  str_random(16);
                        $tlog['amount'] = $trade_royalties;
                        // $tlog['coin_amount'] = $wallet_amount;
                        // $tlog['wallet_id'] = $wallet->id;
                        $tlog['post_balance'] = $wallet->balance;
                        $tlog['trx_type'] = '+';
                        $tlog['currency'] = $wallet->symbol;
                        // $tlog['title'] = $wallet->gateway->name .' Wallet credited with '. $wallet_amount. $wallet->gateway->code;
                        // $tlog['trans_type'] = 'credit';
                        $tlog['details'] = $wallet->symbol . ' wallet credited with ' . $wallet_amount . $wallet->symbol . ' for trade position id:' . $history->trade_id;
                        Transaction::create($tlog);
                    }

                    if ($history->trade_type == 'demo') {
                        $trade_royalties =  ($history->amount_margin_user_currency + floatval($payload['converted_pl']));

                        $user_curr_slug = strtolower($history->user_currency);

                        // $profit_loss = ((floatval($payload['converted_pl']) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"]);
                        $profit_loss = floatval($history->take_profit);

                        $wallet_amount = $profit_loss + floatval($history->wallet_debit);

                        // $wallet_amount = ($trade_royalties / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"];

                        $wallet->balance_demo += $wallet_amount;
                    }

                    $history->profit_loss = $profit_loss;

                    $history->profit_loss_user = floatval($history->take_profit);
                }
                //stop_loss is true


                if ($history->stop_loss != 0 && ((0 - floatval($history->stop_loss)) >= (floatval($payload['converted_pl'])))) {
                    $history->position_status = 'close';
                    $history->end_reason = 'auto';
                    $history->stop_time = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();
                    $user_curr_slug = strtolower($history->user_currency);
                    $trade_currency = strtolower($history->trade_currency);
                    $new_profit_loss_currency = ((0 - floatval($history->stop_loss)) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"];

                    if ($history->trade_type == 'live') {
                        $user_margin = $rates->{strtolower($history->user_currency)};

                        $trade_royalties = (floatval($history->amount_margin_user_currency) - floatval($history->stop_loss));
            
                        // $amount_in_wallet_rate = (floatval($request->_payload['amount_margin_user_currency']) / $user_margin['value']) * $wallet_rate['value'];
            
                        // $user_curr_slug = strtolower($tradeHistory->user_currency);
                        $profit_loss = floatval($history->stop_loss);

                        // $profit_loss = (floatval($history->stop_loss) / $user_margin['value']) * $wallet_rate['value'];
                        // $profit_loss = floatval($request->_payload['profit_loss_user']);
            
                        $wallet_amount =  floatval($history->wallet_debit) - $profit_loss;






                        // $trade_royalties =  ($history->amount_margin_user_currency - floatval($history->stop_loss));



                        // // $wallet_amount = ($trade_royalties / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"];

                        // $profit_loss = ((floatval($history->stop_loss) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"]);

                        // $wallet_amount = floatval($history->wallet_debit) - $profit_loss;

                        $wallet->balance += $wallet_amount;
                        // dd("stop_loss",$profit_loss,$new_profit_loss_currency, $wallet_amount, $wallet->balance);


                        $tlog['user_id'] = Auth::user()->id;
                        $tlog['trx'] =  str_random(16);
                        $tlog['amount'] = $trade_royalties;
                        // $tlog['coin_amount'] = $wallet_amount;
                        // $tlog['wallet_id'] = $wallet->id;
                        $tlog['post_balance'] = $wallet->balance;
                        $tlog['trx_type'] = '+';
                        $tlog['currency'] = $wallet->symbol;
                        // $tlog['title'] = $wallet->gateway->name .' credited with '. $wallet_amount. $wallet->gateway->code;
                        // $tlog['trans_type'] = 'credit';
                        $tlog['details'] = $wallet->symbol . ' wallet credited with ' . $wallet_amount . $wallet->symbol . ' for trade position id:' . $history->trade_id;
                        Transaction::create($tlog);
                    }

                    if ($history->trade_type == 'demo') {
                        $trade_royalties =  ($history->amount_margin_user_currency - floatval($history->stop_loss));
                        $profit_loss = floatval($history->stop_loss);

                        // $profit_loss = ((floatval($history->stop_loss) / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"]);

                        $wallet_amount = floatval($history->wallet_debit) - $profit_loss;

                        // $wallet_amount = ($trade_royalties / $rates->{$user_curr_slug}['value']) * $wallet_rate["value"];

                        $wallet->balance_demo += $wallet_amount;
                    }


                    $history->profit_loss = (0 - floatval($history->stop_loss));

                    $history->profit_loss_user =  (0 - floatval($history->stop_loss));

                }

                $wallet->balance = $wallet->balance < 0 ? 0.00 : $wallet->balance;
                $wallet->balance_demo = $wallet->balance_demo < 0 ? 0.00 : $wallet->balance_demo;

                $wallet->save();

                $history->save();

            }
        }

        $positions = TradeHistory::whereUserId(Auth::user()->id)->wherePositionStatus('open')->whereWalletId($wallet->id)->whereTradeType($default_trade_type)->where('end_time', '>', $nowTime)->count();
        // $position_assets = TradeHistory::whereUserId(Auth::user()->id)->wherePositionStatus('open')->whereWalletId($wallet->id)->whereTradeType($default_trade_type)->where('end_time', '>', $nowTime)->get();

        $currentPage = $request->input('page', 1);
        $skip = ($currentPage - 1) * 10;
        $history = TradeHistory::whereUserId(Auth::user()->id)->wherePositionStatus('open')->whereWalletId($wallet->id)->whereTradeType($default_trade_type)->where('end_time', '>', $nowTime)->latest()->skip($skip)->take(10)->get();


        $check_assets = [];
        $final_assets = [];
        $profit_loss_user = 0;
        foreach ($history as $asset) {
            $profit_loss_user += $asset->profit_loss_user;
            $asset_append = [
                "id"    => $asset->sym[0]->fromsym . "-" . $asset->sym[0]->tosym,
                "label" => $asset->sym[0]->pair_name
            ];
            if (!in_array($asset_append, $check_assets)) {
                $final_assets[] = $asset_append;
                $check_assets[] = $asset_append;
            }
        }

        if ($default_trade_type == "live") {

            $balance = (($wallet->balance * $currency_equi['value'])/ $wallet_rate['value']);
            // $balance = $wallet->balance;
            $balance_fmt = number_format($balance, $profile->ccy->decimal_digits);
        } elseif ($default_trade_type == "demo") {

            $balance = (($wallet->balance * $currency_equi['value'])/ $wallet_rate['value']);
            // $balance = $wallet->balance_demo;
            $balance_fmt = number_format($balance, $profile->ccy->decimal_digits);
        }


        $margin_used = TradeHistory::whereUserId(Auth::user()->id)->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($default_trade_type)->where('end_time', '>', $nowTime)->sum('amount_margin_user_currency');
        // $profit_loss_user = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($default_trade_type)->where('end_time', '>', $nowTime)->skip($skip)->take(10)->sum('profit_loss_user');
        $equity_raw = floatval($balance + $profit_loss_user);
        $equity = number_format($equity_raw, $profile->ccy->decimal_digits);

        return response()->json([
            'status' => true,
            'positions' => $positions,
            'position_assets' => $final_assets,
            'history' => $history,
            'margin_used' => $profile->ccy->symbol . number_format($margin_used, $profile->ccy->decimal_digits),
            'balance' => $balance,
            'balance_fmt' => $profile->ccy->symbol . $balance_fmt,
            'profit_loss_user' => $profit_loss_user,
            'equity' => $equity
        ]);
    }
}
