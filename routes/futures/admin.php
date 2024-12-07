<?php

use App\Http\Controllers\Admin\Extensions\Futures\FuturesController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'futures', 'as' => 'futures.'], function () {
    Route::get('/positions', [FuturesController::class, 'positions'])->name('positions');
    Route::get('/orders', [FuturesController::class, 'orders'])->name('orders');
    Route::get('/wallets', [FuturesController::class, 'wallets'])->name('wallets');
    Route::group(['prefix' => 'provider', 'as' => 'provider.'], function () {
        Route::get('/{provider}/currencies', [FuturesController::class, 'currencies'])->name('currencies.index');
        Route::get('/{provider}/markets', [FuturesController::class, 'markets'])->name('markets.index');
        Route::get('/refresh', [FuturesController::class, 'refresh'])->name('refresh')->middleware('demo');
        Route::post('/markets/activate', [FuturesController::class, 'market_activate'])->name('market.activate')->middleware('demo');
        Route::post('/markets/deactivate', [FuturesController::class, 'market_deactivate'])->name('market.deactivate')->middleware('demo');
        Route::post('/markets/bulk/activate', [FuturesController::class, 'bulk_market_activate'])->name('market.bulk.activate');
        Route::post('/markets/bulk/deactivate', [FuturesController::class, 'bulk_market_deactivate'])->name('market.bulk.deactivate');
        Route::get('/markets/delete', [FuturesController::class, 'market_delete'])->name('market.delete')->middleware('demo');
    });
});
