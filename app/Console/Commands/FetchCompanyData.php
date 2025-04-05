<?php

namespace App\Console\Commands;

use App\Services\StockService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class FetchCompanyData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-company-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    private $stockService;

    public function __construct(StockService $stockService)
    {
        parent::__construct();
        $this->stockService = $stockService; // Inject StockService
    }
    /**
     * Execute the console command.
     */

    public function handle()
    {
//        $tickers = DB::table('companies')->pluck('company_num')->toArray();
//
//        if (empty($tickers)) {
//            $this->error("No company numbers found in the database.");
//            return;
//        }
//
//        foreach ($tickers as $ticker) {
//            $this->info("Fetching data for: $ticker");
//
//            $allData = [
//                'profile' => $this->stockService->fetchCompanyData("summaryprofile", "symbol", $ticker),
//                'statistics' => $this->stockService->fetchCompanyData("defaultKeyStatistics", "symbol", $ticker),
//                'financials' => $this->stockService->fetchCompanyData("financials", "symbol", $ticker),
//                'historical' => $this->stockService->fetchCompanyData("yhfhistorical", "ticker", $ticker, "&sdate=2021-09-12&edate=2024-09-13"),
//                'options' => $this->stockService->fetchCompanyData("stockOptions", "ticker", $ticker),
//            ];
//
//            // Store in Redis
//            Redis::set("company_data_$ticker", json_encode($allData));
//            $this->info("Data for $ticker stored in cache.");
//        }
//
//        $this->info("All data fetched and stored in Redis.");
        execute_code();
    }

}
