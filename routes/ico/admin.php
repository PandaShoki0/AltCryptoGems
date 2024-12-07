<?php

use App\Http\Controllers\Admin\Extensions\Ico\ManageIcoController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'ico', 'as' => 'ico.'], function () {
    Route::get('/', [ManageIcoController::class, 'index'])->name('index');
    Route::get('new', [ManageIcoController::class, 'new'])->middleware('demo')->name('new');
    Route::get('edit/{id}', [ManageIcoController::class, 'edit'])->middleware('demo')->name('edit');
    Route::post('store', [ManageIcoController::class, 'store'])->name('store')->middleware('demo');
    Route::post('update', [ManageIcoController::class, 'update'])->name('update')->middleware('demo');

    // Log
    Route::get('log', [ManageIcoController::class, 'log'])->name('log.list');
    Route::post('log/pay', [ManageIcoController::class, 'pay'])->name('pay');
});