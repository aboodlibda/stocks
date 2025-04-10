<?php


use App\Models\Sector;
use App\Models\Stock;
use Illuminate\Support\Facades\Http;
use MathPHP\Statistics\Correlation;


const dash_C6 = 4.68;

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
            $ratios[] = round(log(($adjCloses[$i] / $adjCloses[$i + 1])) * 100 , 2);
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
            $ratios[] = round((log(($closes[$i] / $closes[$i + 1])) * 100), 2);
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
    return $dash_C6/100 + ($company_daily_stock_volatility/100 * sqrt(250)) * ((pow(($sector_return_avg/100 + 1),250) - 1)   - $dash_C6/100)
        / ($sector_daily_stock_volatility/100 * sqrt(250));

//    return (4.68/100)+((1.342/100)*SQRT(250))*(pow(((0.010400472/100)+1),250)-1-(4.68/100))/((1.165353608/100)*SQRT(250));
}



function sharpRatio($annualStockExpectedReturn, $dailyStockVolatility): float|int // $dailyStockVolatility will be * 250 do get it as Annual Stock Volatility
{
    return ($annualStockExpectedReturn / ($dailyStockVolatility * sqrt(250))) * 100;
}

/**
 * Calculate beta
 *
 * @param array $assetReturns Array of asset returns
 * @param array $marketReturns Array of market returns
 * @return float Beta value
 * @throws \MathPHP\Exception\BadDataException
 */
function calculateBeta(array $stockRatios, array $sectorRatios)
{
//    $sectorRatios = array_slice($sectorRatios, 0, count($stockRatios));

    $std_deviation = stdDeviation($sectorRatios);
    $std_deviation2 = stdDeviation($stockRatios);

    $varianceG = $std_deviation ** 2;

    $covariance = Correlation::covariance($stockRatios, $sectorRatios);
    dd($covariance / $varianceG);
    return $covariance / $varianceG;
}



function averageIfNotEmpty(array $values) {
    $validValues = array_filter($values, function ($v) {
        return $v !== null && $v !== '' && is_numeric($v);
    });

    $count = count($validValues);

    if ($count === 0) {
        return '0%'; // Same as Excel default
    }

    $average = array_sum($validValues) / $count;
//    return round($average * 100, 2) . '%'; // Convert to percentage and round
    return $average;
}


function sampleStandardDeviation(array $values) {
    $n = count($values);

    if ($n < 2) {
        return null; // You need at least 2 values for a sample standard deviation
    }

    $mean = array_sum($values) / $n;

    $sumSquaredDiffs = 0;
    foreach ($values as $value) {
        $sumSquaredDiffs += pow($value - $mean, 2);
    }

    // Divide by (n - 1) for sample standard deviation
    $variance = $sumSquaredDiffs / ($n - 1);
    return sqrt($variance);
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
    $stockBetaCoefficient = calculateBeta($companyRatios, $sectorRatios);
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
    echo "Stock Beta Coefficient: " . $stockBetaCoefficient . "<br>";
    echo "Daily Volatility: " . round($company_daily_stock_volatility, 3) . "<br>";
    echo "Annual Volatility: " . round($annualStockVolatility*100, 3) . "<br>";
    echo "Risk Rank: " . $stockRiskRank . "<br>";
    echo "Average Daily Expected Return: " . round(averageIfNotEmpty($companyRatios),3) . "<br>";
    echo "Expected Annual Return: " . round($annualStockExpectedReturn*100, 3) . "<br>";

    return [
        'sharpRatio' => round($sharpRatio, 3),
        'stockBetaCoefficient' => round($stockBetaCoefficient, 3),
        'dailyVolatility' => round($company_daily_stock_volatility, 3),
        'annualVolatility' => round($annualStockVolatility, 3),
        'riskRank' => $stockRiskRank,
        'averageDailyExpectedReturn' => round(averageIfNotEmpty($companyRatios),3),
        'expectedAnnualReturn' => round($annualStockExpectedReturn, 3),
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



function stdDeviation($arr): float
{
    $arr_size = count($arr);
    $mu = array_sum($arr) / $arr_size;
    $ans = 0;
    foreach($arr as $elem){
        $ans += pow(($elem - $mu), 2);
    }
    return sqrt($ans / $arr_size);
}


