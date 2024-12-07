<?php

use App\Http\Controllers\Extensions\Swap\SwapController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard/swap', [SwapController::class, 'index'])->name('home.swap');
//Route::group(['middleware' => 'checkKYC', 'prefix' => 'swap', 'as' => 'swap.'], function() {
//});
