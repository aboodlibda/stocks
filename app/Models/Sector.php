<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

use PhpOffice\PhpSpreadsheet\Shared\Date; // Required for Excel date handling

class Sector extends Model
{
    protected $guarded = [];


    public function setDateAttribute($value)
    {
        // Check if value is numeric (Excel serial date)
        if (is_numeric($value)) {
            // Convert Excel serial number to date (dd/mm/YYYY)
            $convertedDate = Date::excelToDateTimeObject($value)->format('d/m/Y');
        } else {
            // Handle normal textual date like "12/09/2024"
            $convertedDate = $value;
        }

        // Parse and reformat date to "Y-m-d" for the database
        try {
            $dateParts = explode('/', $convertedDate); // Split by "/"
            $day = (int)$dateParts[0];
            $month = (int)$dateParts[1];
            $year = (int)$dateParts[2];

            // Convert to "Y-m-d" format
            $this->attributes['date'] = sprintf('%04d-%02d-%02d', $year, $month, $day);
        } catch (\Exception $e) {
            // Handle invalid date format
            throw new \InvalidArgumentException("Invalid date format: {$value}");
        }
    }




}
