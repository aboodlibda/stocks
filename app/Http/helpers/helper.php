
<?php


use MathPHP\Probability\Distribution\Continuous;
use MathPHP\Statistics\Correlation;

use MathPHP\Statistics\Descriptive;



$sit_name= 'live stock';
$Dashboard_C6=0.05507;
$Dashboard_C5=1;



//function fetchDataFromAPI($url) {
//    $curl = curl_init();
//
//    curl_setopt_array($curl, [
//        CURLOPT_URL => $url,
//        CURLOPT_RETURNTRANSFER => true,
//        CURLOPT_ENCODING => "",
//        CURLOPT_MAXREDIRS => 10,
//        CURLOPT_TIMEOUT => 30,
//        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//        CURLOPT_CUSTOMREQUEST => "GET",
//        CURLOPT_HTTPHEADER => [
//            "X-RapidAPI-Host: yh-finance-complete.p.rapidapi.com",
//            "X-RapidAPI-Key: 83fe74aaffmsh9c87c42fba2dd7fp1facf0jsn933625c719d2"
//        ],
//    ]);
//
//    $response = curl_exec($curl);
//    $err = curl_error($curl);
//
//    curl_close($curl);
//
//    if ($err) {
//        return "cURL Error #:" . $err;
//    } else {
//        return json_decode($response, true); // تحويل النص إلى مصفوفة
//    }
//}


function fetchDataFromAPI($url) {
    $response = Http::withHeaders([
        'X-RapidAPI-Host' => 'yh-finance-complete.p.rapidapi.com',
        'X-RapidAPI-Key' => 'b2f8db2a89mshecda5e205e7732cp128b17jsn34b4adf6d0b8',
    ])->get($url);

    if ($response->failed()) {
        return "Error: " . $response->status();
    }

    return $response->json(); // Return the JSON data as an array
}

function fetchDataFromAPINew($stock, $period, $startDate, $endDate) {
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://yahoo-finance160.p.rapidapi.com/history",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode([
            'stock' => $stock,
            'period' => $period
        ]),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "x-rapidapi-host: yahoo-finance160.p.rapidapi.com",
            "x-rapidapi-key: b2f8db2a89mshecda5e205e7732cp128b17jsn34b4adf6d0b8"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
        return;
    }

    // فك ترميز JSON
    $data = json_decode($response, true);

    // التأكد من وجود البيانات في الـ records
    if (isset($data['records'])) {
        $filteredData = [];

        // تحويل التواريخ إلى صيغة قابلة للمقارنة
        $startDate = strtotime($startDate);
        $endDate = strtotime($endDate);

        foreach ($data['records'] as $record) {
            $recordDate = strtotime($record['index']); // تحويل تاريخ كل سجل

            // التحقق إذا كان تاريخ السجل بين تاريخ البداية والنهاية
            if ($recordDate >= $startDate && $recordDate <= $endDate) {
                $filteredData[] = $record; // إضافة السجل إلى البيانات المفلترة
            }
        }
        return $filteredData;

    } else {
        echo "No records found.\n";
    }
}

function std_deviation($arr){
    $arr_size = count($arr);
    $mu = array_sum($arr) / $arr_size;
    $ans = 0;
    foreach($arr as $elem){
        $ans += pow(($elem - $mu), 2);
    }
    return sqrt($ans / $arr_size);
}


function covariance($data1, $data2) {
    $count = count($data1);
    if ($count != count($data2)) {
        return "Error: The number of elements in the two arrays must be the same.";
    }

    $mean1 = array_sum($data1) / $count;
    $mean2 = array_sum($data2) / $count;

    $covariance = 0;
    for ($i = 0; $i < $count; $i++) {
        $covariance += ($data1[$i] - $mean1) * ($data2[$i] - $mean2);
    }

    $covariance /= ($count - 1);
    return $covariance;
}

// دالة لتقريب الرقم للأعلى إلى أقرب عدد صحيح
function roundup($value) {
    return ceil($value);
}

// دالة لحساب عدد العناصر غير الفارغة في المصفوفة
function countif($array, $condition) {
    $count = 0;
    foreach ($array as $value) {
        if ($value != "") {
            $count++;
        }
    }
    return $count;
}
// دالة لحساب النتيجة
function calculateResult($data) {
    // حساب عدد العناصر غير الفارغة
    $count = countif($data, "<>");

    // حساب الجذر التربيعي لعدد العناصر غير الفارغة
    $sqrt_value = sqrt($count);

    // تقريب النتيجة إلى الأعلى
    $result = roundup($sqrt_value);

    return $result;
}

function calculateHistogramWithBinBoundaries(array $data, array $bin_boundaries): array {
    $num_bins = count($bin_boundaries) - 1;
    $bin_counts = array_fill(0, $num_bins, 0);

    foreach ($data as $value) {
        for ($i = 0; $i < $num_bins; $i++) {
            if ($value >= $bin_boundaries[$i] && $value < $bin_boundaries[$i + 1]) {
                $bin_counts[$i]++;
                break;
            }
        }
        // تضمين القيم التي تساوي الحد الأقصى في آخر صندوق
        if ($value == end($bin_boundaries)) {
            $bin_counts[$num_bins - 1]++;
        }
    }

    return $bin_counts;
}


function execute_code()
{
    $Dashboard_C6 = 0.05507;
    $Dashboard_C5 = 1;

// استعلام SQL لاختيار صف واحد بناءً على index_symbol
// $sql_companies = "SELECT company_id,company_num, company_name, index_name, index_symbol
//                   FROM companies";
// $stmt = $conn->prepare($sql_companies);
// index_symbol IN (?, ?)
//                   AND
// WHERE  company_num NOT IN (?, ?)
// ربط المعاملات قبل تنفيذ الاستعلام
// $ticker_symbol1 = "TENI";
// $ticker_symbol2 = "TDAI";
// $ticker_num1 = 2381;
// $ticker_num2 = 2382;
// $stmt->bind_param("ii", $ticker_num1, $ticker_num2);

// $stmt->execute();
// $result_companies = $stmt->get_result();
// **********************************************************************************
// $excluded_ticker_nums = [2381, 2382, 1321,1322,2223,3001,4142,1833,4262,4263,4010,6014,6015,4071,4192,4162,4163,4164,2281,2282,2283,4014,4015,1183,1111,4081,4082,4130,7202,7203,7204,2082,2083,4332,4333,4337,4346,4348,4349,4322]; // يمكنك تعديل المصفوفة بأي أرقام تريد استبعادها
    $excluded_ticker_nums = [2382,3001,1833]; // يمكنك تعديل المصفوفة بأي أرقام تريد استبعادها

// إنشاء سلسلة ديناميكية من علامات الاستفهام (؟)
    $placeholders = implode(',', array_fill(0, count($excluded_ticker_nums), '?'));


// Query the database using Laravel's query builder
    $result_companies = DB::table('companies')
        ->select('company_id', 'company_num', 'company_name', 'index_name', 'index_symbol')
        ->where('company_num','=','2030')
        ->whereNotIn('company_num', $excluded_ticker_nums)  // Exclude company numbers
        ->get();

// إعداد الاستعلام مع استخدام placeholders
//$sql_companies = "SELECT company_id, company_num, company_name, index_name, index_symbol
//                  FROM companies
//                  WHERE company_num NOT IN ($placeholders)";

//$stmt = $conn->prepare($sql_companies);

// إنشاء مصفوفة تمرير المعاملات إلى bind_param
//$types = str_repeat('i', count($excluded_ticker_nums)); // جميع القيم أعداد صحيحة (i)
//$stmt->bind_param($types, ...$excluded_ticker_nums);
//
//$stmt->execute();
//$result_companies = $stmt->get_result();
// **************************************************************************************
// $start_company_num = 4322;

// $sql_get_id = "SELECT company_id FROM companies WHERE company_num = ?";
// $stmt = $conn->prepare($sql_get_id);
// $stmt->bind_param("i", $start_company_num);
// $stmt->execute();
// $result = $stmt->get_result();
// $row = $result->fetch_assoc();
// $stmt->close();
// if ($row) {
//     $start_company_id = $row['company_id']; // حفظ الـ company_id الذي وجدناه

//     // 2️⃣ جلب جميع الشركات التي يأتي `company_id` الخاص بها بعد هذا الرقم
//     $sql_companies = "SELECT company_id, company_num, company_name, index_name, index_symbol
//                       FROM companies
//                       WHERE company_id > ?
//                       ORDER BY company_id ASC";

//     $stmt = $conn->prepare($sql_companies);
//     $stmt->bind_param("i", $start_company_id);
//     $stmt->execute();
//     $result_companies = $stmt->get_result();



    // Fetch companies from the database
    $companies = DB::table('companies')->get();

    foreach ($companies as $company) {
        $company_id = $company->company_id;
        $ticker = $company->company_num;
        $company_name = $company->company_name;
        $index_name = $company->index_name;
        $index_symbol = $company->index_symbol;

        echo $ticker . "\n";

        $sdate = '2023-09-12';
        $edate = '2024-09-13';

        // API calls
        $data1 = fetchDataFromAPI("https://yh-finance-complete.p.rapidapi.com/summaryprofile?symbol={$ticker}.SR");
        $data2 = fetchDataFromAPI("https://yh-finance-complete.p.rapidapi.com/defaultKeyStatistics?symbol={$ticker}.SR");
        $data3 = fetchDataFromAPI("https://yh-finance-complete.p.rapidapi.com/financials?symbol={$ticker}.SR");
        $data4 = fetchDataFromAPI("https://yh-finance-complete.p.rapidapi.com/yhfhistorical?ticker={$ticker}.SR&sdate={$sdate}&edate={$edate}");
        $data5 = fetchDataFromAPI("https://yh-finance-complete.p.rapidapi.com/stockOptions?ticker={$ticker}.SR");

        $disabled_date = '2024-04-14';
        $log_values_not_percentage = [];

        // Process historical data
        $count = count($data4);
        for ($i = 1; $i < $count; $i++) {
            $close_previous = $data4[$i - 1]['close'];
            $close_current = $data4[$i]['close'];
            $date_stock = date('Y-m-d', strtotime($data4[$i]['date']));

            if ($date_stock == $disabled_date) {
                continue;
            }

            $log_values_not_percentage[] = log($close_current / $close_previous);
        }

        $last_250_elements = array_slice($log_values_not_percentage, -250);
        $min_value = min($last_250_elements);
        $max_value = max($last_250_elements);
        $standardDeviation = Descriptive::standardDeviation($log_values_not_percentage, true);
        $average = array_sum($log_values_not_percentage) / count($log_values_not_percentage);

        // Statistical calculations
        $I5 = 0.95;
        $G6 = 0.05; // Placeholder, should be retrieved dynamically
        $normal = new Continuous\Normal(0, 1);
        $p = 1 - $I5;
        $z_score = $normal->inverse($p);
        $value = $z_score * sqrt($G6);
        $i6 = $value * $standardDeviation + $average;

        // Fetching stock data from database
//        $stock_data = DB::table('sectors')
//            ->selectRaw('*, close AS current_close, LEAD(close) OVER (ORDER BY date) AS next_close, (LEAD(close) OVER (ORDER BY date) / close) AS result_divide')
//            ->whereBetween('date', [$sdate, $edate])
//            ->where('code', $index_symbol)
//            ->where('date', '!=', $disabled_date)
//            ->get();

//        $stock_data = "SELECT *, close AS current_close, LEAD(close) OVER (ORDER BY date) AS next_close, (LEAD(close) OVER (ORDER BY date)/close ) AS result_divide FROM index_data WHERE date >= '$sdate' AND date < '$edate' AND index_sumbol = '$index_symbol' AND  date!='2024-04-14'";

        $stock_data = DB::table('sectors')
            ->selectRaw('close AS current_close,
                 LEAD(close) OVER (ORDER BY date) AS next_close,
                 (LEAD(close) OVER (ORDER BY date) / close) AS result_divide')
            ->where('date', '>=', $sdate)
            ->where('date', '<', $edate)
            ->where('code', '=', $index_symbol)
            ->where('date', '!=', '2024-04-14')
            ->get();
        dd($stock_data);

//        $stock_data = DB::select("
//    SELECT s1.*,
//           s1.close AS current_close,
//           s2.close AS next_close,
//           (s2.close / s1.close) AS result_divide
//    FROM sectors s1
//    LEFT JOIN sectors s2 ON s2.date = (SELECT MIN(date) FROM sectors WHERE date > s1.date)
//    WHERE s1.date BETWEEN ? AND ?
//    AND s1.code = ?
//    AND s1.date != ?
//", [$sdate, $edate, $index_symbol, $disabled_date]);


        $log_values2 = [];
        $sum2 = 0;
        $count2 = 0;

        foreach ($stock_data as $row) {
            if ($row->result_divide !== null) {
                $result2 = log($row->result_divide);
                $log_values2[] = $result2;
                $sum2 += $result2;
                $count2++;
            }
        }

        $average2 = $count2 > 0 ? $sum2 / $count2 : 0;
        $std_deviation2 = Descriptive::standardDeviation($log_values2, true);
        $varianceG = pow($std_deviation2, 2);
        $covariance = Descriptive::covariance($log_values_not_percentage, $log_values2);

        $result3 = $covariance / $varianceG;
        $f5 = $result3;
        $g1 = $average2;

        $Dashboard_C6 = 5.63 / 100;
        $f4 = ($Dashboard_C6 + ($f5 * (pow($g1 + 1, 250) - 1)));

        $f2 = pow($std_deviation2, 2);
        $f3 = sqrt($f2);
        $k3 = is_numeric($f3) ? $f3 * sqrt(250) : 0;
        $k2 = number_format(($f4 - $Dashboard_C6) / $k3, 6);

        if ($k3 <= 0.10) {
            $k4 = "Conservative";
        } elseif ($k3 <= 0.20) {
            $k4 = "Moderately Conservative";
        } elseif ($k3 <= 0.30) {
            $k4 = "Aggressive";
        } else {
            $k4 = "Very Aggressive";
        }

        $f1 = $average;
        $Annual_Stock_Expected_3years = $Dashboard_C6 + ($f5 * (pow(($g1 + 1), 250) - 1 - $Dashboard_C6));
        $Annual_Stock_Expected = $Dashboard_C6 + ($f5 * (pow(($average2 + 1), 250) - 1 - $Dashboard_C6));
        $Daily_Stock_Expected = (pow((1 + $Annual_Stock_Expected / 100), (1 / 250)) - 1) * 100;
        $stock_sharp_risk = $Annual_Stock_Expected_3years / $k3;

        // Fetch financial ratios from API response
        $var1 = round($i6, 3);
        $var2 = round($stock_sharp_risk, 3);
        $var3 = round($f5, 2);
        $var4 = round($k3 * 100, 3);
        $var5 = round($f3 * 100, 3);
        $var6 = $k4;
        $var7 = isset($data1['summaryDetail']['trailingPE']) ? round($data1['summaryDetail']['trailingPE'], 2) : null;
        $var8 = isset($data3['financialData']['returnOnEquity']) ? round($data3['financialData']['returnOnEquity'], 2) : null;
        $var9 = isset($data5['quote']['dividendYield']) ? round($data5['quote']['dividendYield'], 2) : null;
        $var10 = round($data3['financialData']['revenuePerShare'], 2);
        $var11 = round($Annual_Stock_Expected_3years * 100, 2);
        $var12 = round($f1 * 100, 3);

        // Update company record in the database
        DB::table('companies')
            ->where('company_id', $company_id)
            ->update([
                'stock_var_percent' => $var1,
                'stock_sharp_ratio' => $var2,
                'stock_beta_coefficient' => $var3,
                'annual_stock_volatility' => $var4,
                'daily_stock_volatility' => $var5,
                'stock_risk_rank' => $var6,
                'pe_ratio' => $var7,
                'return_on_equity' => $var8,
                'stock_dividend_yield' => $var9,
                'earning_per_share' => $var10,
                'annual_stock_expected_return' => $var11,
                'avg_daily_expected_stock_return' => $var12
            ]);

        echo "Updated company ID: $company_id \n";
        \Illuminate\Support\Facades\Log::info("Updated company ID: $company_id");
    }


}
