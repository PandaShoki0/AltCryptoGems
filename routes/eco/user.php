<?php

use App\Http\Controllers\Extensions\Eco\ChartController;
use App\Http\Controllers\Extensions\Eco\EcoController;
use App\Http\Controllers\Extensions\Eco\OrderbookController;
use App\Http\Controllers\Extensions\Eco\OrderController;
use App\Http\Controllers\Extensions\Eco\WalletController;
use App\Http\Controllers\Extensions\Eco\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::prefix('eco')->group(function () {
    // Market routes
    Route::get('/market/pair', [EcoController::class, 'markets_by_pair']);
    Route::get('/market/volume', [EcoController::class, 'markets_by_volume']);
    Route::get('/market/symbol', [EcoController::class, 'markets_by_symbol']);
    Route::post('/trades', [EcoController::class, 'trades']);
    Route::post('/orders', [EcoController::class, 'orders']);
    Route::post('/orderbook', [OrderbookController::class, 'getOrderBookDataJson']);
    Route::post('/orderbook/history', [OrderbookController::class, 'getOrderBookDataHistory']);

    // Trade routes
    Route::post('/index', [EcoController::class, 'index']);
    Route::post('/trade/store', [OrderController::class, 'store']);
    Route::post('/order/cancel', [OrderController::class, 'destroy']);

    // Wallet routes
    Route::get('/wallets', [WalletController::class, 'index']);
    Route::prefix('wallet')->group(function () {
        Route::get('/{symbol}/{address}', [WalletController::class, 'show']);
        Route::get('/logs/{symbol}/{address}', [WalletController::class, 'logs']);
        Route::post('/balance', [WalletController::class, 'balance']);
        Route::post('/store', [WalletController::class, 'store']);
        Route::post('/transfer', [WalletController::class, 'transfer']);
        Route::post('/transfer/funds', [WalletController::class, 'transferFunds']);
        Route::post('/withdraw', [WithdrawController::class, 'withdraw']);
    });

    // Charting routes
    Route::get('/chart/{symbol}/{currency}/{timeframe}/json', [ChartController::class, 'getChartDataJson']);
    Route::get('/chart/{symbol}/{currency}/{timeframe}/request', [ChartController::class, 'requestChartData']);
    Route::get('/chart/{symbol}/{currency}/{timeframe}/{from}/{to}', [ChartController::class, 'getPartialChartData']);
});
