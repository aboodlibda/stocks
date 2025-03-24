<?php

namespace App\Console\Commands;

use App\Services\StockService;
use Illuminate\Console\Command;

class FetchStockData extends Command
{
    protected $signature = 'fetch:stock-data';
    protected $description = 'Fetch stock data from API and save it in a JSON file';

    protected $stockService;

    public function __construct(StockService $stockService)
    {
        parent::__construct();
        $this->stockService = $stockService;
    }

    public function handle()
    {
        $tickers = [7010, 2222, 2010, 6002, 2270, 1120];
        $sdate = '2021-09-12';
        $edate = '2024-09-12';

        $data = $this->stockService->getStockData($tickers, $sdate, $edate);

        $this->info("Stock data fetched successfully.");
        $this->line(print_r(array_slice($data[7010] ?? [], 0, 5), true));
    }
}
