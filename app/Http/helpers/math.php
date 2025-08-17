<?php


use App\Models\Company;
use App\Models\Sector;
use App\Models\Stock;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\Normal;


const dash_C6 = 4.68;

function calculateRatiosByCompany($ticker): array
{
    // Get adjclose values for the given ticker, ordered by ID (or date if available)
    $adjCloses = Stock::where('ticker', $ticker)->whereNotNull('adjclose')->orderBy('date', 'desc')  // Use 'date' if your table has it
        ->get(['ticker','date','adjclose']);



//    foreach ($adjCloses as $key => $ratio) {
//        if ($ratio->date == '2024-04-14') {
//            echo $ratio->ticker . " : " . $ratio->date . "<br>";
//        }
//    }
//
//    dd("test");
//
//    $adjCloses[] = $adjCloses[count($adjCloses) - 1]; // Add a duplicate of the last element
//    $ratios = [];
//    for ($i = 0; $i < count($adjCloses) - 1; $i++) {
//        if ($adjCloses[$i + 1]->adjclose != 0) {
//            $ratios[] = round(log(($adjCloses[$i]->adjclose / $adjCloses[$i + 1]->adjclose)) * 100 , 2);
//        } else {
//            $ratios[] = null; // Avoid division by zero
//        }
//    }
    $ratios = [];
    for ($i = 0; $i < count($adjCloses) - 1; $i++) {
        if ($adjCloses[$i + 1]->adjclose != 0) {
            $ratios[] = round(log(($adjCloses[$i]->adjclose / $adjCloses[$i + 1]->adjclose))*100  , 3);
        } else {
            $ratios[] = null; // Avoid division by zero
        }
    }


    $targetDate = '2024-04-14';
    $insertAfterDate = '2024-04-15';
    $found = false;
    foreach ($adjCloses as $key => $adjClose) {
        if ($adjClose->date == $targetDate) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        foreach ($adjCloses as $key => $adjClose) {
            if ($adjClose->date == $insertAfterDate) {
                array_splice($ratios, $key, 0, [$adjClose->adjClose]);
                break;
            }
        }
    }


//    dd($ratios);
//    foreach ($ratios as $key => $ratio) {
//        echo $ratio . "<br>";
//    }
    return $ratios;


//    return $ratios;
}

function calculateRatiosBySector($code): array
{
    $sdate='2023-09-12';
    $edate='2024-09-13';
    // Get adjclose values for the given ticker, ordered by ID (or date if available)
    $closes = Sector::where('code', $code)
//        ->whereBetween('date', [$sdate, $edate])
        ->orderBy('id', 'asc')  // Use 'date' if your table has it
        ->pluck('close');

    $sdate_all_year='2016-01-03';

//    $sql = "SELECT *, close AS current_close, LEAD(close) OVER (ORDER BY date) AS next_close, (LEAD(close) OVER (ORDER BY date)/close ) AS result_divide FROM index_data WHERE date >= '$sdate' AND date < '$edate' AND index_sumbol = '$index_symbol' AND  date!='2024-04-14'";

//    $data = Sector::where('code', $code)
//        ->where(DB::raw("STR_TO_DATE(sectors.date, '%Y-%m-%d')"), '>=', $sdate_all_year)
//        ->where(DB::raw("STR_TO_DATE(sectors.date, '%Y-%m-%d')"), '<', $edate)
//        ->where('date', '!=', '2024-04-14')
//        ->join('sectors as next_row', 'sectors.date', '<', 'next_row.date')
//        ->select('sectors.*', 'next_row.close as next_close')
//        ->selectRaw('(next_row.close / sectors.close) as result_divide')
//        ->orderBy('sectors.date','asc')
//        ->get();
//
//    dd($data);
    // Calculate ratios like B10/B11, B11/B12, etc.
    $closes[] = $closes[count($closes) - 1]; // Add a duplicate of the last element

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


function resistanceSupport($ticker)
{

    $company = Company::query()->where('company_num','=',$ticker)->first();
    $close = $company->close;
    $stock = Stock::where('ticker', $ticker)->orderBy('date', 'desc')  // Use 'date' if your table has it
    ->get(['date','adjclose','high','low'])->toArray();

    $stock = array_slice($stock, 0,30);

    $HP = [];
    $LP = [];
    $last_trading_close_price = 0;
    for ($i = 0; $i < 30; $i++) {
        $HP[] = $stock[$i]['high'];
        $LP[] = $stock[$i]['low'];
        if ($i == 0){
            $last_trading_close_price = $stock[$i]['adjclose'];
        }
    }

    $HP_max = getMaximumValue($HP);
    $LP_min = getMinimumValue($LP);

    $resistance_price = (2 * (( $HP_max + $LP_min + $last_trading_close_price) / 3)) - $LP_min;
    $support_price = (2 * (( $HP_max + $LP_min + $last_trading_close_price) / 3)) - $HP_max;
    $average_price_midpoint = ($resistance_price + $support_price) / 2;

    $max_min = round($resistance_price - $support_price);
    $numberOfBin = sqrt(30);
    $binRange = roundup($max_min / $numberOfBin);
    return [
        'support_price' => $support_price,
        'average_price_midpoint' => $average_price_midpoint,
        'market_close_price' => $close,
        'resistance_price' => $resistance_price,
        'binRange' => $binRange
    ];
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
//    dd($sector_daily_stock_volatility);
    return ($dash_C6/100) + (($company_daily_stock_volatility/100) * sqrt(250)) * (pow((($sector_return_avg/100) + 1),250) - 1 - ($dash_C6/100))
        / (($sector_daily_stock_volatility/100) * sqrt(250));
//    return (4.68/100)+((1.342/100)*SQRT(250))*(pow(((0.010400472/100)+1),250)-1-(4.68/100))/((1.165353608/100)*SQRT(250));
}



function sharpRatio($annualStockExpectedReturn, $dailyStockVolatility): float|int // $dailyStockVolatility will be * 250 do get it as Annual Stock Volatility
{
    return ($annualStockExpectedReturn / ($dailyStockVolatility * sqrt(250))) * 100;
}



function calculateBeta(array $stockRatios, array $sectorRatios) {
    // Assume $stockRatios and $sectorRatios are arrays of the same length
    // this pic of code for 3 years of data $sectorRatios = array_slice($sectorRatios, 0,count($stockRatios));
    // this pic of code for 6 months of data $sectorRatios = array_slice($sectorRatios, 0,180);

    $sectorRatios = array_slice($sectorRatios, 0,180);
    $stockRatios = array_slice($stockRatios, 0,180);

    $n = 180;

    if ($n !== count($sectorRatios) || $n < 2) {
        return null; // Data mismatch or not enough points
    }

    $meanStock = array_sum($stockRatios) / $n;
    $meanSector = array_sum($sectorRatios) / $n;

    $covariance = 0;
    $varianceSector = 0;

    for ($i = 0; $i < $n; $i++) {
        $covariance += ($stockRatios[$i] - $meanStock) * ($sectorRatios[$i] - $meanSector);
        $varianceSector += pow($sectorRatios[$i] - $meanSector, 2);
    }


    $covariance /= ($n - 1);
    $varianceSector /= ($n - 1);

    if ($varianceSector == 0) {
        return null; // To avoid division by zero
    }

    return round(($covariance / $varianceSector) ,3);
}



function averageIfNotEmpty(array $values) {
    // Filter to keep only non-empty numeric values
    $valid = array_filter($values, function ($v) {
        return $v !== '' && $v !== null && is_numeric($v);
    });

    $count = count($values);

    if ($count === 0) {
        return '0%'; // Same as Excel's fallback
    }

    $average = array_sum($values) / $count;

    // Format as percentage
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
    $company = Company::where('company_num', '=', $ticker)->first();
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
    $annualStockExpectedReturn = annualStockExpectedReturn(dash_C6, $company_daily_stock_volatility, $sector_return_avg, $sector_daily_stock_volatility);

    $stockVar = Normal::inverse((1-0.95), calculateAverage($companyRatios), stdDeviation($companyRatios)) * sqrt($company->stock_var_days);
    $sharpRatio = sharpRatio($annualStockExpectedReturn, $company_daily_stock_volatility);
    $stockBetaCoefficient = calculateBeta($companyRatios, $sectorRatios);
    $annualStockVolatility = (($company_daily_stock_volatility) * sqrt(250)) / 100;

    $companyRatios3Years = array_slice($companyRatios, 0,750);
    $minimumDailyStock3Years = getMinimumValue($companyRatios3Years);
    $maximumDailyStock3Years = getMaximumValue($companyRatios3Years);

    $companyRatios1Year = array_slice($companyRatios, 0,250);
    $minimumDailyStock1Year = getMinimumValue($companyRatios1Year);
    $maximumDailyStock1Year = getMaximumValue($companyRatios1Year);






    if ($annualStockVolatility <= 0.10) {
        $stockRiskRank = "Conservative";
    } elseif ($annualStockVolatility <= 0.20) {
        $stockRiskRank = "Moderately Conservative";
    } elseif ($annualStockVolatility <= 0.30) {
        $stockRiskRank = "Aggressive";
    } else {
        $stockRiskRank = "Very Aggressive";
    }
//    echo "Stock Var: " . round($stockVar, 2) . "<br>";
//    echo "Sharp Ratio: " . round($sharpRatio, 3) . "<br>";
//    echo "Stock Beta Coefficient: " . $stockBetaCoefficient . "<br>";
//    echo "Daily Stock Volatility: " . round($company_daily_stock_volatility, 3) . "<br>";
//    echo "Annual Volatility: " . round($annualStockVolatility*100, 3) . "<br>";
//    echo "Risk Rank: " . $stockRiskRank . "<br>";
//    echo "Average Daily Expected Return: " . round(averageIfNotEmpty($companyRatios),4) . "<br>";
//    echo "Annual Stock Expected Return: " . round($annualStockExpectedReturn*100, 3) . "<br>";

    return [
        'stockVar' => round($stockVar, 2),
        'sharpRatio' => round($sharpRatio, 3),
        'stockBetaCoefficient' => $stockBetaCoefficient,
        'dailyVolatility' => round($company_daily_stock_volatility, 3),
        'annualVolatility' => round($annualStockVolatility*100, 3),
        'riskRank' => $stockRiskRank,
        'averageDailyExpectedReturn' => round(averageIfNotEmpty($companyRatios),4),
        'averageAnnualExpectedReturn' => round($annualStockExpectedReturn*100, 3),
        'minimumDailyStock3Years' => $minimumDailyStock3Years,
        'maximumDailyStock3Years' => $maximumDailyStock3Years,
        'minimumDailyStock1Year' => $minimumDailyStock1Year,
        'maximumDailyStock1Year' => $maximumDailyStock1Year,
        'average_daily_expected_return_1_year' => round(averageIfNotEmpty($companyRatios1Year),4),


    ];
}

function financialRatios($ticker): array
{
    $sdate = '2023-09-12';
    $edate = '2024-09-13';

    try {
        $summaryProfileUrl = "https://yh-finance-complete.p.rapidapi.com/summaryprofile?symbol=$ticker.SR";
        $summaryProfile = fetchStockDataFromAPI($summaryProfileUrl);
    } catch (\Throwable $e) {
        echo "Error fetching summary profile for $ticker: " . $e->getMessage() . PHP_EOL;
        $summaryProfile = null;
    }

    try {
        $defaultKeyStatisticsUrl = "https://yh-finance-complete.p.rapidapi.com/defaultKeyStatistics?symbol=$ticker.SR";
        $defaultKeyStatistics = fetchDataFromAPI($defaultKeyStatisticsUrl);
    } catch (\Throwable $e) {
        echo "Error fetching key statistics for $ticker: " . $e->getMessage() . PHP_EOL;
        $defaultKeyStatistics = null;
    }

    try {
        $financialsUrl = "https://yh-finance-complete.p.rapidapi.com/financials?symbol=$ticker.SR";
        $financials = fetchDataFromAPI($financialsUrl);
    } catch (\Throwable $e) {
        echo "Error fetching financials for $ticker: " . $e->getMessage() . PHP_EOL;
        $financials = null;
    }

    try {
        $stockOptionsUrl = "https://yh-finance-complete.p.rapidapi.com/stockOptions?ticker=$ticker.SR";
        $stockOptions = fetchDataFromAPI($stockOptionsUrl);
    } catch (\Throwable $e) {
        echo "Error fetching stock options for $ticker: " . $e->getMessage() . PHP_EOL;
        $stockOptions = null;
    }




    $PIRatio = $summaryProfile['summaryDetail']['trailingPE'] ?? null;
    $returnOnEquity = $financials['financialData']['returnOnEquity'] ?? null;
    $dividendYield = $stockOptions['quote']['dividendYield'] ?? null;
    $revenuePerShare = $stockOptions['quote']['epsTrailingTwelveMonths'] ?? null;
    $lastDividendDate = $defaultKeyStatistics['defaultKeyStatistics']['lastDividendDate'] ?? null;
    $week_52_high_price = $summaryProfile['summaryDetail']['fiftyTwoWeekHigh'] ?? null;
    $week_52_low_price = $summaryProfile['summaryDetail']['fiftyTwoWeekLow'] ?? null;
    $market_to_book_ratio = $defaultKeyStatistics['defaultKeyStatistics']['priceToBook'] ?? null;
    $free_cash_flow = $financials['financialData']['freeCashflow'] ?? null;
    $ordinary_shares_number = $defaultKeyStatistics['defaultKeyStatistics']['sharesOutstanding'] ?? null;
    $regular_market_previous_close = $summaryProfile['summaryDetail']['regularMarketPreviousClose'] ?? null;
    $last_fiscal_year = $defaultKeyStatistics['defaultKeyStatistics']['lastFiscalYearEnd'] ?? null;
    $leverage_ratio = $financials['financialData']['debtToEquity'] ?? null;;
    $annual_dividend_rate = $summaryProfile['summaryDetail']['trailingAnnualDividendRate'] ?? null;

    $free_cash_flow_yield = null;
    if ($ordinary_shares_number && $regular_market_previous_close &&
        $ordinary_shares_number !== 0 && $regular_market_previous_close !== 0) {
        $free_cash_flow_yield = ($free_cash_flow / $ordinary_shares_number) / $regular_market_previous_close;
    }

//    echo 'P/I Ratio :  ' . $PIRatio . "<br>";
//    echo 'Return On Equity :  ' . $returnOnEquity . "<br>";
//    echo 'Dividend Yield :  ' . $dividendYield . "<br>";
//    echo 'revenue Per Share :  ' . $revenuePerShare . "<br>";

    return [
        'PIRatio' => $PIRatio,
        'returnOnEquity' => $returnOnEquity*100,
        'dividendYield' => $dividendYield,
        'revenuePerShare' => $revenuePerShare,
        'lastDividendDate' => $lastDividendDate,
        'week_52_high_price' => $week_52_high_price,
        'week_52_low_price' => $week_52_low_price,
        'market_to_book_ratio' => $market_to_book_ratio,
        'free_cash_flow_yield' => $free_cash_flow_yield,
        'leverage_ratio' => $leverage_ratio,
        'annual_dividend_rate' => $annual_dividend_rate,
        'last_fiscal_year' => $last_fiscal_year,
    ];

}

function stockMarketPrice($ticker)
{
    $stock = DB::table('stocks')->where('ticker', $ticker)->orderBy('date', 'desc')->get(['low', 'high', 'close']);
    $closes = $stock->pluck('close');
    $averageClose = $closes->avg();
    dd($averageClose);
    if ($stock) {
        $low = $stock->low;
        $high = $stock->high;
        $close = $stock->close;
        $typicalPrice = ($low + $high + $close) / 3;
        return [
            'close' => $close,
            'typicalPrice' => $typicalPrice
        ];
    }
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

function testAPI()
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://yh-finance-complete.p.rapidapi.com/summaryprofile?symbol=2010.SR");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "X-RapidAPI-Key: b2f8db2a89mshecda5e205e7732cp128b17jsn34b4adf6d0b8",
        "X-RapidAPI-Host: yh-finance-complete.p.rapidapi.com"
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    echo $response;

}


function stdDeviation($arr): float
{
    $arr_size = count($arr);
    if ($arr_size === 0) {
        throw new InvalidArgumentException('Input array cannot be empty');
    }
    $mu = array_sum($arr) / $arr_size;
    $ans = 0;
    foreach($arr as $elem){
        $ans += pow(($elem - $mu), 2);
    }
    return sqrt($ans / $arr_size);
}


/**
 * @throws Exception
 */
function updateCompanyRatios()
{
    $companies = Company::all();
//    $companies = Company::where('company_num', '=', 2010)->get();

    foreach ($companies as $company) {
        if ($company->company_num == 3001 || $company->company_num == 4010) {
            continue;
        }

        if (!Stock::where('ticker', $company->company_num)->exists()) {
            continue;
        }

        $riskMeasurementRatios = riskMeasurementRatios($company->company_num, $company->index_symbol);
        $financialRatios = financialRatios($company->company_num);
        $stockMarketPrice = stockMarketPrice($company->company_num);

        // Update company record with risk measurement ratios and financial ratios
        $company->update([
            'stock_var_percent' => $riskMeasurementRatios['stockVar'],
            'stock_sharp_ratio' => $riskMeasurementRatios['sharpRatio'],
            'stock_beta_coefficient' => $riskMeasurementRatios['stockBetaCoefficient'],
            'daily_stock_volatility' => $riskMeasurementRatios['dailyVolatility'],
            'annual_stock_volatility' => $riskMeasurementRatios['annualVolatility'],
            'stock_risk_rank' => $riskMeasurementRatios['riskRank'],
            'avg_daily_expected_stock_return' => $riskMeasurementRatios['averageDailyExpectedReturn'],
            'annual_stock_expected_return' => $riskMeasurementRatios['averageAnnualExpectedReturn'],
            'pe_ratio' => $financialRatios['PIRatio'],
            'return_on_equity' => $financialRatios['returnOnEquity'],
            'stock_dividend_yield' => $financialRatios['dividendYield'],
            'earning_per_share' => $financialRatios['revenuePerShare'],
            'last_dividend_date' => Carbon::parse($financialRatios['lastDividendDate'])->format('Y-m-d'),
            'close' => $stockMarketPrice['close'],
            'typical_price' => $stockMarketPrice['typicalPrice'],
            'minimum_daily_stock_3_years' => $riskMeasurementRatios['minimumDailyStock3Years'],
            'maximum_daily_stock_3_years' => $riskMeasurementRatios['maximumDailyStock3Years'],
            'minimum_daily_stock_1_year' => $riskMeasurementRatios['minimumDailyStock1Year'],
            'maximum_daily_stock_1_year' => $riskMeasurementRatios['maximumDailyStock1Year'],
            'average_daily_expected_return_1_year' => $riskMeasurementRatios['average_daily_expected_return_1_year'],
            'week_52_high_price' => $financialRatios['week_52_high_price'],
            'week_52_low_price' => $financialRatios['week_52_low_price'],
            'market_to_book_ratio' => $financialRatios['market_to_book_ratio'],
            'free_cash_flow_yield' => $financialRatios['free_cash_flow_yield'],
            'leverage_ratio' => $financialRatios['leverage_ratio'],
            'annual_dividend_rate' => $financialRatios['annual_dividend_rate'],
            'last_fiscal_year' => Carbon::parse($financialRatios['last_fiscal_year'])->format('Y-m-d'),
        ]);
//        $company->timestamp = false;
        $company->save();
        echo 'risk measurement ratios and financial ratios updated for : ' . $company->company_num . PHP_EOL;
    }

    echo  'All Companies Updated'. PHP_EOL;

}



function calculateCovariance($x, $y)
{
    $n = 0;
    $sumX = 0;
    $sumY = 0;
    $sumXY = 0;

    $length = min(count($x), count($y));

    for ($i = 0; $i < $length; $i++) {
        // Skip rows where data is missing
        if (!isset($x[$i]) || !isset($y[$i])) {
            continue;
        }

        $n++;
        $sumX += $x[$i];
        $sumY += $y[$i];
        $sumXY += $x[$i] * $y[$i];
    }

    if ($n < 2) {
        return null; // Not enough data to calculate covariance
    }

    $meanX = $sumX / $n;
    $meanY = $sumY / $n;

    return ($sumXY / $n) - ($meanX * $meanY);
}


function getMinimumValue(array $values) {
    // Filter out non-numeric or empty values (optional, for safety)
    $filtered = array_filter($values, function ($v) {
        return is_numeric($v);
    });

    if (empty($filtered)) {
        return null; // or some default like 0
    }

    return min($filtered);
}


function getMaximumValue(array $values) {
    // Filter out non-numeric values
    $filtered = array_filter($values, function ($v) {
        return is_numeric($v);
    });

    if (empty($filtered)) {
        return null; // or return 0 or a custom default
    }

    return max($filtered);
}


function numberOfBin($ticker): int {
    $values = calculateRatiosByCompany($ticker);
    // Count non-empty values
    $nonEmptyCount = count(array_filter($values, function ($v) {
        return $v !== null && $v !== '';
    }));

    // Square root and round up
    return (int) ceil(sqrt($nonEmptyCount));
}

function binRange($ticker)
{
    $ratios = calculateRatiosByCompany($ticker);
    $min = getMinimumValue($ratios);
    $max = getMaximumValue($ratios);
    $max_min = $max - $min;
    return $max_min / numberOfBin(7010) ;
}

function binBoundary($ticker)
{
    $ratios = calculateRatiosByCompany($ticker);
    $min = getMinimumValue($ratios);
    $max = getMaximumValue($ratios);
    $max_min = $max - $min;
    $numberOfBins = numberOfBin($ticker);
    $binRange = $max_min / $numberOfBins;

    $result = [];
    for ($i = 0; $i < $numberOfBins; $i++) {
        $result[] = $min + ($i * $binRange);
    }

    return $result;
}


function frequency(array $data, array $bins): array {
    sort($bins);  // Make sure bins are in ascending order
    $frequencies = array_fill(0, count($bins) + 1, 0); // +1 for values > last bin

    foreach ($data as $value) {
        if (!is_numeric($value)) continue;

        $placed = false;
        foreach ($bins as $i => $bin) {
            if ($value <= $bin) {
                $frequencies[$i]++;
                $placed = true;
                break;
            }
        }
        if (!$placed) {
            $frequencies[count($bins)]++; // value > last bin
        }
    }

    return $frequencies;
}


function normalizeF3Value($dashboardF3, $f3, array $columnA): string|float {
    if ($dashboardF3 === '' || $dashboardF3 === null) {
        return '';
    }

    // Count non-empty cells in column A
    $nonEmptyCount = count(array_filter($columnA, function ($value) {
        return $value !== '' && $value !== null;
    }));

    if ($nonEmptyCount === 0) {
        return 0;
    }

    return $f3 / $nonEmptyCount;
}
