<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\StockController;
use App\Models\Company;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/stock-performance', [HomeController::class, 'stockPerformance'])->name('stock-performance');

Route::group(['prefix' => LaravelLocalization::setLocale()], function () {

    Route::get('/stock', [StockController::class, 'getStock']);
    Route::get('market-stock-screen', [HomeController::class, 'marketStockScreen'])->name('market-stock-screen');
    Route::get('/get-stock-averages', [HomeController::class, 'getStockAverages'])->name('get-stock-averages');
    Route::get('/companies/ajax', [HomeController::class, 'ajaxIndex'])->name('companies.index.ajax');
    Route::get('new-market-stock-screen', function () {
//        $companies = Company::query()->get(['index_name', 'index_symbol']);
        $companies = Company::query()->distinct()->get(['index_name', 'index_symbol']);
        return view('cms.test',compact('companies'));
    })->name('test');

    Route::get('/companies', [HomeController::class, 'getCompanies']);
    Route::get('/search', [HomeController::class, 'search']);
    Route::get('read-companies', [StockController::class, 'read_companies'])->name('read-companies');
    Route::get('test_api', [StockController::class,'getApi'])->name('get-api');
    Route::get('execute',function(){

//        $ratios = calculateRatiosByCompany(7010);
//        $binBoundary = binBoundary(7010);
//        frequency($ratios,$binBoundary);
        financialRatios(7010);
//        riskMeasurementRatios(2222,'TENI');
//        riskMeasurementRatios(7010,'TTSI');
//        riskMeasurementRatios(1120,'TBNI');
//        riskMeasurementRatios(6002,'TCSI');
//        riskMeasurementRatios(4263,'TTNI');
//        financialRatios(2010);
//        stockMarketPrice(2010);
    });

    Route::get('new_test',function(){
        $url = "https://finance.yahoo.com/quote/7010.SR/key-statistics?p=7010.SR";

        $response = Http::withHeaders([
            "X-RapidAPI-Host" => $this->apiHost,
            "X-RapidAPI-Key" => $this->apiKey
        ])->get($url);

        return $response->successful() ? $response->json() : null;


    });
    Route::group(['prefix' => 'cms', 'middleware' => ['auth:user']], function () {
        Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
        Route::resource('portfolios', PortfolioController::class);


    });

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('do-login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
