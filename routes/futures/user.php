<?php

use App\Http\Controllers\Extensions\Futures\FuturesController;
use App\Http\Controllers\Extensions\Futures\WalletController;
use App\Http\Controllers\Extensions\Futures\OrderController;
use Illuminate\Support\Facades\Route;

Route::prefix('futures')->group(function () {
    route::prefix('wallet')->group(function () {
        Route::get('{symbol}', [WalletController::class, 'fetch'])->name('fetch');
        Route::post('balance', [WalletController::class, 'balance'])->name('balance');
        Route::post('store', [WalletController::class, 'store'])->name('store');
    });
    route::prefix('trade')->group(function () {
        Route::post('store', [FuturesController::class, 'store'])->name('store');
    });
    route::prefix('order')->group(function () {
        Route::get('{currency}/{pair}', [OrderController::class, 'orders']);
        Route::post('refresh', [FuturesController::class, 'refresh']);
        Route::post('cancel', [OrderController::class, 'cancel']);
    });
    route::prefix('position')->group(function () {
        Route::get('{currency}/{pair}', [OrderController::class, 'position']);
        Route::post('sell', [FuturesController::class, 'sell']);
        Route::post('add-take-profit-stop-loss', [FuturesController::class, 'addTakeProfitStopLoss']);
    });
});
