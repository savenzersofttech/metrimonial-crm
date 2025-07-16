<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Services\Api\WelcomeCallApiController;




// Route::middleware(['auth'])->group(function () {

    Route::prefix('welcome-calls')->group(function () {
        Route::get('{profile}', [WelcomeCallApiController::class, 'show'])->name('xxx');


    });

// });
