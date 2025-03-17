<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class StockService
{
    private $apiKey;
    private $apiHost;
    private $baseUrl;
    public function __construct()
    {
        $this->apiKey = env('RAPIDAPI_KEY');
        $this->apiHost = env('RAPIDAPI_HOST');
        $this->baseUrl = 'https://yh-finance-complete.p.rapidapi.com/';
    }

    public function getStockData($symbol)
    {
        $response = Http::withHeaders([
            'X-RapidAPI-Key' => $this->apiKey,
            'X-RapidAPI-Host' => $this->apiHost,
        ])->get("https://yh-finance-complete.p.rapidapi.com/summaryprofile", [
            'symbol' => $symbol,
        ]);

        // Log full response for debugging
        \Log::info('Yahoo Finance API Response: ', ['response' => $response->json()]);

        if ($response->failed()) {
            return ['error' => 'Failed to fetch stock data', 'details' => $response->body()];
        }

        return $response->json();
    }

}
