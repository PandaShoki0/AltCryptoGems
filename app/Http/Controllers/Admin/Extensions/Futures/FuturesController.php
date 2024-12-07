<?php

namespace App\Http\Controllers\Admin\Extensions\Futures;

use App\Http\Controllers\Controller;
use App\Models\ThirdpartyProvider;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;

class FuturesController extends Controller
{
    public $api;
    public $provider;

    public function __construct()
    {
        $thirdparty = getProviderFutures();
        if ($thirdparty) {
            $exchange_class = "\\ccxt\\$thirdparty->title";
            if ($thirdparty->title == 'binanceusdm' || $thirdparty->title == 'binancecoinm') {
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
            $this->provider = null;
        }
    }

    public function positions()
    {
        abort_if(Gate::denies('futures_positions'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'Positions';
        return view('extensions.admin.futures.positions', compact('page_title'));
    }

    public function orders()
    {
        abort_if(Gate::denies('futures_orders'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'Orders';
        return view('extensions.admin.futures.orders', compact('page_title'));
    }

    public function wallets()
    {
        abort_if(Gate::denies('futures_wallets'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'Wallets';
        return view('extensions.admin.futures.wallets', compact('page_title'));
    }

    public function currencies($id)
    {
        abort_if(Gate::denies('provider_currencies_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = 'Currencies';
        return view('admin.provider.futures_currencies', compact('page_title', 'id'));
    }

    public function markets($id)
    {
        abort_if(Gate::denies('provider_markets_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page_title = 'Markets';
        $provider = ThirdpartyProvider::findOrFail($id)->title;
        $jsonString = file_get_contents(public_path('data/markets/futures.json'));
        $markets = json_decode($jsonString, true);
        $empty_message = 'No Markets Available';

        return view('admin.provider.futures_markets', compact('page_title', 'markets', 'empty_message', 'id'));
    }


    public function market_activate(Request $request)
    {
        $jsonString = file_get_contents(public_path('data/markets/futures.json'));
        $datas = json_decode($jsonString, true);
        $datas[getPair($request->symbol)[1]][$request->symbol]['active'] = true;;
        $newJsonString = json_encode($datas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents(public_path('data/markets/futures.json'), stripslashes($newJsonString));
        $notify[] = ['success', 'Market has been activated'];

        return response()->json(
            [
                'success' => true,
                'type' => $notify[0][0],
                'message' => $notify[0][1]
            ]
        );
    }

    public function market_deactivate(Request $request)
    {
        $jsonString = file_get_contents(public_path('data/markets/futures.json'));
        $datas = json_decode($jsonString, true);
        $datas[getPair($request->symbol)[1]][$request->symbol]['active'] = false;;
        $newJsonString = json_encode($datas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents(public_path('data/markets/futures.json'), stripslashes($newJsonString));
        $notify[] = ['success', 'Market has been deactivated'];

        return response()->json(
            [
                'success' => true,
                'type' => $notify[0][0],
                'message' => $notify[0][1]
            ]
        );
    }

    public function bulk_market_activate(Request $request)
    {
        $symbols = explode(',', $request->symbols);
        $jsonString = file_get_contents(public_path('data/markets/futures.json'));
        $datas = json_decode($jsonString, true);

        foreach ($symbols as $symbol) {
            $datas[getPair($symbol)[1]][$symbol]['active'] = true;;
        }

        $newJsonString = json_encode($datas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents(public_path('data/markets/futures.json'), stripslashes($newJsonString));

        $notify[] = ['success', 'Selected markets have been activated.'];

        return response()->json(
            [
                'success' => true,
                'type' => $notify[0][0],
                'message' => $notify[0][1]
            ]
        );
    }

    public function bulk_market_deactivate(Request $request)
    {
        $symbols = explode(',', $request->symbols);
        $jsonString = file_get_contents(public_path('data/markets/futures.json'));
        $datas = json_decode($jsonString, true);

        foreach ($symbols as $symbol) {
            $datas[getPair($symbol)[1]][$symbol]['active'] = false;;
        }

        $newJsonString = json_encode($datas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        file_put_contents(public_path('data/markets/futures.json'), stripslashes($newJsonString));

        $notify[] = ['success', 'Selected markets have been deactivated.'];

        return response()->json(
            [
                'success' => true,
                'type' => $notify[0][0],
                'message' => $notify[0][1]
            ]
        );
    }



    public function refresh()
    {
        $curl3 = curl_init(route('provider.futures.to.table'));
        curl_setopt($curl3, CURLOPT_RETURNTRANSFER, true);
        curl_exec($curl3);
        $notify[] = ['success', 'Provider Markets Refreshed Successfully'];
        return back()->withNotify($notify);
    }

    public function market_delete(Request $request)
    {
        $newJsonString = '{}';
        file_put_contents(public_path('data/markets/futures.json'), stripslashes($newJsonString));
        $notify[] = ['success', 'Markets has been cleaned'];

        return back()->withNotify($notify);
    }
}
