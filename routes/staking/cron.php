<?php

use App\Http\Controllers\Extensions\Staking\StakingController;
use Illuminate\Support\Facades\Route;
// echo 111;die;
Route::get('cron/staking/profit', [StakingController::class, 'staking_profit'])->name('staking.profit');
