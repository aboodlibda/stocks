<?php

namespace App\Console\Commands;

use App\Services\StockService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
        // Fetch tickers dynamically using Laravel Query Builder
        $tickers = DB::table('companies')->pluck('company_num')->toArray();

        // Check if tickers exist
        if (empty($tickers)) {
            $this->error("No tickers found in the companies table.");
            return;
        }

        // Define start and end dates
        $sdate = '2021-09-12';
        $edate = '2024-09-13';

        // Fetch stock data
        $data = $this->stockService->getStockData($tickers, $sdate, $edate);

        // Display success message
        $this->info("Stock data fetched successfully.");

        // Display first 5 records for the first ticker
        $firstTicker = $tickers[0] ?? null;
        if ($firstTicker) {
            $this->line(print_r(array_slice($data[$firstTicker] ?? [], 0, 5), true));
        }
    }
}
