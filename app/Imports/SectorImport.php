<?php

namespace App\Imports;

use App\Models\Sector;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SectorImport implements ToModel, withHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Sector([
            'date' => $row['date'],
            'open' => $row['open'],
            'high' => $row['high'],
            'low' => $row['low'],
            'close' => $row['close'],
            'volume' => $row['volume'],
            'turnover' => $row['turnover'],
            'code' => $row['code'],
            'name' => $row['name'],
        ]);
    }
}
