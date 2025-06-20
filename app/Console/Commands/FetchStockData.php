<?php

namespace App\Console\Commands;

use App\Models\Company;
use App\Services\StockService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Table;

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
//        $tickers = DB::table('companies')->pluck('company_num')->toArray();


// Step 1: Get the target record
//        $target = DB::table('companies')->where('company_num', 8180)->first();
//
//        if ($target) {
//            // Step 2: Get all records after it, based on ID
//            $tickers = DB::table('companies')->where('company_id', '>', $target->company_id)
//                ->orderBy('company_id')
//                ->pluck('company_num')->toArray();
//        } else {
//            $tickers = collect(); // Empty collection if not found
//        }



//        dd($tickers);
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
