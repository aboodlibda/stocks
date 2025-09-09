<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SectorImport;

class SectorsTableSeeder extends Seeder
{
    public function run(): void
    {
        Excel::import(new SectorImport(), public_path('uploads/excel/sectors.xlsx'));
    }
}

