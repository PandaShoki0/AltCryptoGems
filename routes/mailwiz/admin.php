<?php

use App\Http\Controllers\Admin\Extensions\MailWiz\BlockController;
use App\Http\Controllers\Admin\Extensions\MailWiz\CampaignController;
use App\Http\Controllers\Admin\Extensions\MailWiz\TemplateController;
use App\Http\Controllers\Admin\Extensions\MailWiz\MailWizController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'mailwiz', 'as' => 'mailwiz.'], function () {
    // Campaigns
    Route::group(['prefix' => 'campaigns', 'as' => 'campaigns.'], function () {
        Route::get('/', [CampaignController::class, 'index'])->name('index');
        Route::get('/create/{template_id?}', [CampaignController::class, 'create'])->name('create')->middleware('demo');
        Route::post('/', [CampaignController::class, 'store'])->name('store')->middleware('demo');
        Route::get('/{campaign}/edit', [CampaignController::class, 'edit'])->name('edit')->middleware('demo');
        Route::put('/{campaign}', [CampaignController::class, 'update'])->name('update')->middleware('demo');
        Route::delete('/{campaign}', [CampaignController::class, 'destroy'])->name('destroy')->middleware('demo');

        // Campaign actions
        Route::post('/{campaign}/start', [CampaignController::class, 'start'])->name('start')->middleware('demo');
        Route::post('/{campaign}/restart', [CampaignController::class, 'restart'])->name('restart')->middleware('demo');
        Route::post('/{campaign}/pause', [CampaignController::class, 'pause'])->name('pause')->middleware('demo');
        Route::post('/{campaign}/resume', [CampaignController::class, 'resume'])->name('resume')->middleware('demo');
        Route::post('/{campaign}/stop', [CampaignController::class, 'stop'])->name('stop')->middleware('demo');
        Route::get('/all/progress', [CampaignController::class, 'getAllCampaignsProgress'])->name('progress');

        // Targets
        Route::post('/{campaign}/targets', [CampaignController::class, 'targets'])->name('targets');
    });

    Route::group(['prefix' => 'templates', 'as' => 'templates.'], function () {
        Route::get('/', [TemplateController::class, 'index'])->name('index');
        Route::get('/create', [TemplateController::class, 'create'])->name('create');
        Route::post('/', [TemplateController::class, 'store'])->name('store')->middleware('demo');
        Route::post('/rename', [TemplateController::class, 'rename'])->name('rename')->middleware('demo');
        Route::get('/{template}/edit', [TemplateController::class, 'edit'])->name('edit');
        Route::put('/{template}', [TemplateController::class, 'update'])->name('update')->middleware('demo');
        Route::delete('/{template}', [TemplateController::class, 'destroy'])->name('destroy')->middleware('demo');
    });

    Route::group(['prefix' => 'blocks', 'as' => 'blocks.'], function () {
        Route::post('/', [BlockController::class, 'store'])->name('store');
        Route::put('/', [BlockController::class, 'update'])->name('update');
        Route::delete('/', [BlockController::class, 'destroy'])->name('destroy')->middleware('demo');
    });

    Route::post('/editor/auth', [MailWizController::class, 'auth']);
    Route::post('/editor/session', [MailWizController::class, 'session']);
    Route::get('/editor/blocks', [BlockController::class, 'index']);
    Route::post('/editor/blocks/delete', [BlockController::class, 'delete']);
    Route::post('/images/upload-url', [MailWizController::class, 'uploadUrl']);
    Route::post('/images/upload', [MailWizController::class, 'upload']);
    Route::post('/images/save', [MailWizController::class, 'save']);
    Route::get('/image', [MailWizController::class, 'fetchImage']);
    Route::get('/images', [MailWizController::class, 'images']);
    Route::delete('/images', [MailWizController::class, 'deleteImage']);
});
Route::get('total-emails-sent', function() {
    $controller = app()->make(App\Http\Controllers\Admin\Extensions\MailWiz\CampaignController::class);
    return $controller->totalEmailsSent(true);
})->name('totalEmailsSent');
Route::get('active-campaigns-count', [CampaignController::class, 'activeCampaignsCount'])->name('activeCampaignsCount');
Route::get('completed-campaigns-count', [CampaignController::class, 'completedCampaignsCount'])->name('completedCampaignsCount');
