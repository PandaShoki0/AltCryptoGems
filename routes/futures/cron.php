<?php

use App\Http\Controllers\Extensions\Futures\FuturesController;
use Illuminate\Support\Facades\Route;

Route::get('cron/provider/futuresToTable', [FuturesController::class, 'cron'])->name('provider.futures.to.table');
