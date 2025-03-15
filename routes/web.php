<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::group(['prefix' => 'cms', 'middleware' => ['auth:user']], function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::resource('portfolios', PortfolioController::class);
    });

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('do-login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
