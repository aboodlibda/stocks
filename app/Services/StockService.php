<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
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

    protected $fileName = 'companies.json';

    public function fetchCompanyData($endpoint, $variable, $ticker, $extraParams = "")
    {
        $url = $this->baseUrl . $endpoint . "?" . "{$variable}" . "={$ticker}.SR" . $extraParams;

        $response = Http::withHeaders([
            "X-RapidAPI-Host" => $this->apiHost,
            "X-RapidAPI-Key" => $this->apiKey
        ])->get($url);

        return $response->successful() ? $response->json() : null;
    }






    public function fetchDataFromAPI($ticker, $sdate, $edate)
    {
        $url = "https://{$this->apiHost}/yhfhistorical?ticker={$ticker}.SR&sdate={$sdate}&edate={$edate}";

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => $this->apiHost,
            'X-RapidAPI-Key' => $this->apiKey,
        ])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

    public function saveDataToJSON($data)
    {
        Storage::disk('local')->put($this->fileName, json_encode($data, JSON_PRETTY_PRINT));
    }

    public function readDataFromJSON()
    {
        if (Storage::disk('local')->exists($this->fileName)) {
            return json_decode(Storage::disk('local')->get($this->fileName), true);
        }

        return null;
    }

    public function getStockData($tickers, $sdate, $edate)
    {
        $data = $this->readDataFromJSON();

        if ($data === null) {
            $data = [];

            foreach ($tickers as $key => $ticker) {
                $data[$ticker] = $this->fetchDataFromAPI($ticker, $sdate, $edate);
                echo $key+1 .'    :  stock retrieved : '. $ticker. PHP_EOL;
            }

            $this->saveDataToJSON($data);
        }

        return $data;
    }


    public function test_api()
    {
        $ticker = "2030";
        $url = "https://{$this->apiHost}/financials?symbol={$ticker}.SR";

        $response = Http::withHeaders([
            'X-RapidAPI-Host' => $this->apiHost,
            'X-RapidAPI-Key' => $this->apiKey,
        ])->get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }

}
