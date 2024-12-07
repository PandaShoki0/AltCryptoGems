<?php

use App\Http\Controllers\Admin\Extensions\PageBuilder\ManagePageBuilderController;
use Illuminate\Support\Facades\Route;

Route::any('page/{slug}', [ManagePageBuilderController::class, 'page']);