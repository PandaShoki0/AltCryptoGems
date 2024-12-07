<?php

use App\Http\Controllers\Extensions\Eco\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::get('cron/utxo/verify/transaction', [WithdrawController::class, 'verifyTransfers'])->name('cron.utxo.verify.transaction');
