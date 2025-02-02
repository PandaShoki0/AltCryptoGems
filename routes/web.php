<?php

use App\Models\GeneralSetting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CronController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TradeController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\RssfeedController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\Admin\KycController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\PopupsController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UpdateController;
use App\Http\Controllers\Admin\ScriptsController;
use App\Http\Controllers\Admin\CoinPairController;
use App\Http\Controllers\Admin\DatabaseController;
use App\Http\Controllers\Admin\ExtensionController;
use App\Http\Controllers\Admin\Ext\InstallController;
use App\Http\Controllers\Admin\InvestmentLogController;
use App\Http\Controllers\Admin\SupportTicketController;
use App\Http\Controllers\Admin\TradeCategoryController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\InvestmentPlanController;
use App\Http\Controllers\Admin\MultipleSignalController;
use App\Http\Controllers\User\KycController as UserKycController;
use App\Http\Controllers\Admin\Providers\ProviderInstallController;
use App\Http\Controllers\Extensions\Ico\IcoController;
use App\Http\Controllers\Extensions\Staking\StakingController;
use App\Http\Controllers\BinaryController;
use App\Http\Controllers\Extensions\Ecommerce\EcommerceController;

Route::get('/clear', function () {
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login/wp', 'UserController@authenticateWPUser')->name('login.wp.user');

Route::get('mail-test', function(){
    Illuminate\Support\Facades\Mail::raw('Hello World!', function($msg) {$msg->to('valiantmaksud@gmail.com')->subject('Test Email'); });
});

Route::fallback(function ($path) {
    
    return view('frontends.liquid-vestor.home');

    $frontendPath = GeneralSetting::first()->frontend;
    $folderPath = substr($frontendPath, 0, strrpos($frontendPath, '/'));

    // Check if the requested file exists
    if (File::exists(public_path() . $folderPath . '/' . $path . '.html')) {
        // If the file exists, serve it with the correct base URL
        $htmlContent = File::get(public_path() . $folderPath . '/' . $path . '.html');
        $baseURL = url($folderPath);
        $baseTag = '<base href="' . $baseURL . '/">';
        $htmlContent = preg_replace('/<head>/', '<head>' . $baseTag, $htmlContent);

        // Update the links in the HTML content
        $htmlContent = preg_replace_callback(
            '/<a([^>]+)href="((?!http)(.*?)\.html)"/',
            function ($matches) {
                return '<a' . $matches[1] . 'href="/' . $matches[3] . '"';
            },
            $htmlContent
        );

        return response($htmlContent)->header('Content-Type', 'text/html');
    }

    // If the file does not exist, return a 404 response
    abort(404);
});



Route::post('/verify-csrf', 'UserController@verifyCsrf')->name('verify-csrf');
Route::get('cron', 'CronController@trade_results')->name('cron');
Route::get('cron/practice', 'CronController@practice_results')->name('practice.cron');
Route::get('cron/schedule', 'CronController@schedule_orders')->name('schedule.cron');
Route::get('cron/crypto/price', 'CronController@store')->name('crypt.price');
getRoute(1, 'cron');
getRoute(3, 'cron');
getRoute(4, 'cron');
getRoute(6, 'cron');
getRoute(10, 'cron');
getRoute(14, 'cron');
Route::get('cron/provider/currencies', 'CronController@currencies')->name('provider.currencies');
Route::get('cron/provider/currenciesToTable', 'CronController@currencies_to_table')->name('provider.currenciesToTable');
Route::get('cron/provider/marketsToTable', 'CronController@markets_to_table')->name('provider.marketsToTable');
getRoute(15, 'cron');
Route::get('cron/provider/pairsToTable', 'CronController@pairs_to_table')->name('provider.pairsToTable');
Route::get('cron/provider/fetch/order', 'CronController@fetch_order')->name('provider.fetchorder');
Route::get('cron/check_update', 'CronController@check_update')->name('cron.check_update');
Route::get('cron/investment/check', 'InvestmentController@cron')->name('cron.check_investment');

Route::get('/generate-qrcode', [QrCodeController::class, 'index']);

Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
    Route::post('paypal', 'paypal\ProcessController@ipn')->name('paypal');
    Route::get('paypal_sdk', 'paypal_sdk\ProcessController@ipn')->name('paypal_sdk');
    Route::post('perfect_money', 'perfect_money\ProcessController@ipn')->name('perfect_money');
    Route::post('stripe', 'stripe\ProcessController@ipn')->name('stripe');
    Route::post('stripe_js', 'stripe_js\ProcessController@ipn')->name('stripe_js');
    Route::post('stripe_v3', 'stripe_v3\ProcessController@ipn')->name('stripe_v3');
    Route::post('skrill', 'skrill\ProcessController@ipn')->name('skrill');
    Route::post('paytm', 'paytm\ProcessController@ipn')->name('paytm');
    Route::post('payeer', 'payeer\ProcessController@ipn')->name('payeer');
    Route::post('paystack', 'paystack\ProcessController@ipn')->name('paystack');
    Route::post('voguepay', 'voguepay\ProcessController@ipn')->name('voguepay');
    Route::get('flutterwave/{trx}/{type}', 'flutterwave\ProcessController@ipn')->name('flutterwave');
    Route::post('razorpay', 'razorpay\ProcessController@ipn')->name('razorpay');
    Route::post('instamojo', 'instamojo\ProcessController@ipn')->name('instamojo');
    Route::get('blockchain', 'blockchain\ProcessController@ipn')->name('blockchain');
    Route::get('blockio', 'blockio\ProcessController@ipn')->name('blockio');
    Route::post('coinpayments', 'coinpayments\ProcessController@ipn')->name('coinpayments');
    Route::post('coinpayments_fiat', 'coinpayments_fiat\ProcessController@ipn')->name('coinpayments_fiat');
    Route::post('coingate', 'coingate\ProcessController@ipn')->name('coingate');
    Route::post('coinbase_commerce', 'coinbase_commerce\ProcessController@ipn')->name('coinbase_commerce');
    Route::get('mollie', 'mollie\ProcessController@ipn')->name('mollie');
    Route::post('cashmaal', 'cashmaal\ProcessController@ipn')->name('cashmaal');
});

Route::post('install', [UpdateController::class, 'download_update'])->name('install');

//Route::any('api/{any}', 'ViewController@app')->where('any','^(?!api).*$');

/*
|--------------------------------------------------------------------------
| Start Frontend Area
|--------------------------------------------------------------------------
*/

// Root route
$plat = arrayToObject(getPlatforms());
if (!isset($plat->system->maintenance) || $plat->system->maintenance != 1) {
    if (!isset($plat->frontend->frontend_status) || $plat->frontend->frontend_status != 1) {
        Route::get('/', function () {
            return redirect(route('user.home'));
        })->name('home');
    } else {
        Route::get('/', [HomeController::class, 'home'])->name('home');
    }
} else {
    Route::get('/', [HomeController::class, 'maintenance'])->name('home');
}
Route::get('/trading/{title}', [HomeController::class, 'page'])->name('page');
Route::get('about', [HomeController::class, 'about'])->name('frontend.pages.about');
Route::get('banned', [HomeController::class, 'banned'])->name('banned');
Route::post('/subscribe', 'SiteController@subscribe')->name('subscribe');
Route::get('/contact', 'SiteController@contact')->name('contact');
Route::post('/contact', 'SiteController@contactSubmit')->name('contact.send');
Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholderImage');
//Route::get('/{slug}', 'SiteController@pages')->name('pages');


/**
 * LiquidVestor Route
 */
Route::view('markets', 'frontends.liquid-vestor.markets')->name('markets');
Route::view('about', 'frontends.liquid-vestor.about')->name('about');
Route::view('legal-docs', 'frontends.liquid-vestor.legal-docs')->name('legal-docs');
Route::view('roadmap', 'frontends.liquid-vestor.roadmap')->name('roadmap');
Route::view('education', 'frontends.liquid-vestor.education')->name('education');
Route::view('customers', 'frontends.liquid-vestor.customers')->name('customers');
Route::view('help-center', 'frontends.liquid-vestor.help-center')->name('help-center');
Route::match(['get', 'post'],'contact', 'HomeController@contact')->name('contact');
Route::view('careers', 'frontends.liquid-vestor.career')->name('careers');
Route::get('blog', 'HomeController@blog')->name('blog');
Route::get('blog/{slug}', 'HomeController@blogDetail')->name('blog.show');
Route::view('terms-of-service.txt', 'frontends.liquid-vestor.terms-service')->name('terms-service');
Route::view('privacy-statement.txt', 'frontends.liquid-vestor.privacy-statement')->name('privacy-statement');


/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/


Route::get('lang/{locale}', [LanguageController::class, 'swap']);

require_once __DIR__ . '/jetstream.php';
require_once __DIR__ . '/fortify.php';

Route::group(['prefix' => 'trade', 'as' => 'trade.'], function () {
    Route::get('/{symbol}/{currency}', 'HomeController@trade')->name('trade');
    Route::post('/{symbol}/{currency}', 'ExchangeController@trading')->name('now');
});
 
Route::any('app/{any}', [UserController::class, 'index'])->name('home.component')->where('any', '[\/\w\.-]*');
Route::group(['middleware' => 'auth'], function () { 
    Route::group(['middleware' => ['verified', 'checkStatus'], 'role:user', 'prefix' => 'app', 'as' => 'app.'], function () {
        Route::any('/', [UserController::class, 'index'])->name('home')->where('any', '[\/\w\.-]*');
        // Route::any('/{any}', [UserController::class, 'index'])->name('home.component')->where('any', '[\/\w\.-]*');
    });
    Route::group(['middleware' => ['verified', 'checkStatus'], 'role:user', 'prefix' => 'user', 'as' => 'user.'], function () {

        Route::post('/pusher/auth', [PusherController::class, 'authenticate']);

        Route::post('dashboard', 'UserController@updateProfile')->name('profile.update');
        Route::post('/verify-license', 'UserController@userVerifyLicense')->name('verify-license');

        Route::get('/fetch-plans', [UserController::class, 'fetchPlans'])->name('plans');
        Route::post('/plan', 'UserController@submitPlan')->name('update.plan');

        // Router
        Route::get('/', [UserController::class, 'index'])->name('home');

        // Binary
        Route::group(['prefix' => 'binary', 'as' => 'binary.'], function () {
            // Trade
            Route::get('crypto/rate', 'TradeController@btcRate')->name('crypto.rate');
            Route::group(['prefix' => 'trade', 'as' => 'trade.'], function () {
                Route::post('store', 'TradeController@store')->name('store');
                Route::post('result', 'TradeController@tradeResult')->name('result');
                Route::post('schedule', 'TradeController@schedule')->name('schedule');
            });

            // Practice
            Route::post('/add/practice/balance', 'BinaryController@addPracticeBalance')->name('add.practice.balance');
            Route::group(['prefix' => 'practice', 'as' => 'practice.'], function () {
                Route::get('crypto/rate', 'PracticeController@btcRate')->name('crypto.rate');
                Route::post('exchange', 'PracticeController@exchange')->name('exchange');
                Route::post('store', 'PracticeController@store')->name('store');
                Route::post('result', 'PracticeController@tradeResult')->name('result');
                Route::post('schedule', 'PracticeController@schedule')->name('schedule');
            });
        });
        // Fetch
        Route::post('/api/tokens/edit', [UserController::class, 'api_tokens_edit']);
        Route::post('/api/tokens/store', [UserController::class, 'api_tokens_store']);
        Route::post('/api/tokens/delete', [UserController::class, 'api_tokens_delete']);
        Route::group(['prefix' => 'fetch', 'as' => 'fetch.'], function () {
            Route::get('/api/tokens', [UserController::class, 'api_tokens']);
            Route::post('/data', 'UserController@data');
            Route::post('/kyc/data', [UserKycController::class, 'fetchKycTemplate']);
            Route::post('/support', 'TicketController@fetch_tickets');
            Route::post('/support/ticket/{id}', 'TicketController@fetch_ticket_messages');
            Route::post('/trade/orders', 'ExchangeController@trading_orders');
            Route::post('/trade/orders/{symbol}/{currency}', 'ExchangeController@trading_market_orders');

            Route::group(['prefix' => 'binary', 'as' => 'binary.'], function () {
                Route::post('/data', 'BinaryController@index');
                Route::group(['prefix' => 'trade', 'as' => 'trade.'], function () {
                    Route::post('{symbol}/{currency}', 'BinaryController@trade')->name('now');
                    Route::post('wallet', 'BinaryController@fetch_wallet')->name('wallet');
                    Route::post('contracts', 'BinaryController@binary_trade_log')->name('contract.log');
                    Route::post('orders', 'BinaryController@binary_trade_orders')->name('orders');
                    Route::post('wining/contracts', 'TradeController@winingTradeContract')->name('wining.contract.log');
                    Route::post('losing/contracts', 'TradeController@losingTradeContract')->name('losing.contract.log');
                    Route::post('draw/contracts', 'TradeController@drawTradeContract')->name('draw.contract.log');
                });

                // Practice
                Route::group(['prefix' => 'practice', 'as' => 'practice.'], function () {
                    Route::post('{symbol}/{currency}', 'BinaryController@practice')->name('now');
                    Route::post('contracts', 'BinaryController@binary_practice_log')->name('contract.log');
                    Route::post('orders', 'BinaryController@binary_practice_orders')->name('orders');
                });
                Route::post('/contract/view/{type}/{id}', 'BinaryController@preview')->name('contract.preview');
            });

            Route::post('/wallets', 'WalletController@fetch_wallets')->name('wallets');
            Route::post('/wallet/{type}/{symbol}/{address}', 'WalletController@fetch_wallet')->name('wallet');
            Route::post('/wallet', 'WalletController@fetch_wallet_balance')->name('wallet.balance');

            Route::post('/withdraw/history', 'UserController@fetch_withdraw_history')->name('withdraw.history');
            Route::post('/deposit/history', 'UserController@fetch_deposit_history')->name('deposit.history');
            Route::post('/transaction/history', 'UserController@fetch_transaction_history')->name('transaction.history');

            Route::post('news', [RssfeedController::class, 'fetch_news'])->name('news');
        });

        // Trade
        Route::group(['prefix' => 'trade', 'as' => 'trade.'], function () {
            Route::post('/{symbol}/{currency}', 'ExchangeController@trading')->name('now');
            Route::post('store', 'ExchangeController@store')->name('store')->middleware('vue');
            Route::post('cancel', 'ExchangeController@cancel')->name('cancel')->middleware('vue');
            Route::post('fetch_order', 'ExchangeController@fetch_order');
            Route::group(['namespace' => 'Admin'], function () {
                Route::get('/fetch-trade', 'AdminController@trade')->name('trade');
                Route::get('/get-all-assets', 'AdminController@loadAllSymbols')->name('getassets');
                Route::post('/trade-new-position', 'AdminTradeController@executeTrade')->name('trade-position');
                Route::get('/reload-trade-history/{max}', 'AdminTradeController@reloadTradeHistory')->name('history-reload');
                Route::get('/reload-trade-history-page', 'AdminTradeController@reloadTradeHistoryPage')->name('history-reload-page');
                Route::get('/gethistory-full', 'AdminTradeController@liveFullHistory')->name('tradehistoryfull');
                Route::get('/gethistory', 'AdminTradeController@liveHistory')->name('tradehistory');
                Route::post('/send-close-trade', 'AdminTradeController@closeTradeApi')->name('close_trade');
                Route::get('/close-position-history', 'AdminTradeController@closedHistory')->name('close-position-reload');                    
                Route::get('/trade-earnings-reload', 'AdminTradeController@reloadedEarnings')->name('trade-earnings-reload');
                Route::post('/save-profit-loss', 'AdminTradeController@saveProfitLossApi')->name('save_profit_loss');
            });
        });

        // Wallet
        Route::group(['prefix' => 'wallet', 'as' => 'wallet.'], function () {
            Route::post('/store', 'WalletController@store')->name('store');
            Route::post('/make-dafault', 'WalletController@make_default')->name('make_default');
            Route::post('/fetch', 'WalletController@fetchWallet')->name('fetch');
            Route::post('/regenerate', 'WalletController@regenerate')->name('regenerate');
            Route::post('/deposit', 'WalletController@deposit')->name('deposit');
            Route::get('/deposit/verify/{trx}', 'WalletController@verify');
            Route::get('/deposit/cancel/{trx}', 'WalletController@cancel');
            Route::post('/withdraw', 'WalletController@withdraw')->middleware('vue')->name('withdraw');
            Route::post('/transfer', 'WalletController@transfer')->name('transfer');
            Route::post('/connect', 'WalletController@connect')->name('connect');
            Route::post('/disconnect', 'WalletController@disconnect')->name('disconnect');
        });


        //Watchlist
        Route::post('watchlists', [WatchlistController::class, 'index'])->name('watchlists');
        Route::post('watchlist/data', [WatchlistController::class, 'favs']);
        Route::post('watchlist/store', [WatchlistController::class, 'store'])->name('watchlist.store');
        Route::post('watchlist/delete', [WatchlistController::class, 'delete'])->name('watchlist.delete');

        //KYC
        Route::get('/kyc', 'User\KycController@index')->name('kyc');
        Route::get('/kyc/application', 'User\KycController@application')->name('kyc.application');
        Route::get('/kyc/application/view', 'User\KycController@view')->name('kyc.application.view');
        Route::post('/kyc/submit', 'User\KycController@submit')->name('kyc.submit');

        getRoute(1, 'user');
        getRoute(2, 'user');
        getRoute(3, 'user');
        getRoute(4, 'user');
        getRoute(5, 'user');
        getRoute(6, 'user');
        getRoute(8, 'user');
        getRoute(9, 'user');
        getRoute(10, 'user');
        getRoute(11, 'user');
        getRoute(13, 'user');
        getRoute(15, 'user');

        // Deposit
        Route::any('deposit/wallet', 'Gateway\PaymentController@deposit')->name('deposit');
        Route::post('deposit/insert', 'Gateway\PaymentController@depositInsert')->name('deposit.insert');
        Route::get('deposit/preview', 'Gateway\PaymentController@depositPreview')->name('deposit.preview');
        Route::get('deposit/confirm', 'Gateway\PaymentController@depositConfirm')->name('deposit.confirm');
        Route::get('deposit/manual', 'Gateway\PaymentController@manualDepositConfirm')->name('deposit.manual.confirm');
        Route::post('deposit/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('deposit.manual.update');
        Route::get('deposit/history', 'UserController@depositHistory')->name('deposit.history');

        // Withdraw
        Route::get('/withdraw/wallet/{symbol}', 'UserController@withdrawMoney')->name('withdraw');
        Route::post('/withdraw', 'UserController@withdrawStore')->name('withdraw.money');
        Route::get('/withdraw/preview', 'UserController@withdrawPreview')->name('withdraw.preview');
        Route::post('/withdraw/preview', 'UserController@withdrawSubmit')->name('withdraw.submit');
        Route::get('/withdraw/history', 'UserController@withdrawLog')->name('withdraw.history');

        // User Support Ticket
        Route::prefix('support')->name('support.')->group(function () {
            Route::prefix('tickets')->name('ticket.')->group(function () {
                Route::get('/', [TicketController::class, 'index'])->name('index');
                Route::post('/', [TicketController::class, 'store'])->name('store');
                Route::get('/{id}/messages', [TicketController::class, 'getMessages']);
                Route::post('/{id}/send', [TicketController::class, 'createMessage']);
                Route::post('/upload-image', [TicketController::class, 'uploadImage'])->name('upload-image'); // Add this line
            });
        });      


        // Popups
        Route::name('popups.')->prefix('popups')->group(function () {
            Route::post('/disable', [PopupsController::class, 'disable_popup'])->name('disable');
        });

        Route::prefix('investment')->group(function () {
            // Investments
            Route::get('/', [InvestmentController::class, 'index']);
            Route::post('/store', [InvestmentController::class, 'store']);
            Route::put('/{id}', [InvestmentController::class, 'update']);
            Route::delete('/{id}', [InvestmentController::class, 'destroy']);

            // Investment Logs
            Route::prefix('log')->name('log.')->group(function () {
                Route::get('/', [InvestmentLogController::class, 'index']);
                Route::post('/cancel', [InvestmentController::class, 'cancel']);
            });
        });
    });

    // Admin
    Route::group(['middleware' => 'role:admin,demo', 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('market', [MarketController::class, 'index'])->name('market');
        Route::resource('tokens', 'TokensController');
        Route::get('api-tokens', 'AdminController@api')->name('api.index');
        Route::get('/clear', 'AdminController@clean')->name('clean')->middleware('demo');
        Route::match(array('GET', 'POST'), 'update', [UpdateController::class, 'index'])->name('update')->middleware('demo');
        Route::get('/update/check', [UpdateController::class, 'check_new_version'])->name('update.check');
        Route::match(array('GET', 'POST'), 'lic/activate', [UpdateController::class, 'lic_activate'])->name('lic.activate')->middleware('demo');
        Route::match(array('GET', 'POST'), 'lic/deactivate', [UpdateController::class, 'lic_deactivate'])->name('lic.deactivate')->middleware('demo');
        Route::get('impersonate-in/{user}', 'ImpersonateController@impersonateIn')->name('impersonate.in');

        Route::get('impersonate-out', 'ImpersonateController@impersonateOut')->name('impersonate.out');

        // Admin Multiple Signals
        Route::controller(MultipleSignalController::class)
        ->prefix('multiple-signals')
        ->as('multiple-signals.')
        ->group(function () {
            Route::get('generate', 'generate')->name('generate');
            Route::post('generate', 'store')->name('generate.store');
            Route::get('predictions/{session_type}', 'predictions')->name('predictions');
            Route::get('predictions/{session_id}/trades', 'predictionTrades')->name('predictions.trades');
        });
        Route::resource('trade-categories', TradeCategoryController::class);
        Route::post('trade-categories/update-status/{id}', [TradeCategoryController::class, 'updateStatus'])->name('trade-categories.update-status');
        Route::resource('coin-pairs', CoinPairController::class);
        Route::post('coin-pairs/update-status/{id}', [CoinPairController::class, 'updateStatus'])->name('coin-pairs.update-status');


        //  Tests
        Route::get('/tests', [TestController::class, 'index'])->name('tests');
        Route::get('/test/cors', [TestController::class, 'cors'])->name('test.cors');

        // Terminal
        Route::get('/terminal', [TestController::class, 'terminal'])->name('terminal');
        Route::post('/terminal/run/{command}', [TestController::class, 'runCommand'])->name('terminal.run');


        Route::get('cron', [CronController::class, 'view'])->name('cron');

        // Notifications
        Route::get('notification/read/{id}', 'AdminController@notificationRead')->name('notification.read');
        Route::get('notification', 'AdminController@notifications')->name('notifications');
        Route::get('notification/clean', 'AdminController@notifications_clean')->name('notifications.clean');
        Route::get('notification/clean/seen', 'AdminController@notifications_clean_seen')->name('notifications.clean.seen');

        // Users Manager
        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('/', 'UsersController@allUsers')->name('all');
            Route::get('/import', [UsersController::class, 'import'])->middleware('demo')->name('import');
            Route::post('/importing', [UsersController::class, 'importing'])->middleware('demo')->name('importing');
            Route::get('/template', 'UsersController@downloadTemplate')->name('template');
            Route::post('remove', 'UsersController@remove')->name('remove')->middleware('demo');

            // Login History
            Route::get('login/history/{id}', 'UsersController@userLoginHistory')->name('login.history.single');
            Route::get('send-email', 'UsersController@showEmailAllForm')->name('email.all');
            Route::post('send-email', 'UsersController@sendEmailAll')->name('email.send')->middleware('demo');
            Route::get('referral/log/{id}', 'UsersController@referralLog')->name('referral.log');
            Route::get('manage/{id}', 'UsersController@manage')->name('manage');
            Route::get('users-balance/{id}', 'UsersController@ManageBalanceByUsers')->name('balance');
            Route::post('users-balance', 'UsersController@saveBalanceByUsers')->name('balance.update');
            Route::get('user-demo-balance/{id}', 'UsersController@ManageDemoBalanceByUsers')->name('demobalance');
            Route::post('user-demo-balance', 'UsersController@saveDemoBalanceByUsers')->name('demobalance.update');
            Route::get('generate-predictions/{user_id}', 'UsersController@generatePredictions')->name('generate.predictions');
            Route::get('show-prediction/{type}/{user_id}', 'UsersController@showPredictions')->name('showprediction');
            Route::post('save-predictions', 'UsersController@savePredictions')->name('savepredictions');
            Route::post('delete-predictions', 'UsersController@deletePredictions')->name('prediction.delete'); 
            Route::get('trade-manager/{user_id}', 'UsersController@userTradeManager')->name('manage-positions');
            Route::get('/user/{id}/plan', 'UsersController@userPlan')->name('plan');
            Route::post('/user/{id}/approve', 'UsersController@approvePlan')->name('approveplan');
            Route::post('/user/{id}/update', 'UsersController@updateUserPlan')->name('updateplan');
            Route::get('/manage-license/{user_id}', 'UsersController@userManageLicense')->name('manage-license');
            Route::post('/update-license-prompt/{user_id}', 'UsersController@userUpdateLicensePrompt')->name('update-license-prompt');
            Route::post('/generate-license/{user_id}', 'UsersController@userGenerateLicense')->name('generate-license');
            Route::post('/pend-user-message/{id}', 'UsersController@pendAccountMessage')->name('pend-user');
            Route::get('/unpend-user/{id}', 'UsersController@unpendAccount')->name('unpend');
            Route::post('/deactivate-withdrawal/{id}', 'UsersController@deactivateWithdrawal')->name('deactivatewithdrawal');
            Route::get('/activate-withdrawal/{id}', 'UsersController@activateWithdrawal')->name('activatewithdrawal');
            Route::get('/user-transaction/{id}', 'UsersController@userTrans')->name('trans');
            Route::get('/user-deposit/{id}',  'UsersController@userDeposit')->name('deposit');
            Route::get('/user-correct-deposit/{id}', 'UsersController@correctDeposit')->name('correct.deposits');    
            Route::get('/user-pending-deposit/{id}',  'UsersController@userPendingDeposit')->name('pending.deposit');
            Route::get('/user-withdraw/{id}', 'UsersController@userWithdraw')->name('withdraw');
            Route::post('/trade-new-position/{user_id}', 'UsersController@executeTrade')->name('trade-new-position');
            Route::get('/get-all-assets', 'AdminController@loadAllSymbols')->name('get.assets');
            Route::get('/trade-history-load/{user_id}', 'UsersController@tradeHistoryUser')->name('trade.history');
            Route::post('/send-close-trade', 'UsersController@closeTradeApi')->name('trade.close_trade');
            Route::get('/reload-trade-history/{max}', 'UsersController@reloadTradeHistory')->name('trade.history-reload');
            Route::delete('/trade-position-delete/{user_id}', 'UsersController@deleteTradePosition')->name('trade.delete.trade-position');
            Route::put('/trade-position-close/{user_id}', 'UsersController@closeTradePosition')->name('trade.position.close');
            Route::post('/confirm-position-close/{user_id}', 'UsersController@confirmTradePositionClose')->name('trade.confirm.trade.position.close');
            Route::put('user/pass-change/{user}', 'UsersController@userPasschange')->name('passchange');
            Route::get('/deposit/{deposit}/delete', 'UsersController@delete')->name('deposit.delete');
            Route::put('/deposit/approve/{id}', 'UsersController@approve')->name('deposit.approve');
            Route::put('user/profit-range/{user}', 'UsersController@profitRange')->name('profit-range');
            Route::put('/update-default-wallet/{user_id}', 'UsersController@updateDefaultWallet')->name('update-default-wallet');
            Route::get('/fix-user-trade/{user_id}', 'UsersController@userFixTrade')->name('fix-trade');

            Route::get('/plan-create', 'UsersController@createPlan')->name('plan.create');

            Route::post('/plan-create', 'UsersController@storePlan')->name('plan.store');
        
            Route::get('/plans', 'UsersController@plans')->name('plan.all');
        
            Route::get('/plan-edit/{id}', 'UsersController@editPlan')->name('plan.edit');
        
            Route::post('/plan-update', 'UsersController@updatePlan')->name('plan.update');

        });

        // User Manager
        Route::group(['prefix' => 'user', 'as' => 'users.'], function () {
            Route::get('detail/{id}', 'UsersController@detail')->name('detail');
            Route::post('update/{id}', 'UsersController@update')->name('update')->middleware('demo');
            Route::post('add-sub-balance/{id}', 'UsersController@addSubBalance')->name('addSubBalance')->middleware('demo');

            Route::post('/wallet/create', 'UsersController@wallet_create')->name('wallet.create');
            Route::get('/{id}/wallets/fetch', 'UsersController@fetchWallets');
            Route::get('/{id}/wallets/eco', 'UsersController@fetchEcoWallets');

            Route::post('/wallet/frozen/create', 'UsersController@frozen_wallet_create')->name('wallet.frozen.create');
            Route::post('add-sub-balance-frozen/{id}', 'UsersController@addSubBalanceFrozen')->name('addSubBalanceFrozen')->middleware('demo');

            Route::get('send-email/{id}', 'UsersController@showEmailSingleForm')->name('email.single');
            Route::post('send-email/{id}', 'UsersController@sendEmailSingle')->middleware('demo');
            Route::get('transactions/{id}', 'UsersController@transactions')->name('transactions');
            Route::get('deposits/{id}', 'UsersController@deposits')->name('deposits');
            Route::get('deposits/via/{method}/{type?}/{userId}', 'UsersController@depViaMethod')->name('deposits.method');
            Route::get('withdrawals/{id}', 'UsersController@withdrawals')->name('withdrawals');
            Route::get('withdrawals/via/{method}/{type?}/{userId}', 'UsersController@withdrawalsViaMethod')->name('withdrawals.method');
            Route::get('practice/trade/{id}', 'UsersController@practiceLog')->name('practice.log');
            Route::get('trade/traded/{id}', 'UsersController@traded')->name('traded');
            Route::get('trade/wining/{id}', 'UsersController@wining')->name('wining');
            Route::get('trade/losing/{id}', 'UsersController@losing')->name('losing');
            Route::get('trade/draw/{id}', 'UsersController@draw')->name('draw');
        });


        Route::group(['prefix' => 'binary', 'as' => 'binary.'], function () {
            Route::get('trade/log', 'BinaryController@trade_log')->name('trade.log.list');
            Route::get('practice/trade/log', 'BinaryController@practice_log')->name('practice.log.list');
        });

        // Exchange Logs
        Route::get('trade/log', [ReportController::class, 'exchange_log'])->name('exchange.log.list');

        // Providers
        Route::group(['prefix' => 'provider', 'as' => 'provider.'], function () {
            Route::get('/', 'ThirdpartyController@index')->name('index');

            Route::get('edit/{id}', 'ThirdpartyController@edit')->name('edit')->middleware('demo');
            Route::get('balances/{id}', 'ThirdpartyController@balances')->name('balances')->middleware('demo');
            Route::post('update', 'ThirdpartyController@update')->name('update')->middleware('demo');
            Route::post('activate', 'ThirdpartyController@activate')->name('activate')->middleware('demo');
            Route::post('deactivate', 'ThirdpartyController@deactivate')->name('deactivate')->middleware('demo');
            Route::match(array('GET', 'POST'), 'install/{id}', [ProviderInstallController::class, 'index'])->name('install');
            Route::get('activater/{id}', [ProviderInstallController::class, 'activater'])->name('activater');
            Route::post('verify', [ProviderInstallController::class, 'activate_licenser'])->name('verify');
            Route::post('updater/{id}', [ProviderInstallController::class, 'update'])->name('updater')->middleware('demo');

            Route::get('/{provider}/currencies', 'ThirdpartyController@currencies')->name('currencies.index');
            Route::get('/{provider}/markets', 'ThirdpartyController@markets')->name('markets.index');
            Route::post('/markets/activate', 'ThirdpartyController@market_activate')->name('market.activate')->middleware('demo');
            Route::post('/markets/deactivate', 'ThirdpartyController@market_deactivate')->name('market.deactivate')->middleware('demo');
            Route::post('/markets/bulk/activate', 'ThirdpartyController@bulk_market_activate')->name('market.bulk.activate');
            Route::post('/markets/bulk/deactivate', 'ThirdpartyController@bulk_market_deactivate')->name('market.bulk.deactivate');
            Route::get('/markets/delete', 'ThirdpartyController@market_delete')->name('market.delete');
            Route::get('/refresh', 'ThirdpartyController@refresh')->name('refresh')->middleware('demo');
        });

        // Deposit Gateway
        Route::name('payment.')->prefix('payment')->group(function () {
            // Automatic Gateway
            Route::get('provider', 'GatewayController@index')->name('provider.index');
            Route::get('provider/edit/{alias}', 'GatewayController@edit')->name('provider.edit');
            Route::post('provider/update/{code}', 'GatewayController@update')->name('provider.update')->middleware('demo');
            Route::post('provider/remove/{code}', 'GatewayController@remove')->name('provider.remove')->middleware('demo');

            // Manual Methods
            Route::get('manual', 'ManualGatewayController@index')->name('manual.index');
            Route::get('manual/new', 'ManualGatewayController@create')->name('manual.create');
            Route::post('manual/new', 'ManualGatewayController@store')->name('manual.store')->middleware('demo');
            Route::get('manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
            Route::post('manual/update/{id}', 'ManualGatewayController@update')->name('manual.update')->middleware('demo');
        });


        // Deposit System
        Route::name('deposit.')->prefix('deposit')->group(function () {
            Route::get('/', 'DepositController@deposit')->name('list');
            Route::get('details/{id}', 'DepositController@details')->name('details');
            Route::get('via/{method}/{type?}', 'DepositController@depViaMethod')->name('method');

            Route::post('reject', 'DepositController@reject')->name('reject')->middleware('demo');
            Route::post('approve', 'DepositController@approve')->name('approve')->middleware('demo');

            Route::post('thirdparty/confirm', 'ThirdpartyController@confirmDeposit')->name('thirdparty.confirm');
            Route::get('thirdparty/remove/{id}', 'ThirdpartyController@removeDeposit')->name('thirdparty.remove');
        });

        // Withdraw
        Route::name('withdraw.')->prefix('withdraw')->group(function () {
            Route::get('log', 'WithdrawalController@log')->name('log');
            Route::get('via/{method_id}/{type?}', 'WithdrawalController@logViaMethod')->name('method');
            Route::get('details/{id}', 'WithdrawalController@details')->name('details');
            Route::post('approve', 'WithdrawalController@approve')->name('approve')->middleware('demo');
            Route::post('reject', 'WithdrawalController@reject')->name('reject')->middleware('demo');

            // Withdraw Method
            Route::get('', 'WithdrawMethodController@methods')->name('method.index');
            Route::get('create', 'WithdrawMethodController@create')->name('method.create');
            Route::post('create', 'WithdrawMethodController@store')->name('method.store')->middleware('demo');
            Route::get('edit/{id}', 'WithdrawMethodController@edit')->name('method.edit');
            Route::post('edit/{id}', 'WithdrawMethodController@update')->name('method.update')->middleware('demo');
            Route::post('activate', 'WithdrawMethodController@activate')->name('method.activate')->middleware('demo');
            Route::post('deactivate', 'WithdrawMethodController@deactivate')->name('method.deactivate')->middleware('demo');
        });

        // Report
        Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
            Route::get('/transaction', 'ReportController@transaction')->name('transaction');

            Route::get('/wallet', 'ReportController@wallet')->name('wallet');
            Route::post('/wallet/cancel', 'ReportController@wallet_trx_cancel')->name('wallet.cancel');
            Route::post('/wallet/transfer/funding/approve', 'ReportController@wallet_transfer_funding_approve')->name('wallet.transfer.funding.approve');
            Route::post('/wallet/transfer/funding/reject', 'ReportController@wallet_transfer_funding_reject')->name('wallet.transfer.funding.reject');

            Route::get('/login/history', 'ReportController@loginHistory')->name('login.history');
            Route::get('/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('login.ipHistory');
        });

        // Admin Support
        Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
        Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
        Route::get('/tickets/{id}/chat', [SupportTicketController::class, 'getMessages'])->name('ticket.chat.get');
        Route::post('/tickets/{id}/chat', [SupportTicketController::class, 'createMessage'])->name('ticket.chat.send');
        Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply')->middleware('demo');
        Route::post('ticket/close/{id}', 'SupportTicketController@close')->name('ticket.close')->middleware('demo');
        Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete')->middleware('demo');



        // General Setting
        Route::get('settings', 'GeneralSettingController@index')->name('setting.index');
        Route::post('settings', [GeneralSettingController::class, 'update'])->name('setting.update')->middleware('demo');
        Route::get('/settings/cors/create', [GeneralSettingController::class, 'create_cors'])->name('setting.cors.create')->middleware('demo');

        // Currencies Setting
        Route::get('currencies', 'GeneralSettingController@currencies')->name('currency.index');
        Route::post('currencies', 'GeneralSettingController@currency_update')->name('currency.update')->middleware('demo');
        Route::post('currencies/rates', 'GeneralSettingController@updateExchangeRates')->name('currency.rates')->middleware('demo');
        Route::post('activate', 'GeneralSettingController@currency_activate')->name('currency.activate')->middleware('demo');

        // Script Setting
        Route::get('/scripts', [ScriptsController::class, 'index'])->name('scripts');
        Route::post('/scripts', [ScriptsController::class, 'store'])->name('script.store');
        Route::post('/scripts/update', [ScriptsController::class, 'update'])->name('script.update');
        Route::delete('/scripts', [ScriptsController::class, 'delete'])->name('script.delete');

        // Platform Setting
        Route::get('platform', 'PlatformController@index')->name('platform');
        Route::post('platform', 'PlatformController@update')->name('platform.update')->middleware('demo');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo_icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo_icon_update')->middleware('demo');

        // Extensions
        Route::group(['prefix' => 'extensions', 'as' => 'extensions.'], function () {
            Route::get('/', [ExtensionController::class, 'index'])->name('index');
            Route::match(array('GET', 'POST'), 'install/{id}', [InstallController::class, 'index'])->middleware('demo')->name('install');
            Route::get('activater/{id}', [InstallController::class, 'activater'])->name('activater');
            Route::post('verify', [InstallController::class, 'activate_licenser'])->middleware('demo')->name('verify');
            Route::post('update/{id}', [ExtensionController::class, 'update'])->name('update')->middleware('demo');
            Route::post('activate', [ExtensionController::class, 'activate'])->name('activate')->middleware('demo');
            Route::post('deactivate', [ExtensionController::class, 'deactivate'])->name('deactivate')->middleware('demo');
        });

        getRoute(1, 'admin');
        getRoute(2, 'admin');
        getRoute(3, 'admin');
        getRoute(4, 'admin');
        getRoute(5, 'admin');
        getRoute(6, 'admin');
        getRoute(8, 'admin');
        getRoute(10, 'admin');
        getRoute(11, 'admin');
        getRoute(13, 'admin');
        getRoute(14, 'admin');
        getRoute(15, 'admin');

        // SEO
        Route::get('seo-manager', [HomeController::class, 'seoEdit'])->name('seo');
        Route::post('frontend-content/{key}', [HomeController::class, 'frontendContent'])->name('seo.content')->middleware('demo');

        // Frontend
        Route::name('template.')->prefix('template')->group(function () {
            Route::get('index', 'AdminController@frontend')->name('index');
            Route::post('save', 'AdminController@frontend_save')->middleware('demo')->name('save');
            Route::post('set', 'AdminController@frontend_set')->middleware('demo')->name('set');
        });

        // KYC
        Route::group(['prefix' => 'kyc', 'as' => 'kyc.'], function () {
            Route::get('/list', 'KycController@index')->name('list');
            Route::get('/templates', 'KycController@templates')->name('templates');
            Route::get('/template/new', 'KycController@template_new')->name('template.new');
            Route::post('/tempalte/store', 'KycController@template_store')->name('template.store');
            Route::get('/tempalte/edit/{id}', 'KycController@template_edit')->name('template.edit');
            Route::post('/tempalte/update', 'KycController@template_update')->name('template.update')->middleware('demo');
            Route::get('/view/{id}/{type}', 'KycController@show')->name('view');
            Route::post('/update', 'KycController@update')->name('update')->middleware('demo');
            Route::post('/delete', 'KycController@delete')->name('delete')->middleware('demo');
            Route::post('activate', [KycController::class, 'activate'])->name('activate')->middleware('demo');
            Route::post('deactivate', [KycController::class, 'deactivate'])->name('deactivate')->middleware('demo');
        });

        // Sidebar Manager
        Route::group(['prefix' => 'sidebar', 'as' => 'sidebar.'], function () {
            Route::get('admin', 'AdminController@sidebar_admin')->name('admin');
            Route::get('user', 'AdminController@sidebar_user')->name('user');

            Route::get('edit/{type}/{id}', 'AdminController@sidebar_edit')->name('edit')->middleware('demo');
            Route::post('update/{type}/{id}', 'AdminController@sidebar_update')->name('update')->middleware('demo');
            Route::post('{type}/activate', 'AdminController@sidebar_activate')->name('activate')->middleware('demo');
            Route::post('{type}/deactivate', 'AdminController@sidebar_deactivate')->name('deactivate')->middleware('demo');

            Route::get('edit/{type}/{id}/submenu/{submenu_id}', 'AdminController@sidebar_submenu_edit')->name('submenu.edit')->middleware('demo');
            Route::post('update/{type}/{id}/submenu/{submenu_id}', 'AdminController@sidebar_submenu_update')->name('submenu.update')->middleware('demo');
            Route::get('submenu/{type}/activate/{id}/{submenu_id}', 'AdminController@sidebar_submenu_activate')->name('submenu.activate')->middleware('demo');
            Route::get('submenu/{type}/deactivate/{id}/{submenu_id}', 'AdminController@sidebar_submenu_deactivate')->name('submenu.deactivate')->middleware('demo');
        });

        // Cleaners
        Route::get('/settings/database', 'DatabaseController@index')->name('settings.database')->middleware('demo');
        Route::post('/database/binary/practice/logs/clean', 'DatabaseController@clean_binary_practice_logs')->name('database.binary.practice.logs.clean')->middleware('demo');
        Route::post('/database/binary/trade/logs/clean', 'DatabaseController@clean_binary_trade_logs')->name('database.binary.trade.logs.clean')->middleware('demo');
        Route::post('/database/trade/logs/clean', 'DatabaseController@clean_trade_logs')->name('database.trade.logs.clean')->middleware('demo');
        Route::post('/database/forex/investments/logs/clean', 'DatabaseController@clean_forex_investments_logs')->name('database.forex.investments.logs.clean')->middleware('demo');
        Route::post('/database/bot/investments/logs/clean', 'DatabaseController@clean_bot_investments_logs')->name('database.bot.investments.logs.clean')->middleware('demo');
        Route::post('/database/staking/logs/clean', 'DatabaseController@clean_staking_logs')->name('database.staking.logs.clean')->middleware('demo');
        Route::post('/database/ico/logs/clean', 'DatabaseController@clean_ico_logs')->name('database.ico.logs.clean')->middleware('demo');
        Route::post('/database/wallets/clean', 'DatabaseController@clean_wallets')->name('database.wallets.clean')->middleware('demo');
        Route::post('/database/refresh/permissions', 'DatabaseController@refresh_permissions')->name('database.refresh.permissions')->middleware('demo');
        Route::post('/database/sidebar/refresh', 'DatabaseController@refresh_sidebar')->name('database.refresh.sidebar')->middleware('demo');
        Route::post('/database/investment/table/fix', [DatabaseController::class, 'checkAndAddLastProfitCalculationColumn'])->name('database.investment.table.fix')->middleware('demo');

        Route::get('/alerts/remove/install', 'AdminController@remove_install_file')->name('alerts.remove_install_file')->middleware('demo');

        // Popups
        Route::name('popups.')->prefix('popups')->group(function () {
            Route::get('', [PopupsController::class, 'index'])->name('index');
            Route::get('/create', [PopupsController::class, 'create'])->name('create');
            Route::get('/edit/{id}', [PopupsController::class, 'edit'])->name('edit');
            Route::post('/store', [PopupsController::class, 'store'])->name('store');
            Route::post('/update/{id}', [PopupsController::class, 'update'])->name('update');
            Route::post('/remove', [PopupsController::class, 'remove'])->name('remove');
        });

        // Locale
        Route::resource('locale', 'LocaleController')->middleware('demo');

        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');
        Route::post('roles/delete', 'RolesController@delete')->name('roles.delete');
        Route::get('roles/del/{role}', 'RolesController@destroy')->name('roles.del');

        //Route::resource('permissions', 'PermissionsController')->middleware('demo');
        Route::post('roles/assign', 'RolesController@assign')->name('roles.assign')->middleware('demo');
        Route::resource('roles', 'RolesController')->middleware('demo');

        //Notification Setting
        Route::post('/users/email/send', 'UsersController@send_email')->name('users.email')->middleware('demo');
        Route::name('settings.mail.')->controller('NotificationController')->prefix('/settings/email')->group(function () {
            //Template Setting
            Route::get('/', 'global')->name('index');
            Route::post('update', 'globalUpdate')->name('update')->middleware('demo');
            Route::get('templates', 'templates')->name('templates');
            Route::get('template/edit/{id}', 'templateEdit')->name('template.edit');
            Route::post('template/update/{id}', 'templateUpdate')->name('template.update')->middleware('demo');

            //Email Setting
            Route::get('settings', 'emailSetting')->middleware('demo')->name('email');
            Route::post('settings', 'emailSettingUpdate')->name('settings.update')->middleware('demo');
            Route::post('test', 'emailTest')->name('test')->middleware('demo');
            Route::get('test-smtp', 'emailSetting')->name('test.smtp')->middleware('demo');
            Route::post('test-smtp', 'testSMTP')->name('test.smtp.update')->middleware('demo');


            //SMS Setting
            Route::get('sms/settings', 'smsSetting')->middleware('demo')->name('sms');
            Route::post('sms/settings', 'smsSettingUpdate')->middleware('demo');
            Route::post('sms/test', 'smsTest')->name('sms.test')->middleware('demo');

            //Push Notification Setting
            Route::get('push-notification/settings', 'pushNotificationSetting')->middleware('demo')->name('push');
            Route::post('push-notification/settings', 'pushNotificationSettingUpdate')->middleware('demo')->name('push.update');
        });

        Route::prefix('investment')->name('investment.')->group(function () {

            // Investment Plans
            Route::prefix('plans')->name('plans.')->group(function () {
                Route::get('/', [InvestmentPlanController::class, 'index'])->name('index');
                Route::get('/create', [InvestmentPlanController::class, 'create'])->name('create');
                Route::post('/', [InvestmentPlanController::class, 'store'])->name('store');
                Route::put('/{id}/toggle-status', [InvestmentPlanController::class, 'toggleStatus'])->name('toggleStatus');
                Route::put('/{id}/toggle-recommanded', [InvestmentPlanController::class, 'toggleRecommanded'])->name('toggleRecommanded');
                Route::get('/{id}', [InvestmentPlanController::class, 'edit'])->name('edit');
                Route::put('/{id}', [InvestmentPlanController::class, 'update'])->name('update');
                Route::delete('/{id}', [InvestmentPlanController::class, 'destroy'])->name('destroy');
            });

            // Investment Logs
            Route::prefix('logs')->name('logs.')->group(function () {
                Route::get('/', [InvestmentLogController::class, 'index'])->name('index');
                Route::post('/{id}/cancel', [InvestmentLogController::class, 'cancel'])->name('cancel');
            });
        });
    });
});
Route::post('publicroute/fetch/ico', [IcoController::class, 'fetch_public_ico'])->name('public.fetch.ico');
Route::post('publicroute/fetch/staking', [StakingController::class, 'fetch_public_staking'])->name('public.fetch.staking');
Route::post('publicroute/knowledge', 'Extensions\KnowledgeBase\HomeController@index')->name('index');
Route::post('publicroute/fetch/marketplace', [EcommerceController::class, 'index_public']);