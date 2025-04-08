<?php

namespace App\Console\Commands;

use App\Models\Stock;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class InsertStocks extends Command
{
    protected $signature = 'insert:stocks';

    protected $description = 'Command description';

    public function handle(): void
    {

        Stock::truncate();
        echo "Stocks table truncated." . PHP_EOL;

        $jsonPath = storage_path('app/private/companies.json');

        if (File::exists($jsonPath)) {
            $jsonData = json_decode(File::get($jsonPath), true);

            foreach ($jsonData as $ticker => $records) {
                if (!is_null($records)){

                    echo '  inserting stock : '. $ticker. PHP_EOL;
                    foreach ($records as $record) {
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

                        echo '  inserted successfully : '. $ticker. PHP_EOL;

                    }
                }

            }
        }else{
            echo "file not exist";
        }

    }
}
