<?php

use App\Http\Controllers\Admin\Extensions\PageBuilder\ManagePageBuilderController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'builder', 'as' => 'builder.'], function () {
    Route::get('/', [ManagePageBuilderController::class, 'index'])->name('index');
    Route::get('new', [ManagePageBuilderController::class, 'new'])->name('new');
    Route::get('edit/{id}', [ManagePageBuilderController::class, 'edit'])->name('edit');
    Route::post('store', [ManagePageBuilderController::class, 'store'])->name('store')->middleware('demo');
    Route::post('update', [ManagePageBuilderController::class, 'update'])->name('update')->middleware('demo');
    Route::post('delete', [ManagePageBuilderController::class, 'delete'])->name('delete')->middleware('demo');
    Route::post('activate', [ManagePageBuilderController::class, 'activate'])->name('activate')->middleware('demo');
    Route::post('deactivate', [ManagePageBuilderController::class, 'deactivate'])->name('deactivate')->middleware('demo');
});
