<?php


use App\Models\Sector;
use App\Models\Stock;


const dash_C6 = 4.90;

function calculateRatiosByCompany($ticker)
{
    // Get adjclose values for the given ticker, ordered by ID (or date if available)
    $adjCloses = Stock::where('ticker', $ticker)
        ->orderBy('id', 'asc')  // Use 'date' if your table has it
        ->pluck('adjclose');

    // Calculate ratios like B10/B11, B11/B12, etc.
    $ratios = [];
    for ($i = 0; $i < count($adjCloses) - 1; $i++) {
        if ($adjCloses[$i + 1] != 0) {
            $ratios[] = number_format(log(($adjCloses[$i] / $adjCloses[$i + 1])) * 100 , 2);
        } else {
            $ratios[] = null; // Avoid division by zero
        }
    }

    return $ratios;
}

function calculateRatiosBySector($code)
{
    // Get adjclose values for the given ticker, ordered by ID (or date if available)
    $closes = Sector::where('code', $code)
        ->orderBy('id', 'asc')  // Use 'date' if your table has it
        ->pluck('close');

    // Calculate ratios like B10/B11, B11/B12, etc.
    $ratios = [];
    for ($i = 0; $i < count($closes) - 1; $i++) {
        if ($closes[$i + 1] != 0) {
            $ratios[] = number_format((log(($closes[$i] / $closes[$i + 1])) * 100), 2);
        } else {
            $ratios[] = null; // Avoid division by zero
        }
    }

    return $ratios;
}



function variance(array $numbers) {
    $count = count($numbers);
    if ($count < 2) {
        return null; // Variance requires at least two numbers
    }

    $mean = array_sum($numbers) / $count;
    $sumSquaredDifferences = 0;

    foreach ($numbers as $num) {
        $sumSquaredDifferences += pow($num - $mean, 2);
    }

    return $sumSquaredDifferences / ($count - 1); // Sample variance formula
}


function calculateAverage(array $numbers) {
    $count = count($numbers);
    if ($count === 0) {
        return null; // Avoid division by zero
    }

    $sum = array_sum($numbers);
    return ($sum / $count);
}



// $dash_C6 is dynamic retrieved from database and entered by admin in database
function annualStockExpectedReturn($dash_C6, $company_daily_stock_volatility, $sector_return_avg, $sector_daily_stock_volatility)
{
    return $dash_C6 + ($company_daily_stock_volatility * sqrt(250)) * (pow(($sector_return_avg + 1), 250)  - 1 - $dash_C6)
        / ($sector_daily_stock_volatility * sqrt(250));
}


function test()
{
    // start of calculate $company_daily_stock_volatility
    $companyRatios = calculateRatiosByCompany(2010);
    $companyVariance = variance($companyRatios);
    $company_daily_stock_volatility = sqrt($companyVariance);
    // end of calculate $company_daily_stock_volatility

    // start of calculate $sector_daily_stock_volatility
    $sectorRatios = calculateRatiosBySector("TMTI");
    $sectorVariance = variance($sectorRatios);
    $sector_daily_stock_volatility = sqrt($sectorVariance);
    // end of calculate $sector_daily_stock_volatility

    $sector_return_avg = calculateAverage($sectorRatios);
//
    $result = annualStockExpectedReturn(4.9,$company_daily_stock_volatility,$sector_return_avg,$sector_daily_stock_volatility);
//    echo 'Annual Stock Expected Return  :  ' . $result . "<br>";
//    echo 'company daily stock volatility  :  ' . number_format($company_daily_stock_volatility, 2) . "%" . "<br>";

    $last = sharpRatio($result,$company_daily_stock_volatility);
    echo 'sharpRatio : ' . number_format($last ,3);
}


function sharpRatio($annualStockExpectedReturn, $dailyStockVolatility) // $dailyStockVolatility will be * 250 do get it as Annual Stock Volatility
{
    return $annualStockExpectedReturn / ($dailyStockVolatility * sqrt(250));
}

