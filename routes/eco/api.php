<?php

// Route::prefix('eco')->group(function () {
//     Route::prefix('public')->group(function () {
//         Route::get('/markets',  [EcoController::class, 'markets']);
//         Route::get('/chart-data/{symbol}/{currency}/{timeframe}', [EcoController::class, 'chart']);
//         Route::post('/orderbook', [EcoController::class, 'orderbook']);
//         Route::post('/trades', [EcoController::class, 'trades']);
//     });

//     Route::middleware(['auth:api'])->prefix('private')->group(function () {
//         Route::post('/orders', [EcoController::class, 'orders']);
//         Route::post('/wallet/withdraw', [EcoController::class, 'withdraw']);
//         Route::post('/wallet/create', [EcoController::class, 'create_wallet']);
//         // Add other routes from the existing `private/eco` route group
//     });
// });

// routes/api.php

use App\Http\Controllers\Extensions\Eco\ChartController;
use App\Http\Controllers\Extensions\Eco\EcoController;
use App\Http\Controllers\Extensions\Eco\OrderbookController;
use App\Http\Controllers\Extensions\Eco\OrderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    Route::prefix('v1')->group(function () {
        Route::prefix('eco')->group(function () {
            // Market routes
            Route::post('index', [EcoController::class, 'index']);
            Route::post('trades', [EcoController::class, 'trades']);
            Route::post('orderbook', [OrderbookController::class, 'index']);

            // Trade routes
            Route::post('orders', [EcoController::class, 'orders']);
            Route::post('trade/store', [OrderController::class, 'store']);
            Route::post('order/cancel', [OrderController::class, 'destroy']);

            // Charting routes
            Route::get('chart/{symbol}/{currency}/{timeframe}/json', [ChartController::class, 'getChartDataJson']);
            Route::get('chart/{symbol}/{currency}/{timeframe}/{from}/{to}', [ChartController::class, 'getPartialChartData']);
        });
    });
});
