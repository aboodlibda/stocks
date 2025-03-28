<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css">

    <title>Table</title>
    <style>
        body {
            font-family: Tajawal, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        .row1-merged {
            background-color: #c00202;
            color: white;
        }

        .row1-single {
            background-color: #ffbf00;
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
        }
        .gr-blue-4 {
            background-color: #b3c6e8;
        }
    </style>
</head>
<body>
<table id="stock_table datatable">

    <tr>
        <th colspan="4" class="row2-merged1">
            <a href="https://www.saudiexchange.sa/" style="color: white;text-decoration: none">رابط أخبار و أسعار سوق التداول السعودى</a>
        </th>
        <th colspan="1" class="row1-merged">Average Industry</th>
        <th class="row1-single" id="avg_stock_var_percent">عنوان</th>
        <th class="row1-single" id="avg_stock_sharp_ratio">عنوان</th>
        <th class="row1-single" id="avg_stock_beta_coefficient">عنوان</th>
        <th class="row1-single" id="avg_annual_stock_volatility">عنوان</th>
        <th class="row1-single" id="avg_daily_stock_volatility">عنوان</th>
        <th class="gr-blue-2"></th>
        <th class="row1-single" id="avg_pe_ratio">عنوان</th>
        <th class="row1-single" id="avg_return_on_equity">عنوان</th>
        <th class="row1-single" id="avg_stock_dividend_yield">عنوان</th>
        <th class="row1-single" id="avg_earning_per_share">عنوان</th>
        <th class="row1-single" id="avg_annual_stock_expected_return">عنوان</th>
        <th class="row1-single" id="avg_avg_daily_expected_stock_return">عنوان</th>
    </tr>

    <tr>
        <td colspan="5" class="row2-merged1">أسماء الشركات فى سوق التداول السعودى</td>
        <td colspan="6" class="row2-merged2">Risk measurement Ratios</td>
        <td colspan="2" class="row2-merged3">Earning Ratios</td>
        <td colspan="4" class="row2-merged4">Earning Ratios</td>
    </tr>

    <tr>
        <td class="row3-cell1 gr-blue-1">إضافة للمحفظة</td>
        <td class="row3-cell2 gr-blue-1">ملخص أداء السهم</td>
        <td class="row3-cell3 gr-blue-1">مؤشر القطاع</td>
        <td class="row3-cell4 gr-blue-1">القطاع</td>
        <td class="row3-cell5 gr-blue-1">اسم ورمز الشركة</td>

        <td class="row3-cell6 gr-blue-2">VaR % For 1 Day</td>
        <td class="row3-cell7 gr-blue-2">Sharp Ratio</td>
        <td class="row3-cell8 gr-blue-2">Beta Coefficient</td>
        <td class="row3-cell9 gr-blue-2">Daily Volatility</td>
        <td class="row3-cell10 gr-blue-2">Annual Volatility</td>
        <td class="row3-cell11 gr-blue-2">Risk Ranking</td>
        <td class="row3-cell12 gr-blue-3">Daily Expected Return</td>
        <td class="row3-cell13 gr-blue-3">Annual Expected Return</td>
        <td class="row3-cell14 gr-blue-4">P/E Ratio</td>
        <td class="row3-cell15 gr-blue-4">ROE</td>
        <td class="row3-cell16 gr-blue-4">Dividend Yield</td>
        <td class="row3-cell17 gr-blue-4">EPS</td>
    </tr>

   <tbody>

   @foreach($companies as $company)
       <tr>
           <td>
               <span><img src="{{asset('assets/media/svg/mouse-pointer-solid.svg')}}" alt="click" style="height: 30px;width: 30px"></span>
           </td>

           <td>
               <span><img src="{{asset('assets/media/svg/mouse-pointer-solid.svg')}}" alt="click" style="height: 30px;width: 30px"></span>
           </td>

           <td>
               <span style="font-weight: bold">{{$company->index_name}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{$company->index_symbol}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{$company->company_name . ' ' . $company->company_num}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{round($company->stock_var_percent, 3) . '%'}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{round($company->stock_sharp_ratio, 3)}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{round($company->stock_beta_coefficient, 2)}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{round($company->annual_stock_volatility * 100, 3) . '%'}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{round($company->daily_stock_volatility * 100, 3) . '%'}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{$company->stock_risk_rank}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{round($company->avg_daily_expected_stock_return * 100, 3) . '%'}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{round($company->annual_stock_expected_return * 100, 3) . '%'}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{(isset($company->pe_ratio) ? round($company->pe_ratio, 2) : 'N/A')}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{(isset($company->return_on_equity) ? round($company->return_on_equity, 2) . '%' : 'N/A')}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{(isset($company->stock_dividend_yield) ? round($company->stock_dividend_yield, 2) : 'N/A')}}</span>
           </td>

           <td>
               <span style="font-weight: bold">{{round($company->earning_per_share, 2)}}</span>
           </td>
       </tr>

   @endforeach
   </tbody>
</table>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>

<script>
    $(document).ready(function () {
        function fetchStockAverages() {
            $.ajax({
                url: "{{route('get-stock-averages')}}", // Adjust the URL if needed
                method: "GET",
                dataType: "json",
                success: function (response) {
                    // Assuming response contains keys matching the ID attributes in the table
                    $("#avg_stock_var_percent").text(response.avg_stock_var_percent || "N/A");
                    $("#avg_stock_sharp_ratio").text(response.avg_stock_sharp_ratio || "N/A");
                    $("#avg_stock_beta_coefficient").text(response.avg_stock_beta_coefficient || "N/A");
                    $("#avg_annual_stock_volatility").text(response.avg_annual_stock_volatility || "N/A");
                    $("#avg_daily_stock_volatility").text(response.avg_daily_stock_volatility || "N/A");
                    $("#avg_pe_ratio").text(response.avg_pe_ratio || "N/A");
                    $("#avg_return_on_equity").text(response.avg_return_on_equity || "N/A");
                    $("#avg_stock_dividend_yield").text(response.avg_stock_dividend_yield || "N/A");
                    $("#avg_earning_per_share").text(response.avg_earning_per_share || "N/A");
                    $("#avg_annual_stock_expected_return").text(response.avg_annual_stock_expected_return || "N/A");
                    $("#avg_avg_daily_expected_stock_return").text(response.avg_avg_daily_expected_stock_return || "N/A");
                },

                error: function () {
                    console.error("Failed to fetch stock averages.");
                }
            });
        }

        // Fetch data initially
        fetchStockAverages();

        // Optional: Refresh data every 60 seconds
        setInterval(fetchStockAverages, 60000);
    });
</script>

<script>

    var lang = $('html').attr('lang');

    const currentLanguage = document.documentElement.lang || "ar";
    const dataTableLanguage = currentLanguage === "ar"
        ? '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json'
        : '';
    $(document).ready(function () {
        $('#stock_table').DataTable({
            processing: true,
            serverSide: true,
            language: { url: dataTableLanguage },
            scrollX: false,
            paging: true,
            searching: true,
            responsive: false,
            ajax: '{{ route("companies.index.ajax") }}', // Adjust route name as appropriate
            columns: [
                { data: 'avg_daily_expected_stock_return', name: 'avg_daily_expected_stock_return' },
                { data: 'annual_stock_expected_return', name: 'annual_stock_expected_return' },
                { data: 'earning_per_share', name: 'earning_per_share' },
                { data: 'stock_dividend_yield', name: 'stock_dividend_yield' },
                { data: 'return_on_equity', name: 'return_on_equity' },
                { data: 'pe_ratio', name: 'pe_ratio' },
                { data: 'stock_risk_rank', name: 'stock_risk_rank' },
                { data: 'daily_stock_volatility', name: 'daily_stock_volatility' },
                { data: 'annual_stock_volatility', name: 'annual_stock_volatility' },
                { data: 'stock_beta_coefficient', name: 'stock_beta_coefficient' },
                { data: 'stock_sharp_ratio', name: 'stock_sharp_ratio' },
                { data: 'stock_var_percent', name: 'stock_var_percent' },
                { data: 'index_symbol', name: 'index_symbol' },
                { data: 'index_name', name: 'index_name' },
                { data: 'company_name', name: 'company_name' },
                { data: 'company_num', name: 'company_num' },
                { data: 'view_stock_performance', name: 'view_stock_performance', orderable: false, searchable: false },
                { data: 'add_to_portfolio', name: 'add_to_portfolio', orderable: false, searchable: false },
            ]
        });
    });



    $(document).ready(function () {
        function fetchStockAverages() {
            $.ajax({
                url: "{{route('get-stock-averages')}}", // Adjust the URL if needed
                method: "GET",
                dataType: "json",
                success: function (response) {
                    // Assuming response contains keys matching the ID attributes in the table
                    $("#avg_stock_var_percent").text(response.avg_stock_var_percent || "N/A");
                    $("#avg_stock_sharp_ratio").text(response.avg_stock_sharp_ratio || "N/A");
                    $("#avg_stock_beta_coefficient").text(response.avg_stock_beta_coefficient || "N/A");
                    $("#avg_annual_stock_volatility").text(response.avg_annual_stock_volatility || "N/A");
                    $("#avg_daily_stock_volatility").text(response.avg_daily_stock_volatility || "N/A");
                    $("#avg_pe_ratio").text(response.avg_pe_ratio || "N/A");
                    $("#avg_return_on_equity").text(response.avg_return_on_equity || "N/A");
                    $("#avg_stock_dividend_yield").text(response.avg_stock_dividend_yield || "N/A");
                    $("#avg_earning_per_share").text(response.avg_earning_per_share || "N/A");
                    $("#avg_annual_stock_expected_return").text(response.avg_annual_stock_expected_return || "N/A");
                    $("#avg_avg_daily_expected_stock_return").text(response.avg_avg_daily_expected_stock_return || "N/A");
                },

                error: function () {
                    console.error("Failed to fetch stock averages.");
                }
            });
        }

        // Fetch data initially
        fetchStockAverages();

        // Optional: Refresh data every 60 seconds
        setInterval(fetchStockAverages, 60000);
    });

    // oTable = $('#kt_ecommerce_coupons_table').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    // $('#searchInput').keyup(function(){
    //     oTable.search($(this).val()).draw() ;
    // })


    $('#searchInput').keyup(function() {
        var table = $('#stock_table').DataTable();
        table.search($(this).val()).draw();
    });
</script>


</html>
