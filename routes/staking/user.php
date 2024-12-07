<?php

use App\Http\Controllers\Extensions\Staking\StakingController;
use Illuminate\Support\Facades\Route;

Route::post('/fetch/staking', [StakingController::class, 'fetch_info'])->name('fetch.staking');
Route::post('/fetch/staking/wallets', [StakingController::class, 'fetch_wallets'])->name('fetch.staking.wallets');
Route::post('/fetch/staking/logs', [StakingController::class, 'fetch_log'])->name('fetch.staking.logs');
Route::group(['prefix' => 'staking', 'as' => 'staking.'], function () {
    Route::post('/store', [StakingController::class, 'store'])->name('store');
    Route::post('/store/new', [StakingController::class, 'store_new'])->name('store.new');
    Route::post('/claim', [StakingController::class, 'claim'])->name('claim');
    Route::post('/cancel', [StakingController::class, 'cancel'])->name('cancel');
    Route::post('/new/cancel', [StakingController::class, 'cancel_new'])->name('cancel.new');
    
});
