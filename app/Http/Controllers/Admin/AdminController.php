<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminNotification;
use App\Models\Permission;
use App\Models\CoinPair;
use App\Models\Currencies;
use App\Models\TradeLimits;
use App\Models\UserLicense;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Exception;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\UserWallet;
use App\Models\Deposit;
use App\Models\TradeCategory;
use App\Models\TradeHistory;
use App\Models\Transaction;
use Carbon\Carbon;
use DateTimeZone;
use App\Models\Wallet;

class AdminController extends Controller
{

    protected $composer;
    protected $gnl;

    public function __construct(Composer $composer)
    {
        $this->composer = $composer;
        $this->gnl = getGen();
    }

    public function dashboard()
    {
        $page_title = 'Dashboard';
        $gnl = $this->gnl;
//        $api = new UpdateController();

        return view('admin.dashboard', compact(
            'page_title',
            'gnl'
        ));
    }

    public function trade(){

        // if(Auth::user()->demo_trade !== 'active'){
        //     return redirect(route("home"));
        // }

        $data['pairs'] = CoinPair::whereStatus(1)->orderBy('name', 'asc')->get();
        $data['bg_colors'] = [

            'primary',

            'secondary',

            'warning',

            'info',

            'success',

            'danger',

            'warning',

            'info',

        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.coingecko.com/api/v3/exchange_rates');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $exec_result = curl_exec($ch);
        $_rates = json_decode($exec_result);
        // dd($_rates);
        curl_close($ch);
        $server_rates = $_rates->rates ?? 0;
        $data['rates'] = $server_rates ?? 0;
        $data['mycurrency'] = Auth::user()->ccy;
        $data['trade_session'] =  $trade_session = Auth::user()->demo_trade == "active" ? 'demo' : 'live';


        $data['page_title'] = $trade_session == "demo" ? "Demo Trader" : "Live Trader";
        $data['wallets'] = Wallet::where('user_id', Auth::user()->id)->get();
        $data['deposit'] = Deposit::where('user_id', Auth::user()->id)->whereStatus(1)->sum('final_amo');

        $data['initialcat'] = TradeCategory::latest()->whereStatus(1)->first();

        $data['tradeCategory'] = TradeCategory::whereStatus(1)->get();

        $data['pairs'] = CoinPair::whereStatus(1)->orderBy('name', 'asc')->get();

        $livetrades = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $trade_session)->latest()->get();

        $data['closed_positions'] = TradeHistory::whereUserId( Auth::user()->id )->whereTradeType($trade_session)->wherePositionStatus('close')->orderBy('updated_at', 'DESC')->get();

        $wallet =  Wallet::where('user_id', Auth::user()->id)->whereIsDefault(1)->first();
        // dd(Auth::user()->id);
        $data['history'] = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $trade_session)->whereWalletId( $wallet->id )->wherePositionStatus('open')->latest()->paginate(10);
        // $data['history'] = TradeHistory::whereUserId(Auth::user()->id)->where('trade_type', $trade_session)->whereWalletId( $wallet->id )->wherePositionStatus('open')->get();

        $data['myuser'] = Auth::user();
        $data['userplan'] = Auth::user()->userplan()->with('currentplan')->first();
        $data['isFull'] = false;

        $data['recordLimits'] = TradeLimits::whereUserId(Auth::user()->id)->first();
        $data['license'] = UserLicense::whereUserId(Auth::user()->id)->first();


        $nowTime = Carbon::now(new DateTimeZone('Europe/London'))->toDateTimeString();
        $data['positions_count'] = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($trade_session)->where('end_time', '>', $nowTime)->count();
        $data['positions_count_demo'] = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType('demo')->where('end_time', '>', $nowTime)->count();
        if($trade_session == 'live'){
            $data['earnings'] = Transaction::whereUser_id(Auth::user()->id)->whereTrxType('+')->latest()->get();
        }
        $data['wallet'] = $wallet;


        $currency_equi = floatval($server_rates->{strtolower(Auth::user()->ccy->code == 'USDT' ? 'USD' : Auth::user()->ccy->code)}->value ?? 0);
        try{
            $coin_amount = floatval($server_rates->{$wallet->symbol == 'USDT' ? 'usd' : strtolower($wallet->symbol)}->value ?? 1);
        }catch( \Exception $e){
            $coin_amount = floatval($server_rates->btc->value ?? 1);
        }

        if($trade_session == 'demo'){
            // $current_balance_raw_demo = $wallet->balance_demo;
            $current_balance_raw_demo = (($wallet->balance_demo * $currency_equi)/ $coin_amount);
            $data['current_balance_demo'] = number_format($current_balance_raw_demo, $data['mycurrency']->decimal_digits);
            $data['current_balance_raw_demo'] = $current_balance_raw_demo;
            $profit_loss_user_demo = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType('demo')->where('end_time', '>', $nowTime)->sum('profit_loss_user');
            $data['profit_loss_user_demo'] = number_format($profit_loss_user_demo, $data['mycurrency']->decimal_digits);
            // dd($current_balance_raw_demo);
            $equity_raw_demo = floatval($current_balance_raw_demo + floatval($data['profit_loss_user_demo']));
            $data['equity_demo'] = number_format($equity_raw_demo, $data['mycurrency']->decimal_digits);
            $margin_used_raw_demo = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType('demo')->where('end_time', '>', $nowTime)->sum('amount_margin_user_currency');
            $data['margin_used_demo'] = number_format($margin_used_raw_demo, $data['mycurrency']->decimal_digits);
        }else{
            $margin_used_raw = TradeHistory::whereUserId( Auth::user()->id )->wherePositionStatus('open')->whereWalletId($wallet->id)->whereTradeType('live')->where('end_time', '>', $nowTime)->sum('amount_margin_user_currency');
            $data['profit_loss_user'] = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($trade_session)->where('end_time', '>', $nowTime)->sum('profit_loss_user');
            $data['positions_count'] = TradeHistory::whereUserId( Auth::user()->id )->whereWalletId($wallet->id)->wherePositionStatus('open')->whereTradeType($trade_session)->where('end_time', '>', $nowTime)->count();
            $current_balance_raw = (($wallet->balance * $currency_equi)/ $coin_amount);
            // $current_balance_raw = $wallet->balance;
            $data['current_balance'] = number_format($current_balance_raw, $data['mycurrency']->decimal_digits);
            $data['current_balance_raw'] = $current_balance_raw;
            $equity_raw = floatval($current_balance_raw + $data['profit_loss_user']);
            $data['equity'] = number_format($equity_raw, $data['mycurrency']->decimal_digits);
            $data['margin_used'] = number_format($margin_used_raw, $data['mycurrency']->decimal_digits);
        }

        return response()->json([
            'data' => $data,
            'type' => 'success'
        ]);
        // return view('admin.trade', $data);
    }

    public function loadAllSymbols()
    {
        $pairs = CoinPair::whereStatus(1)->orderBy('name', 'asc')->get();

        return response()
            ->json($pairs);
    }

    public function frontend()
    {
        $page_title = "Home";
        return view('admin.setting.frontend.index', compact('page_title'));
    }


    public function frontend_set(Request $request)
    {
        define('MAX_FILE_LIMIT', 1024 * 1024 * 2); //2 Megabytes max html file size

        $file   = '';

        if (isset($request->file)) {
            $file = $this->sanitizeFileName($request->file, false);
        }

        $gnl = getGen();
        $gnl->frontend = $file;
        $gnl->save();
        if ($gnl->save()) {
            echo "Frontend set to $file";
        } else {
            showError("Error setting file  $file\nPossible causes are missing write permission or incorrect file path!");
        }
    }

    function sanitizeFileName($file, $allowedExtension = 'html')
    {
        //sanitize, remove double dot .. and remove get parameters if any
        $file = preg_replace('@\?.*$@', '', preg_replace('@\.{2,}@', '', preg_replace('@[^\/\\a-zA-Z0-9\-\._]@', '', $file)));

        //allow only .html extension
        if ($allowedExtension) {
            $file = preg_replace('/\..+$/', '', $file) . ".$allowedExtension";
        }
        return $file;
    }
    function addPublicFolderToPath($path)
    {
        $public_folder = '/public';
        $builder_folder = '/builder';

        // Check if the public folder is missing before the builder folder
        if (strpos($path, $public_folder . $builder_folder) === false && strpos($path, $builder_folder) !== false) {
            // Add the public folder before the builder folder
            $path = str_replace($builder_folder, $public_folder . $builder_folder, $path);
        }

        return $path;
    }


    function showError($error)
    {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        die($error);
    }

    public function api()
    {
        abort_if(Gate::denies('api_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = "API";
        $user = Auth::user();
        return view('api.index', compact('page_title', 'user'));
    }

    public function clean()
    {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        $notify[] = ['success', 'System Optimized'];
        return  back()->withNotify($notify);
    }

    public function notifications()
    {
        $notifications = AdminNotification::orderBy('id', 'desc')->with('user')->paginate(getPaginate());
        $page_title = 'Notifications';
        return view('admin.notifications', compact('page_title', 'notifications'));
    }

    public function notifications_clean()
    {
        abort_if(Gate::denies('notifications_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $notifications = AdminNotification::get();
        foreach ($notifications as $notification) {
            $notification->delete();
        }
        $notify[] = ['success', 'Notifications removed successfully'];
        return back()->withNotify($notify);
    }

    public function notifications_clean_seen()
    {
        abort_if(Gate::denies('notifications_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $readNotifications = AdminNotification::where('read_status', 1)->get();

        foreach ($readNotifications as $notification) {
            $notification->delete();
        }

        $notify[] = ['success', 'Viewed notifications removed successfully'];
        return back()->withNotify($notify);
    }


    public function notificationRead($id)
    {
        $notification = AdminNotification::findOrFail($id);
        $notification->read_status = 1;
        $notification->save();
        (new AdminNotification)->clearCache();

        // Get the current URL
        $currentUrl = url()->current();

        // Check if the click_url is the same as the current URL
        if ($notification->click_url == $currentUrl || $notification->click_url == $currentUrl . '/' || $notification->click_url == '#') {
            // Redirect to a default page if the URLs are the same
            return back();
        }

        return redirect($notification->click_url);
    }


    public function sidebar_admin()
    {
        abort_if(Gate::denies('admin_sidebar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = "Admin Sidebar Menu Manager";
        $json = file_get_contents(resource_path('data/sidebar.json'));
        $sidebars = arrayToObject(json_decode($json, true)['admin']);
        $type = 'admin';
        return view('admin.setting.sidebar', compact('page_title', 'sidebars', 'type'));
    }

    public function sidebar_user()
    {
        abort_if(Gate::denies('user_sidebar_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $page_title = "User Sidebar Menu Manager";
        $json = file_get_contents(resource_path('data/sidebar.json'));
        $sidebars = arrayToObject(json_decode($json, true)['user']);
        $type = 'user';
        return view('admin.setting.sidebar', compact('page_title', 'sidebars', 'type'));
    }

    public function sidebar_edit($type, $id)
    {
        $json = file_get_contents(resource_path('data/sidebar.json'));
        $sidebar = arrayToObject(json_decode($json, true)[$type][$id]);
        $page_title = "Sidebar Edit";
        $permissions = Permission::select('id', 'title', 'code')->get();
        return view('admin.setting.sidebar_edit', compact('page_title', 'sidebar', 'id', 'permissions', 'type'));
    }

    public function sidebar_update(Request $request, $type)
    {
        $json = file_get_contents(resource_path('data/sidebar.json'));
        $datas = json_decode($json, true);
        $datas[$type][$request->id]['name'] = $request->name;
        $datas[$type][$request->id]['icon'] = str_replace("bi bi-", "", $request->icon);
        $datas[$type][$request->id]['permission'] = $request->permission;
        $request->merge(['status' => isset($request->status) ? 1 : 0]);
        $datas[$type][$request->id]['status'] = $request->status;

        $newJsonString = json_encode($datas, JSON_PRETTY_PRINT);
        file_put_contents(resource_path('data/sidebar.json'), stripslashes($newJsonString));

        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }

    public function sidebar_activate(Request $request, $type)
    {
        try {
            $json = file_get_contents(resource_path('data/sidebar.json'));
            $datas = json_decode($json, true);
            $datas[$type][$request->id]['status'] = 1;
            $newJsonString = json_encode($datas, JSON_PRETTY_PRINT);
            file_put_contents(resource_path('data/sidebar.json'), stripslashes($newJsonString));

            $notify[] = ['success', 'Activated Successfully'];
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

    public function sidebar_deactivate(Request $request, $type)
    {
        try {
            $json = file_get_contents(resource_path('data/sidebar.json'));
            $datas = json_decode($json, true);
            $datas[$type][$request->id]['status'] = 0;
            $newJsonString = json_encode($datas, JSON_PRETTY_PRINT);
            file_put_contents(resource_path('data/sidebar.json'), stripslashes($newJsonString));

            $notify[] = ['success', 'Deactivated Successfully'];
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


    public function sidebar_submenu_edit($type, $id, $submenu_id)
    {
        $json = file_get_contents(resource_path('data/sidebar.json'));
        $sidebar = arrayToObject(json_decode($json, true)[$type][$id]['submenu'][$submenu_id]);
        $page_title = "Sidebar Edit";
        $permissions = Permission::select('id', 'title', 'code')->get();
        return view('admin.setting.sidebar_submenu_edit', compact('page_title', 'sidebar', 'id', 'submenu_id', 'permissions', 'type'));
    }

    public function sidebar_submenu_update(Request $request, $type,  $id, $submenu_id)
    {
        $json = file_get_contents(resource_path('data/sidebar.json'));
        $datas = json_decode($json, true);
        $datas[$type][$id]['submenu'][$request->id]['name'] = $request->name;
        $datas[$type][$id]['submenu'][$request->id]['icon'] = str_replace("bi bi-", "", $request->icon);
        $datas[$type][$id]['submenu'][$request->id]['permission'] = $request->permission;
        $request->merge(['status' => isset($request->status) ? 1 : 0]);
        $datas[$type][$id]['submenu'][$request->id]['status'] = $request->status;
        $newJsonString = json_encode($datas, JSON_PRETTY_PRINT);
        file_put_contents(resource_path('data/sidebar.json'), stripslashes($newJsonString));

        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }

    public function sidebar_submenu_activate($type,  $id, $submenu_id)
    {
        $json = file_get_contents(resource_path('data/sidebar.json'));
        $datas = json_decode($json, true);
        $datas[$type][$id]['submenu'][$submenu_id]['status'] = 1;
        $newJsonString = json_encode($datas, JSON_PRETTY_PRINT);
        file_put_contents(resource_path('data/sidebar.json'), stripslashes($newJsonString));

        $notify[] = ['success', 'Activated Successfully'];
        return back()->withNotify($notify);
    }

    public function sidebar_submenu_deactivate($type,  $id, $submenu_id)
    {
        $json = file_get_contents(resource_path('data/sidebar.json'));
        $datas = json_decode($json, true);
        $datas[$type][$id]['submenu'][$submenu_id]['status'] = 0;
        $newJsonString = json_encode($datas, JSON_PRETTY_PRINT);
        file_put_contents(resource_path('data/sidebar.json'), stripslashes($newJsonString));

        $notify[] = ['success', 'Deactivated Successfully'];
        return back()->withNotify($notify);
    }

    public function remove_install_file()
    {
        File::delete(public_path() . '/install/index.php');
        $notify[] = ['success', 'File removed successfully'];
        return back()->withNotify($notify);
    }
}
