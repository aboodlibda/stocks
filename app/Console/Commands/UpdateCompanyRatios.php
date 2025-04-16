<?php

namespace App\Console\Commands;

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
        updateCompanyRatios();
    }
}
