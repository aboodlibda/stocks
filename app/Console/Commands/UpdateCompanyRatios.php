<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateCompanyRatios extends Command
{
    protected $signature = 'update:company-ratios';

    protected $description = 'Command description';

    /**
     * @throws \Exception
     */
    public function handle(): void
    {

        // Check if today is Friday or Saturday
        $today = Carbon::now()->timezone('Asia/Riyadh')->isoWeekday();
        if ($today === Carbon::FRIDAY || $today === Carbon::SATURDAY) {
            $this->info('Stock market is closed on Friday and Saturday. Skipping execution updateCompanyRatios.');
            return;
        }

        updateCompanyRatios();
    }
}
