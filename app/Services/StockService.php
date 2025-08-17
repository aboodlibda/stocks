<?php

namespace App\Services;
use App\Models\Stock;
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
        try {
            $url = "https://{$this->apiHost}/yhfhistorical?ticker={$ticker}.SR&sdate={$sdate}&edate={$edate}";

            $response = Http::withHeaders([
                'X-RapidAPI-Host' => $this->apiHost,
                'X-RapidAPI-Key' => $this->apiKey,
            ])->get($url);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            throw new \Exception("API request failed for ticker {$ticker}: " . $e->getMessage());
        }
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

        $truncateResult = Stock::truncate();
        if ($truncateResult) {
            echo "Stocks Table truncated successfully." . PHP_EOL;
        } else {
            echo "Failed to truncate the table." . PHP_EOL;
        }

        $data = null;

        if ($data === null) {
            $data = [];

            foreach ($tickers as $key => $ticker) {
                echo "Fetching stock data for " . $ticker . PHP_EOL;
                try {
                    $data[$ticker] = $this->fetchDataFromAPI($ticker, $sdate, $edate);
                } catch (\Exception $e) {
                    echo "Error fetching data for ticker {$ticker}: " . $e->getMessage() . PHP_EOL;
                    continue;
                }

                if (!is_null($data[$ticker])) {
                    foreach ($data[$ticker] as $record) {
                        try {
                            Stock::create([
                                'ticker'   => $ticker,
                                'date'     => date('Y-m-d', strtotime($record['date'])),
                                'high'     => $record['high'],
                                'volume'   => $record['volume'] ?? 0,
                                'open'     => $record['open'],
                                'low'      => $record['low'],
                                'close'    => $record['close'],
                                'adjclose' => $record['adjclose'],
                            ]);

                        } catch (\Exception $e) {
                            echo "Error saving stock data for ticker {$ticker}: " . $e->getMessage() . PHP_EOL;
                            continue;
                        }

                    }

                    echo "inserted successfully : ". $ticker. PHP_EOL;

                }


            }

            echo "DONE" . PHP_EOL;
//            $this->saveDataToJSON($data);
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
