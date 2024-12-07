<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\CoinPair;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TradePrediction;
use App\Models\PredictionSession;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMultipleSignalRequest;
use App\Models\Staking\StakingCurrency;
use Illuminate\Support\Facades\DB;

class MultipleSignalController extends Controller
{
    public function generate()
    {
        $data['page_title'] = 'Multiple Signals';
        $data['symbols']    = CoinPair::whereStatus(1)->orderBy('name', 'ASC')->get(['id', 'fromsym', 'tosym']);
        $data['users']      = User::whereStatus(1)->where('role_id', 2)->get(['id', 'name', 'username']);

        return view('admin/multiple-signal/generate', $data);
    }


    public function store(StoreMultipleSignalRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $session_id = \strtoupper(Str::random(30));
        
                PredictionSession::create([
                    'session_id'    => $session_id,
                    'session_type'  => $request->trade_type,
                ]);

                $skrikes = ['highest_buy', 'high_buy', 'highest_sell', 'high_sell', 'normal'];

                for ($i = 0; $i < $request->number_of_trades; $i++) {

                    $amount = round(rand($request->amount_from, $request->amount_to), 2);

                    $j = rand(0, (count($request->trade_intervals) - 1));
                    $k = rand(0, (count($request->symbols) - 1));
                    $r = rand(0, (count($skrikes) - 1));

                    if (in_array($skrikes[$r], ['highest_buy', 'high_buy'])) {
                        $action = 'trade_up';
                    } elseif (in_array($skrikes[$r], ['highest_sell', 'high_sell'])) {
                        $action = 'trade_down';
                    } else {
                        $action = (rand(0, 1) == '1') ? 'trade_up' : 'trade_down';
                    }

                    foreach($request->user_id as $user_id) {

                        TradePrediction::create([
                            'user_id'           => $user_id,
                            'trade_type'        => $request->trade_type,
                            'trade_amount'      => $amount,
                            'trade_interval'    => $request->trade_intervals[$j],
                            'trade_strike'      => $skrikes[$r],
                            'trade_action'      => $action,
                            'is_used'           => false,
                            'session_id'        => $session_id,
                            'trade_symbols'     => $request->symbols[$k]
                        ]);            
                    }
                }
            });

            $notify[] = ['success', 'Multiple Signal has been created successfully!'];

        } catch (\Throwable $th) {
            dd($th->getMessage());
            $notify[] = ['error', $th->getMessage()];
        }
        return redirect()->back()->withNotify($notify);
    }

    
    public function predictions($session_type)
    { 
        $data['page_title']         = 'All Sessions for Multiple Trade ' . ucwords($session_type);
        $data['predictionSessions'] = PredictionSession::query()
                                    ->whereSessionType($session_type)
                                    ->with(['tradePredictions' => fn ($q) => $q->select('id', 'user_id', 'session_id')->with('user:id,name')->groupBy('user_id')])
                                    ->latest('id')
                                    ->paginate(20);

        return view('admin/multiple-signal/predictions', $data);
    }

    
    public function predictionTrades($session_id)
    { 
        $data['page_title']         = 'All Prediction Session Trades';
        $data['predictionTrades']   = TradePrediction::distinct()->whereSessionId($session_id)->get();

        return view('admin/multiple-signal/prediction-trades', $data);
    }
}
