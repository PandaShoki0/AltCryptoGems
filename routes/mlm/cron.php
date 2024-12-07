<?php

use App\Http\Controllers\Extensions\MLM\MLMController;
use Illuminate\Support\Facades\Route;

Route::get('cron/mlm/ranks', [MLMController::class, 'mlm_ranks'])->name('mlm.ranks');
Route::get('cron/mlm/daily', [MLMController::class, 'mlm_daily'])->name('mlm.daily');
Route::get('cron/mlm/membership', [MLMController::class, 'mlm_membership'])->name('mlm.membership');
