<?php


use App\Models\Sector;
use App\Models\Stock;
use Illuminate\Support\Facades\Http;


const dash_C6 = 4.90;

function calculateRatiosByCompany($ticker): array
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

function calculateRatiosBySector($code): array
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



function variance(array $numbers): float|int|null
{
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


function calculateAverage(array $numbers): float|int|null
{
    $count = count($numbers);
    if ($count === 0) {
        return null; // Avoid division by zero
    }

    $sum = array_sum($numbers);
    return ($sum / $count);
}



// $dash_C6 is dynamic retrieved from database and entered by admin in database
function annualStockExpectedReturn($dash_C6, $company_daily_stock_volatility, $sector_return_avg, $sector_daily_stock_volatility): float
{
    return $dash_C6/100 + ($company_daily_stock_volatility/100 * sqrt(250)) * ((pow(($sector_return_avg/100 + 1),250) - 1) * 100   - $dash_C6/100)
        / ($sector_daily_stock_volatility/100 * sqrt(250));
}



function sharpRatio($annualStockExpectedReturn, $dailyStockVolatility): float|int // $dailyStockVolatility will be * 250 do get it as Annual Stock Volatility
{
    return $annualStockExpectedReturn / ($dailyStockVolatility * sqrt(250));
}


function calculateBeta(array $rangeR, array $rangeX1, array $rangeX2): float {
    $n = count($rangeR);
    $meanR = array_sum($rangeR) / $n;
    $meanX1 = array_sum($rangeX1) / $n;

    // Covariance calculation
    $covar = 0.0;
    for ($i = 0; $i < $n; $i++) {
        $covar += ($rangeR[$i] - $meanR) * ($rangeX1[$i] - $meanX1);
    }
    $covar /= $n;

    // Variance calculation for rangeX2
    $m = count($rangeX2);
    $meanX2 = array_sum($rangeX2) / $m;
    $variance = 0.0;
    for ($i = 0; $i < $m; $i++) {
        $variance += pow($rangeX2[$i] - $meanX2, 2);
    }
    $variance /= $m;

    // Avoid division by zero
    if ($variance == 0.0) {
        throw new Exception("Variance is zero, division by zero error.");
    }

    return $covar / $variance;
}


/**
 * @throws Exception
 */
function riskMeasurementRatios($ticker, $code): array
{
    // start of calculate $company_daily_stock_volatility
    $companyRatios = calculateRatiosByCompany($ticker);
    $companyVariance = variance($companyRatios);
    $company_daily_stock_volatility = sqrt($companyVariance);
    // end of calculate $company_daily_stock_volatility

    // start of calculate $sector_daily_stock_volatility
    $sectorRatios = calculateRatiosBySector($code);
    $sectorVariance = variance($sectorRatios);
    $sector_daily_stock_volatility = sqrt($sectorVariance);
    // end of calculate $sector_daily_stock_volatility

    $sector_return_avg = calculateAverage($sectorRatios);
    $annualStockExpectedReturn = annualStockExpectedReturn(dash_C6,$company_daily_stock_volatility,$sector_return_avg,$sector_daily_stock_volatility);

    $sharpRatio = sharpRatio($annualStockExpectedReturn,$company_daily_stock_volatility);
    $stockBetaCoefficient = calculateBeta($companyRatios, $sectorRatios, $sectorRatios);
    $annualStockVolatility = (($company_daily_stock_volatility/100) * sqrt(250));
    if ($annualStockVolatility <= 0.10) {
        $stockRiskRank = "Conservative";
    } elseif ($annualStockVolatility <= 0.20) {
        $stockRiskRank = "Moderately Conservative";
    } elseif ($annualStockVolatility <= 0.30) {
        $stockRiskRank = "Aggressive";
    } else {
        $stockRiskRank = "Very Aggressive";
    }

    echo "Sharp Ratio: " . round($sharpRatio, 3) . "<br>";
    echo "Stock Beta Coefficient: " . round($stockBetaCoefficient, 3) . "<br>";
    echo "Daily Volatility: " . round($company_daily_stock_volatility, 3) . "<br>";
    echo "Annual Volatility: " . round($annualStockVolatility*100, 3) . "<br>";
    echo "Risk Rank: " . $stockRiskRank . "<br>";

    return [
        'sharpRatio' => round($sharpRatio, 3),
        'stockBetaCoefficient' => round($stockBetaCoefficient, 3),
        'dailyVolatility' => round($company_daily_stock_volatility, 3),
        'annualVolatility' => round($annualStockVolatility, 3),
        'riskRank' => $stockRiskRank,
    ];
}

function financialRatios($ticker): array
{
//    $sdate = '2023-09-12';
//    $edate = '2024-09-13';


    $summaryProfileUrl = "https://yh-finance-complete.p.rapidapi.com/summaryprofile?symbol=$ticker.SR";
    $summaryProfile = fetchStockDataFromAPI($summaryProfileUrl);

//    $defaultKeyStatisticsUrl = "https://yh-finance-complete.p.rapidapi.com/defaultKeyStatistics?symbol=$ticker.SR";
//    $defaultKeyStatistics = fetchDataFromAPI($defaultKeyStatisticsUrl);
//
    $financialsUrl = "https://yh-finance-complete.p.rapidapi.com/financials?symbol=$ticker.SR";
    $financials = fetchDataFromAPI($financialsUrl);
//
//    $historicalUrl = "https://yh-finance-complete.p.rapidapi.com/yhfhistorical?ticker=$ticker.SR&sdate=$sdate&edate=$edate";
//    $historical = fetchDataFromAPI($historicalUrl);

    $stockOptionsUrl = "https://yh-finance-complete.p.rapidapi.com/stockOptions?ticker=$ticker.SR";
    $stockOptions = fetchDataFromAPI($stockOptionsUrl);

    $PIRatio = $summaryProfile['summaryDetail']['trailingPE'] ?? null;
    $returnOnEquity = $financials['financialData']['returnOnEquity'] ?? null;
    $dividendYield = $stockOptions['quote']['dividendYield'] ?? null;
    $revenuePerShare = $financials['financialData']['revenuePerShare'] ?? null;

    return [
        'PIRatio' => $PIRatio,
        'returnOnEquity' => $returnOnEquity,
        'dividendYield' => $dividendYield,
        'revenuePerShare' => $revenuePerShare
    ];
//    echo 'P/I Ratio :  ' . $PIRatio . "<br>";
//    echo 'Return On Equity :  ' . $returnOnEquity . "<br>";
//    echo 'Dividend Yield :  ' . $dividendYield . "<br>";
//    echo 'revenue Per Share :  ' . $revenuePerShare . "<br>";

}

/**
 * @throws \Illuminate\Http\Client\ConnectionException
 */
function fetchStockDataFromAPI($url)
{
    $response = Http::withHeaders([
        'X-RapidAPI-Host' => env('RAPIDAPI_HOST'),
        'X-RapidAPI-Key' => env('RAPIDAPI_KEY'),
    ])->get($url);

    if ($response->successful()) {
        return $response->json();
    }

    return null;
}



