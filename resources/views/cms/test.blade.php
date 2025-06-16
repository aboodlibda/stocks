<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
{{--    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <title>Market Stock Screen</title>
    <style>
        body {
            font-family: Tajawal, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 11px;
        }

        th, td {
            border: 1px solid #000;
            padding: 2px;
            text-align: center;
        }

        .row1-merged {
            background-color: #c00202;
            color: white;
        }

        .row1-single {
            background-color: #e1e1e1;
        }


        .row2-merged1 {
            background-color: #203562;
            color: white;
        }

        .row2-merged2 {
            background-color: #315492;
            color: white;
        }

        .row2-merged3 {
            background-color: #8faadd;
        }

        .row2-merged4 {
            background-color: #b3c6e8;
        }

        .row2-merged5 {
            background-color: #9ba4b3;
        }

        .row2-mergedAll {
            background-color: #c00202;
            color: white;
            font-weight: bold;
        }


        .gr-blue-1 {
            background-color: #203562;
            color: white;
        }
        .gr-blue-2 {
            background-color: #315492;
            color: white;
        }
        .gr-blue-3 {
            background-color: #8faadd;
            color: black;
        }
        .gr-blue-4 {
            background-color: #b3c6e8;
        }
        .gr-blue-5 {
            background-color: #9ba4b3;
        }

        .orange { background-color: #ffb823; }

        .main_search_div {
            /*background: linear-gradient(25deg, #8600b3 50%, #cc33ff 50%);*/
            /*height: 100vh;*/
            display: flex;
            align-items: center;
            justify-content: center;
            /*padding-bottom: 10px;*/
        }


        h1 {
            /*position: absolute;*/
            top: 30%;

            font-size: 60px;
            color: #c00202;
        }

        .box {
            width: 500px;
            height: 15px;
            background-color: white;
            border-radius: 30px;
            display: flex;
            align-items: center;
            padding: 10px;
            border: 3px solid #4e7bd1;
        }

        .box>i {
            font-size: 20px;
            color: #777;
        }

        .box>input {
            flex: 1;
            height: 15px;
            border: none;
            outline: none;
            font-size: 18px;
            padding-left: 10px;
        }

        #search-button {
            width: 30%;
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        #search-button:hover {
            background-color: #3e8e41;
        }

        .gray{
            background-color: #a6a6a6;
        }

        /*thead th, thead td  {*/
        /*    position: sticky;*/
        /*    top: 0;*/
        /*    background-color: white; !* Or any color that fits your design *!*/
        /*    z-index: 1;*/
        /*    border-bottom: 1px solid #ccc;*/
        /*}*/

        /*.table-container {*/
        /*    overflow-y: auto;*/
        /*}*/


        .select-search {
            margin: 20px;
            /*padding: 10px;*/
            border: none;
        }

        /* Style the select element */
        .sector {
            width: 100%;
            padding: 9px;
            font-size: 16px;
            border: 2px solid #006a83;
            border-radius: 30px;
            background-color: #f9f9f9;
            cursor: pointer;
        }

        /* Style the options */
        .sector option {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
        }

        /* Style the selected option */
        .sector option[selected] {
            background-color: #007bff;
            color: #fff;
        }

        /* Style the disabled option */
        .sector option[disabled] {
            color: #ccc;
        }

        /* CSS */
        .logo-container {
            width: 200px; /* adjust the width as needed */
            height: 90px; /* adjust the height as needed */
            /*background-color: #8faadd; !* light gray background *!*/
            border-radius: 10px; /* rounded corners */
            display: grid;
            justify-content: left;
            /*align-items: start;*/
            /*margin:  auto; !* add some margin *!*/
        }

        .logo {
            width: 150%; /* adjust the logo size */
            height: auto;
            object-fit: contain;
        }

        .border-none{
            border: none;
        }

    </style>
</head>
<body>

<!-- HTML -->
<div class="logo-container">
    <img src="{{asset('assets/media/logo.png')}}" alt="Logo" class="logo">
</div>

<!-- Large modal -->

<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center w-100">تحليل أداء السهم</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="modal-loader"></div>

                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <div id="chart2Container" style="height: 370px; width: 100%;"></div>

            </div>
        </div>
    </div>
</div>
<div class="main_search_div">
{{--    <div class="select-search">--}}
{{--        <select name="sector" class="sector" id="sector">--}}
{{--            <option  selected>اختر القطاع</option>--}}
{{--            @foreach($companies as $sector)--}}
{{--                <option value="{{$sector->index_symbol}}">{{$sector->index_name}}</option>--}}
{{--            @endforeach--}}
{{--        </select>--}}
{{--    </div>--}}
    <div class="box">
        <i class="fa-brands fa-searching"></i>
        <input type="text" name="" dir="rtl" placeholder="البحث بإسم أو رقم الشركة / إسم أو رمز القطاع" id="search-input">
    </div>

</div>

    <table id="stock_table" class="table-container">

        <thead>

        <tr style="position: sticky; top: 0">
            <th colspan="13" class="border-none" style="background-color: white"></th>
            <th colspan="8" class="row2-mergedAll gr-blue-2">Industry Performance</th>
            <th colspan="11" class="border-none" style="background-color: white"></th>
        </tr>
        <tr style="position: sticky; top: 20px">
            <th colspan="7" class="border-none" style="background-color: white"></th>
            <th colspan="6" class="row2-mergedAll gr-blue-3">Risk measurement Ratios</th>
            <th colspan="4" class="row2-mergedAll gr-blue-3">Over 3 Years Historical Data</th>
            <th colspan="3" class="row3-cell14 gr-blue-4">Over 1 Year Historical Data</th>
            <th colspan="1" class="row2-mergedAll gr-blue-2"></th>

            <th colspan="8" class="row2-mergedAll gr-blue-3">Financial Ratios</th>
            <th colspan="11" class="border-none" style="background-color: white"></th>

        </tr>
        <tr style="position: sticky; top: 40px">
            <th colspan="4" style="border: 1px solid black;background: white">
                <span style="color: black;font-size: 11px;font-weight: bold">فترة تحميل أسعار الأسهم التاريخية من 12-09-2021 الى 12-09-2024 والقطاع الصناعي من 12-09-2021 الى 12-09-2024</span>
            </th>
            <th colspan="3" style="font-weight: bold;background: white;border: 1px solid black">
                أضغط على السهم أدناة
                لأحتساب متوسط القطاع آليا
            </th>
            <th class="row3-cell6 gr-blue-2">VaR % For 1 Day</th>
            <th class="row3-cell7 gr-blue-2">Sharp Ratio</th>
            <th class="row3-cell8 gr-blue-2">Beta Coefficient</th>
            <th class="row3-cell9 gr-blue-2">Daily Volatility</th>
            <th class="row3-cell10 gr-blue-2">Annual Volatility</th>
            <th class="row3-cell11 gr-blue-2">Risk Ranking</th>


            <th class="row3-cell14 gr-blue-3" style="font-size: 10px">Minimum Daily Return</th>
            <th class="row3-cell14 gr-blue-3" style="font-size: 10px">Maximum Daily Return</th>
            <th class="row3-cell14 gr-blue-3" style="font-size: 10px">Annual Expected Return</th>
            <th class="row3-cell14 gr-blue-3" style="font-size: 10px">Average Return</th>
            <th class="row3-cell14 gr-blue-4" style="font-size: 10px">Minimum Daily Return</th>
            <th class="row3-cell14 gr-blue-4" style="font-size: 10px">Maximum Daily Return</th>
            <th class="row3-cell14 gr-blue-4" style="font-size: 10px">Average Return</th>
            <th class="row3-cell14 gr-blue-2"></th>


            <th class="row3-cell14 gr-blue-2">P/E Ratio</th>&nbsp;
            <th class="row3-cell15 gr-blue-2">Market to Book Ratio</th>
            <th class="row3-cell15 gr-blue-2">ROE</th>
            <th class="row3-cell15 gr-blue-2">Free Cash Flow Yield</th>
            <th class="row3-cell15 gr-blue-2">Leverage Ratio</th>
            <th class="row3-cell16 gr-blue-2">Dividend Yield</th>
            <th class="row3-cell17 gr-blue-2">
                EPS<img src="{{asset('assets/media/Saudi_Riyal_Symbol.svg')}}" alt="Saudi Exchange Logo" style="width: 30px; height: 15px;">
            </th>
            <th class="row3-cell18 gr-blue-2">Annual Dividend Rate</th>
            <th colspan="11" class="border-none" style="background-color: white"></th>

        </tr>
        <tr style="position: sticky; top: 110px">
            <th colspan="4" style="border: 1px solid #000;background: white">
                <span style="color: black;;font-size: 11px">PM 01:45:00 | تاريخ تحديث البيانات 30-04-2024 </span>
            </th>
            <th colspan="3" class="row1-merged gr-blue-2">
                Average Industry
                <select id="sector" name="sector" style="border: 1px solid black;width: 100%;background-color: #8faadd;color:black;font-family: Tajawal, sans-serif;text-align: center">
                    <option  selected>اختر القطاع</option>
                    @foreach($companies as $sector)
                        <option value="{{$sector->index_symbol}}">{{$sector->index_name}}</option>
                    @endforeach
                </select>
            </th>
            <th class="row1-single orange" id="avg_stock_var_percent">0</th>
            <th class="row1-single orange" id="avg_stock_sharp_ratio">0</th>
            <th class="row1-single orange" id="avg_stock_beta_coefficient">0</th>
            <th class="row1-single orange" id="avg_daily_stock_volatility">0</th>
            <th class="row1-single orange" id="avg_annual_stock_volatility">0</th>
            <th class="gr-blue-3 gray" id="stock_rank_risk"></th>

            <th class="row1-single orange" id="avg_minimum_daily_stock_3_years">0</th>
            <th class="row1-single orange" id="avg_maximum_daily_stock_3_years">0</th>
            <th class="row1-single orange" id="avg_annual_stock_expected_return">0</th>
            <th class="row1-single orange" id="avg_daily_expected_stock_return">0</th>

            <th class="row1-single orange" id="avg_minimum_daily_stock_1_year">0</th>
            <th class="row1-single orange" id="avg_maximum_daily_stock_1_year">0</th>
            <th class="row1-single orange" id="avg_average_daily_expected_return_1_year">0</th>
            <th class="row1-single gr-blue-2"></th>

            <th class="row1-single orange" id="avg_pe_ratio">0</th>
            <th class="row1-single orange" id="avg_market_to_book_ratio">0</th>
            <th class="row1-single orange" id="avg_return_on_equity">0</th>
            <th class="row1-single orange" id="avg_free_cash_flow_yield">0</th>
            <th class="row1-single orange" id="avg_leverage_ratio">0</th>
            <th class="row1-single orange" id="avg_stock_dividend_yield">0</th>
            <th class="row1-single orange" id="avg_earning_per_share">0</th>
            <th class="row1-single orange" id="avg_annual_dividend_rate">0</th>
            <th colspan="11" class="border-none" style="background-color: white"></th>

        </tr>

        <tr style="position: sticky; top: 150px;background-color: white">
            <th colspan="4" style="border: none">
            </th>

            <th colspan="25" style="padding: 10px;border: none">
                <a href="https://www.saudiexchange.sa/" target="_blank" style="color: black;text-decoration: none;font-size: 12px">رابط أخبار وأسعار سوق التداول السعودي</a>
            </th>
            <th colspan="11" class="border-none" style="background-color: white"></th>

        </tr>


        <tr style="position: sticky; top: 180px">
            <th colspan="5" class="row2-mergedAll gr-blue-3">ملخص أداء أسهم الشركات في السوق السعودى للتداول</th>
            <th colspan="2" class="row2-mergedAll gr-blue-2">Stock Market Price</th>
            <th colspan="6" class="row2-mergedAll gr-blue-3">Risk measurement Ratios</th>
            <th colspan="9" class="row2-mergedAll gr-blue-2">Stock Performance</th>
            <th colspan="10" class="row2-mergedAll gr-blue-3">Financial Ratios</th>
        </tr>

        <tr style="position: sticky; top: 218px">
            <th class="row3-cell1 gr-blue-1">إضافة السهم للمحفظة</th>
            <th class="row3-cell2 gr-blue-1">تحليل أداء السهم</th>
            <th class="row3-cell3 gr-blue-1">مؤشر القطاع</th>
            <th class="row3-cell4 gr-blue-1">القطاع</th>
            <th class="row3-cell5 gr-blue-1">الشركة</th>


            <th class="row3-cell6 gr-blue-3">Closing Price</th>
            <th class="row3-cell7 gr-blue-3">Typical Price</th>

            <th class="row3-cell6 gr-blue-2" title="VaR % For 1 Day">VaR % For 1 Day</th>
            <th class="row3-cell7 gr-blue-2">Sharp Ratio</th>
            <th class="row3-cell8 gr-blue-2">Beta Coefficient</th>
            <th class="row3-cell9 gr-blue-2">Daily Volatility</th>
            <th class="row3-cell10 gr-blue-2">Annual Volatility</th>
            <th class="row3-cell11 gr-blue-2">Risk Ranking</th>


            <th colspan="4" class="row2-mergedAll gr-blue-3">Over 3 Years Historical Data</th>
            <th colspan="5" class="row3-cell14 gr-blue-4">Over 1 Year Historical Data</th>



            <th class="row3-cell14 gr-blue-2">P/E Ratio</th>&nbsp;
            <th class="row3-cell15 gr-blue-2">Market to Book Ratio</th>
            <th class="row3-cell15 gr-blue-2">ROE</th>
            <th class="row3-cell15 gr-blue-2">Free Cash Flow Yield</th>
            <th class="row3-cell15 gr-blue-2">Leverage Ratio</th>
            <th class="row3-cell16 gr-blue-2">Dividend Yield</th>
            <th class="row3-cell17 gr-blue-2">
                EPS<img src="{{asset('assets/media/Saudi_Riyal_Symbol.svg')}}" alt="Saudi Exchange Logo" style="width: 30px; height: 15px;">
            </th>
            <th class="row3-cell18 gr-blue-2">Annual Dividend Rate</th>
            <th class="row3-cell18 gr-blue-2">Last Updated fiscal Year</th>
            <th class="row3-cell18 gr-blue-2">Latest Dividend Date</th>
        </tr>
        <tr style="position: sticky; top: 290px;">
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="row3-cell14 gr-blue-3" style="font-size: 10px">Minimum Daily Return</th>
            <th class="row3-cell14 gr-blue-3" style="font-size: 10px">Maximum Daily Return</th>
            <th class="row3-cell14 gr-blue-3" style="font-size: 10px">Annual Expected Return</th>
            <th class="row3-cell14 gr-blue-3" style="font-size: 10px">Average Daily Return</th>
            <th class="row3-cell14 gr-blue-4" style="font-size: 10px">Minimum Daily Return</th>
            <th class="row3-cell14 gr-blue-4" style="font-size: 10px">Maximum Daily Return</th>
            <th class="row3-cell14 gr-blue-4" style="font-size: 10px">Average Daily Return</th>
            <th class="row3-cell14 gr-blue-4" style="font-size: 10px">
                52 Week High Price<img src="{{asset('assets/media/Saudi_Riyal_Symbol black.svg')}}" alt="Saudi Exchange Logo" style="width: 30px; height: 15px;fill: black">
            </th>
            <th class="row3-cell14 gr-blue-4" style="font-size: 10px">
                52 Week Low Price<img src="{{asset('assets/media/Saudi_Riyal_Symbol black.svg')}}" alt="Saudi Exchange Logo" style="width: 30px; height: 15px;">
            </th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
            <th class="border-none"></th>
        </tr>
        </thead>

        <tbody id="table-data">
        </tbody>
    </table>

@php
    $ratios = calculateRatiosByCompany(7010);
    $binBoundary = binBoundary(7010);
    $frequency = frequency($ratios,$binBoundary);
@endphp
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

{{--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>--}}
{{--<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>--}}

<script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>


<script>

    function drawChart1 () {
// تحويل بيانات PHP JSON إلى JavaScript

        var values = {!! json_encode(array_values($frequency)) !!};
        var dataPointsArray = {
            var_t:values,

            bin_boundaries: []
        };

        {{--var dataPointsArray = <?php echo $dataPoints_json; ?>;--}}
        var company_name = "اس تي سي";


// التحقق من وجود البيانات
        if (!dataPointsArray.var_t || !dataPointsArray.bin_boundaries) {
            var errorMessage = document.createElement('p');
            errorMessage.innerText = "Data not available for the chart";
// document.body.appendChild(errorMessage);
            document.querySelector('.small').appendChild(errorMessage);

            return;
        }

        var chartDiv = document.createElement('div');
        chartDiv.setAttribute('id', 'chartContainer');
        chartDiv.style.cssText = 'height: 300px; width: 100%; margin: 0 auto; display: flex; justify-content: center; align-items: center;';

        // Add a container for the chart with padding
        var chartContainer = document.createElement('div');
        chartContainer.style.cssText = 'width: 100%; padding: 20px;'
        chartContainer.appendChild(chartDiv);
// document.body.appendChild(chartDiv);
        document.querySelector('.small').appendChild(chartContainer);


// إعداد بيانات الرسم البياني مع التسميات
        var bin_boundaries = dataPointsArray.bin_boundaries;
        var chartData = dataPointsArray.var_t.map(function(value, index) {
            return { y: value * 100, label: (bin_boundaries[index] * 100).toFixed(3) + "%" }; // تحويل التسميات إلى نسبة مئوية وتقريبها لثلاثة أرقام عشرية
        });

        var chartOptions = {
            title: { }, // استخدام قيمة المتغير في العنوان
            axisX: {
                title: "",
                labelAngle: -90, // تدوير التسميات لتجنب التداخل
                interval: 1,
                labelFontSize: 9 // تقليل حجم الخط لعرض المزيد من النقاط
            },
            axisY: {
                title: "",
                includeZero: true,
                suffix: "%", // إضافة علامة النسبة المئوية
                interval: 2,
                labelFontSize: 10 // تقليل حجم الخط لعرض المزيد من النقاط
            },
            data: [
                {
                    type: "column",
                    color: "#7CB9E8", // تحديد لون العمود
                    dataPoints: chartData
                }
            ]
        };

        var chart = new CanvasJS.Chart(chartDiv.id, chartOptions);
        chart.render();

    }

    $('.bd-example-modal-xl').on('shown.bs.modal', function (event) {
        // Show loading spinner
        // $(this).find('.modal-loader').html('<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');

        const button = event.relatedTarget; // The button that triggered the modal
        const company_id = button.getAttribute('data-id'); // Native JS way

        console.log('Record ID:', company_id);

        $.ajax({
            type: 'POST',
            url: '/stock-performance',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
              id: company_id
            },
            beforeSend: function() {
                $('.modal-loader').html('<div class="text-center" id="loader"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            },
            success: function(data) {
                console.log(data.company.company_name);
                $("#loader").remove();
                drawCharts1(data.company.company_name, data.frequency);
                drawCharts2(data.company.company_name,data.company.index_name,data.sector_ratios);
            }
        });
    })
</script>
<script>

    function fetchStockAverages(value) {
        $.ajax({
            url: "{{route('get-stock-averages')}}", // Adjust the URL if needed
            method: "GET",
            dataType: "json",
            data: { sector_code: value },
            success: function (response) {
                // Assuming response contains keys matching the ID attributes in the table
                $("#avg_stock_var_percent").text("%" + response.avg_stock_var_percent || "0");
                $("#avg_stock_sharp_ratio").text("%" + response.avg_stock_sharp_ratio || "0");
                $("#avg_stock_beta_coefficient").text("%" + response.avg_stock_beta_coefficient || "0");
                $("#avg_annual_stock_volatility").text("%" + response.avg_annual_stock_volatility || "0");
                $("#avg_daily_stock_volatility").text("%" + response.avg_daily_stock_volatility || "0");
                $("#stock_rank_risk").text(response.stock_risk_rank || "-");

                $("#avg_minimum_daily_stock_3_years").text("%" + response.avg_minimum_daily_stock_3_years.toFixed(2) || "0");
                $("#avg_maximum_daily_stock_3_years").text("%" + response.avg_maximum_daily_stock_3_years.toFixed(2) || "0");
                $("#avg_annual_stock_expected_return").text("%" + response.avg_annual_stock_expected_return || "0");
                $("#avg_daily_expected_stock_return").text("%" + response.avg_daily_expected_stock_return || "0");

                $("#avg_minimum_daily_stock_1_year").text("%" + response.avg_minimum_daily_stock_1_year || "0");
                $("#avg_maximum_daily_stock_1_year").text("%" + response.avg_maximum_daily_stock_1_year || "0");
                $("#avg_average_daily_expected_return_1_year").text("%" + response.avg_average_daily_expected_return_1_year || "0");

                $("#avg_pe_ratio").text("%" + response.avg_pe_ratio || "0");
                $("#avg_market_to_book_ratio").text("%" + response.avg_market_to_book_ratio || "0");
                $("#avg_return_on_equity").text("%" + response.avg_return_on_equity || "0");
                $("#avg_free_cash_flow_yield").text("%" + response.avg_free_cash_flow_yield || "0");
                $("#avg_leverage_ratio").text("%" + response.avg_leverage_ratio || "0");
                $("#avg_stock_dividend_yield").text("%" + response.avg_stock_dividend_yield || "0");
                $("#avg_annual_dividend_rate").text("%"+ response.avg_annual_dividend_rate || "0");


                var riskRank = response.stock_risk_rank;
                if (riskRank === "Conservative") {
                    $("#stock_rank_risk").css("background-color", "lightgreen");
                } else if (riskRank === "Moderately Conservative") {
                    $("#stock_rank_risk").css("background-color", "yellow");
                } else if (riskRank === "Aggressive") {
                    $("#stock_rank_risk").css("background-color", "orange");
                } else if (riskRank === "Very Aggressive") {
                    $("#stock_rank_risk").css("background-color", "red");
                } else {
                    $("#stock_rank_risk").css("background-color", "gray");
                }
            },

            error: function () {
                console.error("Failed to fetch stock averages.");
            }
        });
    }
    function getCompanies() {
        $.ajax({
            type: 'GET',
            url: '/companies',
            dataType: 'json',
            beforeSend: function() {
                $('#table-data').append('<tr><td colspan="31" style="text-align: center;font-weight: bold">جاري التحميل ...</td></tr>');
            },
            success: function(data) {
                $('#table-data').empty();
                $.each(data, function(index, company) {

                    let color;
                    switch (company.stock_risk_rank) {
                        case 'Conservative':
                            color = 'lightgreen';
                            break;
                        case 'Moderately Conservative':
                            color = 'yellow';
                            break;
                        case 'Aggressive':
                            color = 'orange';
                            break;
                        case 'Very Aggressive':
                            color = 'red';
                            break;
                        default:
                            color = 'gray'; // fallback
                    }

                    $('#table-data').append(`
                          <tr>
           <td>
               <button class="btn btn-primary btn-sm" style="height: 30px; width: 30px; padding: 0;cursor:pointer;border: none;background: transparent;">
                   <img src="{{asset('assets/media/add.png')}}" alt="Add" style="height: 20px; width: 20px;">
               </button>
           </td>

           <td>
               <button type="button" data-toggle="modal" data-target=".bd-example-modal-xl" class="btn btn-info btn-sm" data-id="${company.company_id}"
                style="height: 30px; width: 30px; padding: 0;cursor:pointer;border: none;background: transparent;">
                   <img src="{{asset('assets/media/graph.png')}}" alt="Graph" style="height: 30px; width: 30px;">
               </button>
           </td>

           <td>
               <span style="font-weight: bold">${company.index_symbol}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.index_name}</span>
           </td>

           <td>
               <span style="font-weight: bold" dir="rtl">${company.company_num} <br> ${company.company_name}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.close < 0 ? 'red' : 'black'}">${company.close !== null ? Number(company.close).toFixed(2) : '00.00'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.typical_price < 0 ? 'red' : 'black'}">${company.typical_price !== null ? Number(company.typical_price).toFixed(2) : '00.00'}</span>
           </td>


           <td>
               <span style="font-weight: bold; color: ${company.stock_var_percent < 0 ? 'red' : 'black'}">${'% ' + company.stock_var_percent}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.stock_sharp_ratio < 0 ? 'red' : 'black'}">${company.stock_sharp_ratio}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.stock_beta_coefficient < 0 ? 'red' : 'black'}">${company.stock_beta_coefficient}</span>
           </td>

             <td>
               <span style="font-weight: bold; color: ${company.daily_stock_volatility < 0 ? 'red' : 'black'}">${'% ' + company.daily_stock_volatility}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.annual_stock_volatility < 0 ? 'red' : 'black'}">${'% ' + company.annual_stock_volatility}</span>
           </td>


           <td style="background-color: ${color}">
                            <span style="font-weight: bold">${company.stock_risk_rank !== null ? company.stock_risk_rank : '-'}</span>
                        </td>

            <td>
               <span style="font-weight: bold; color: ${company.minimum_daily_stock_3_years < 0 ? 'red' : 'black'}">${'% ' + company.minimum_daily_stock_3_years}</span>
           </td>

               <td>
               <span style="font-weight: bold; color: ${company.maximum_daily_stock_3_years < 0 ? 'red' : 'black'}">${'% ' + Number(company.maximum_daily_stock_3_years).toFixed(2)}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.annual_stock_expected_return < 0 ? 'red' : 'black'}">${company.annual_stock_expected_return !== null ? '% ' + company.annual_stock_expected_return : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.avg_daily_expected_stock_return < 0 ? 'red' : 'black'}">${company.avg_daily_expected_stock_return !== null ? '% ' + company.avg_daily_expected_stock_return : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.minimum_daily_stock_1_year < 0 ? 'red' : 'black'}">${company.minimum_daily_stock_1_year !== null ? '% ' + Number(company.minimum_daily_stock_1_year).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.maximum_daily_stock_1_year < 0 ? 'red' : 'black'}">${company.maximum_daily_stock_1_year !== null ? '% ' + Number(company.maximum_daily_stock_1_year).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.average_daily_expected_return_1_year < 0 ? 'red' : 'black'}">${company.average_daily_expected_return_1_year !== null ? '% ' + Number(company.average_daily_expected_return_1_year).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.week_52_high_price < 0 ? 'red' : 'black'}">${company.week_52_high_price !== null ? Number(company.week_52_high_price).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.week_52_low_price < 0 ? 'red' : 'black'}">${company.week_52_low_price !== null ? Number(company.week_52_low_price).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.pe_ratio < 0 ? 'red' : 'black'}">${company.pe_ratio !== null ? company.pe_ratio : 'N/A'}</span>
           </td>


           <td>
                <span style="font-weight: bold; color: ${company.market_to_book_ratio < 0 ? 'red' : 'black'}">${company.market_to_book_ratio !== null ? Number(company.market_to_book_ratio).toFixed(2) : 'N/A'}</span>
           </td>


           <td>
               <span style="font-weight: bold; color: ${company.return_on_equity < 0 ? 'red' : 'black'}">${company.return_on_equity !== null ? '% ' + company.return_on_equity : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.free_cash_flow_yield < 0 ? 'red' : 'black'}">${company.free_cash_flow_yield !== null ? '%' + Number(company.free_cash_flow_yield).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.leverage_ratio < 0 ? 'red' : 'black'}">${company.leverage_ratio !== null ? '%' + company.leverage_ratio : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.stock_dividend_yield < 0 ? 'red' : 'black'}">${company.stock_dividend_yield !== null ? '%' + company.stock_dividend_yield : 'N/A'}</span>
           </td>


           <td>
               <span style="font-weight: bold; color: ${company.earning_per_share < 0 ? 'red' : 'black'}">${company.earning_per_share !== null ? company.earning_per_share : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.annual_dividend_rate < 0 ? 'red' : 'black'}">${company.annual_dividend_rate !== null ? company.annual_dividend_rate : 'N/A'}</span>
           </td>

            <td>
               <span style="font-weight: bold; color: ${company.last_fiscal_year < 0 ? 'red' : 'black'}">${company.last_fiscal_year !== null ? company.last_fiscal_year : 'N/A'}</span>
           </td>

           <td>
               <span  style="font-weight: bold;width: 100%">${company.last_dividend_date !== null ? company.last_dividend_date : '-'}</span>
           </td>
       </tr>

                `);
                });
            }
        });
    }

    $('#search-input').on('keyup', function() {
            var searchQuery = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/search', // replace with your search endpoint
                dataType: 'json',
                data: { query: searchQuery },
                beforeSend: function() {
                    $('#table-data').append('<tr><td colspan="21" style="text-align: center;font-weight: bold">جاري التحميل ...</td></tr>');
                },
                success: function(data) {
                    $('#table-data').empty();
                    $.each(data, function(index, company) {

                        let color;
                        switch (company.stock_risk_rank) {
                            case 'Conservative':
                                color = 'lightgreen';
                                break;
                            case 'Moderately Conservative':
                                color = 'yellow';
                                break;
                            case 'Aggressive':
                                color = 'orange';
                                break;
                            case 'Very Aggressive':
                                color = 'red';
                                break;
                            default:
                                color = 'gray'; // fallback
                        }

                        $('#table-data').append(`
                          <tr>
           <td>
               <button class="btn btn-primary btn-sm" style="height: 30px; width: 30px; padding: 0;cursor:pointer;border: none;background: transparent;">
                   <img src="{{asset('assets/media/add.png')}}" alt="Add" style="height: 20px; width: 20px;">
               </button>
           </td>

           <td>
               <button type="button" data-toggle="modal" data-target=".bd-example-modal-xl" class="btn btn-info btn-sm" data-id="${company.company_id}"
                style="height: 30px; width: 30px; padding: 0;cursor:pointer;border: none;background: transparent;">
                   <img src="{{asset('assets/media/graph.png')}}" alt="Graph" style="height: 30px; width: 30px;">
               </button>
           </td>

           <td>
               <span style="font-weight: bold">${company.index_symbol}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.index_name}</span>
           </td>

           <td>
               <span style="font-weight: bold" dir="rtl">${company.company_num} <br> ${company.company_name}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.close < 0 ? 'red' : 'black'}">${company.close !== null ? Number(company.close).toFixed(2) : '00.00'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.typical_price < 0 ? 'red' : 'black'}">${company.typical_price !== null ? Number(company.typical_price).toFixed(2) : '00.00'}</span>
           </td>


           <td>
               <span style="font-weight: bold; color: ${company.stock_var_percent < 0 ? 'red' : 'black'}">${'% ' + company.stock_var_percent}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.stock_sharp_ratio < 0 ? 'red' : 'black'}">${company.stock_sharp_ratio}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.stock_beta_coefficient < 0 ? 'red' : 'black'}">${company.stock_beta_coefficient}</span>
           </td>

             <td>
               <span style="font-weight: bold; color: ${company.daily_stock_volatility < 0 ? 'red' : 'black'}">${'% ' + company.daily_stock_volatility}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.annual_stock_volatility < 0 ? 'red' : 'black'}">${'% ' + company.annual_stock_volatility}</span>
           </td>


           <td style="background-color: ${color}">
                            <span style="font-weight: bold">${company.stock_risk_rank !== null ? company.stock_risk_rank : '-'}</span>
                        </td>

            <td>
               <span style="font-weight: bold; color: ${company.minimum_daily_stock_3_years < 0 ? 'red' : 'black'}">${'% ' + company.minimum_daily_stock_3_years}</span>
           </td>

               <td>
               <span style="font-weight: bold; color: ${company.maximum_daily_stock_3_years < 0 ? 'red' : 'black'}">${'% ' + Number(company.maximum_daily_stock_3_years).toFixed(2)}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.annual_stock_expected_return < 0 ? 'red' : 'black'}">${company.annual_stock_expected_return !== null ? '% ' + company.annual_stock_expected_return : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.avg_daily_expected_stock_return < 0 ? 'red' : 'black'}">${company.avg_daily_expected_stock_return !== null ? '% ' + company.avg_daily_expected_stock_return : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.minimum_daily_stock_1_year < 0 ? 'red' : 'black'}">${company.minimum_daily_stock_1_year !== null ? '% ' + Number(company.minimum_daily_stock_1_year).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.maximum_daily_stock_1_year < 0 ? 'red' : 'black'}">${company.maximum_daily_stock_1_year !== null ? '% ' + Number(company.maximum_daily_stock_1_year).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.average_daily_expected_return_1_year < 0 ? 'red' : 'black'}">${company.average_daily_expected_return_1_year !== null ? '% ' + Number(company.average_daily_expected_return_1_year).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.week_52_high_price < 0 ? 'red' : 'black'}">${company.week_52_high_price !== null ? Number(company.week_52_high_price).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.week_52_low_price < 0 ? 'red' : 'black'}">${company.week_52_low_price !== null ? Number(company.week_52_low_price).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.pe_ratio < 0 ? 'red' : 'black'}">${company.pe_ratio !== null ? company.pe_ratio : 'N/A'}</span>
           </td>


           <td>
                <span style="font-weight: bold; color: ${company.market_to_book_ratio < 0 ? 'red' : 'black'}">${company.market_to_book_ratio !== null ? Number(company.market_to_book_ratio).toFixed(2) : 'N/A'}</span>
           </td>


           <td>
               <span style="font-weight: bold; color: ${company.return_on_equity < 0 ? 'red' : 'black'}">${company.return_on_equity !== null ? '% ' + company.return_on_equity : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.free_cash_flow_yield < 0 ? 'red' : 'black'}">${company.free_cash_flow_yield !== null ? '%' + Number(company.free_cash_flow_yield).toFixed(2) : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.leverage_ratio < 0 ? 'red' : 'black'}">${company.leverage_ratio !== null ? '%' + company.leverage_ratio : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.stock_dividend_yield < 0 ? 'red' : 'black'}">${company.stock_dividend_yield !== null ? '%' + company.stock_dividend_yield : 'N/A'}</span>
           </td>


           <td>
               <span style="font-weight: bold; color: ${company.earning_per_share < 0 ? 'red' : 'black'}">${company.earning_per_share !== null ? company.earning_per_share : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.annual_dividend_rate < 0 ? 'red' : 'black'}">${company.annual_dividend_rate !== null ? company.annual_dividend_rate : 'N/A'}</span>
           </td>

            <td>
               <span style="font-weight: bold; color: ${company.last_fiscal_year < 0 ? 'red' : 'black'}">${company.last_fiscal_year !== null ? company.last_fiscal_year : 'N/A'}</span>
           </td>

           <td>
               <span  style="font-weight: bold;width: 100%">${company.last_dividend_date !== null ? company.last_dividend_date : '-'}</span>
           </td>
       </tr>

                `);
                    });

                }
            });
        });
    $(document).ready(function () {
        getCompanies();
    });

    $('#sector').on('change', function() {
        var selectedValue = $(this).val();
       fetchStockAverages(selectedValue);
    });


</script>

<script>

    function drawCharts1(company_name,frequency) {

        const values = Object.values(frequency); // ✅ JavaScript version of array_values()
        var dataPointsArray = {
            var_t:values,

            bin_boundaries: [0.13, 0.00, 0.13, 0.13, 0.53, 0.40, 2.54, 3.07, 6.54, 12.95, 18.56, 22.43, 15.62, 6.94, 4.27, 3.07, 1.20, 0.53, 0.13, 0.27, 0.00, 0.00,
                0.00, 0.13, 0.00, 0.00, 0.00, 0.00]
        };


        var bin_boundaries = dataPointsArray.bin_boundaries;
        var chartData = dataPointsArray.var_t.map(function(value, index) {
            return { y: value * 100, label: (bin_boundaries[index] * 100).toFixed(1) + "%" }; // تحويل التسميات إلى نسبة مئوية وتقريبها لثلاثة أرقام عشرية
        });

        var options = {
            animationEnabled: true,
            title:{
                text: company_name
            },
            axisX: {
                title: "",
                labelAngle: -0, // تدوير التسميات لتجنب التداخل
                interval: 1,
                labelFontSize: 9 // تقليل حجم الخط لعرض المزيد من النقاط
            },
            axisY: {
                title: "",
                includeZero: true,
                suffix: "%", // إضافة علامة النسبة المئوية
                labelFontSize: 10 // تقليل حجم الخط لعرض المزيد من النقاط
            },
            toolTip: {
                shared: true,
                reversed: true
            },
            data: [
                {
                    type: "column",
                    color: "#7CB9E8", // تحديد لون العمود
                    dataPoints: chartData
                }
            ]
        };

        $("#chartContainer").CanvasJSChart(options);
    }

    function drawCharts2(company_name,index_name,sector_ratios) {
        const values = Object.values(sector_ratios); // ✅ JavaScript version of array_values()

        // بيانات ثابتة
        var dataPointsArray = {
            log_array1:  values,
            log_array2:  values,
        };
        // var company_name = "Static Company";
        // var index_name = "Static Index";

        // if (!dataPointsArray.log_array1 || !dataPointsArray.log_array2) {
        //     var errorMessage = document.createElement('p');
        //     errorMessage.innerText = "Data not available for the chart";
        //     document.querySelector('.grand').appendChild(errorMessage);
        //     return;
        // }

        // var chartDiv = document.createElement('div');
        // chartDiv.setAttribute('id', 'chart2Container');
        // chartDiv.style.cssText = 'height: 200px; width: 100%;';
        // document.querySelector('.grand').appendChild(chartDiv);

        var chartData1 = dataPointsArray.log_array1.map((value, index) => ({
            y: value * 100,
            label: index.toString()
        }));

        var chartData2 = dataPointsArray.log_array2.map((value, index) => ({
            y: value * 100,
            label: index.toString()
        }));

        var chartOptions = {
            title: {},
            axisX: {
                labelAngle: -45,
                interval: 10,
                labelFontSize: 10,
                labelFormatter: function () { return ""; }
            },
            axisY: {
                includeZero: true,
                suffix: "%",
                labelFontSize: 10
            },
            legend: {
                cursor: "pointer",
                verticalAlign: "bottom",
                horizontalAlign: "center",
                dockInsidePlotArea: true
            },
            data: [
                {
                    type: "line",
                    color: "#0000FF",
                    name: company_name,
                    showInLegend: true,
                    dataPoints: chartData1
                },
                {
                    type: "line",
                    color: "#FF7F50",
                    name: index_name,
                    showInLegend: true,
                    dataPoints: chartData2
                }
            ]
        };

        $("#chart2Container").CanvasJSChart(chartOptions);

    }

</script>



</html>
