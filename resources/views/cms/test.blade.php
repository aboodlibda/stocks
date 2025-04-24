<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
{{--    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css">--}}

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
        }
        .gr-blue-4 {
            background-color: #b3c6e8;
        }
        .gr-blue-5 {
            background-color: #9ba4b3;
        }

        .main_search_div {
            /*background: linear-gradient(25deg, #8600b3 50%, #cc33ff 50%);*/
            /*height: 100vh;*/
            display: flex;
            align-items: center;
            justify-content: center;
            padding-bottom: 20px;
        }


        h1 {
            /*position: absolute;*/
            top: 30%;

            font-size: 60px;
            color: #c00202;
        }

        .box {
            width: 500px;
            height: 20px;
            background-color: white;
            border-radius: 30px;
            display: flex;
            align-items: center;
            padding: 20px;
            border: 2px solid red;
        }

        .box>i {
            font-size: 20px;
            color: #777;
        }

        .box>input {
            flex: 1;
            height: 40px;
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
    </style>
</head>
<body>

<div class="main_search_div">
    <div class="box">
        <i class="fa-brands fa-searching"></i>
        <input type="text" name="" placeholder="البحث بإسم أو رقم الشركة" id="search-input">
{{--        <button id="search-button">بحث</button>--}}
    </div>
</div>


<table id="stock_table">

    <tr>
        <th colspan="4" class="">
{{--            <a href="https://www.saudiexchange.sa/" style="color: white;text-decoration: none">رابط أخبار و أسعار سوق التداول السعودى</a>--}}
        </th>
        <th colspan="2" class="row1-merged">Average Industry</th>
        <th class="row1-single" id="avg_stock_var_percent">0</th>
        <th class="row1-single" id="avg_stock_sharp_ratio">0</th>
        <th class="row1-single" id="avg_stock_beta_coefficient">0</th>
        <th class="row1-single" id="avg_annual_stock_volatility">0</th>
        <th class="row1-single" id="avg_daily_stock_volatility">0</th>
{{--        <th class="gr-blue-2"></th>--}}
        <th class="row1-single" id="avg_pe_ratio">0</th>
        <th class="row1-single" id="avg_return_on_equity">0</th>
        <th class="row1-single" id="avg_stock_dividend_yield">0</th>
        <th class="row1-single" id="avg_earning_per_share">0</th>
        <th class="row1-single" id="avg_annual_stock_expected_return">0</th>
        <th class="row1-single" id="avg_avg_daily_expected_stock_return">0</th>
    </tr>

    <tr>
        <td colspan="5" class="row2-mergedAll">ملخص أداء أسهم الشركات في السوق السعودى للتداول</td>
        <td colspan="2" class="row2-mergedAll">Stock Market Price</td>
        <td colspan="6" class="row2-mergedAll">Risk measurement Ratios</td>
        <td colspan="2" class="row2-mergedAll">Earning Ratios</td>
        <td colspan="5" class="row2-mergedAll">Financial Ratios</td>
    </tr>

    <tr>
        <td class="row3-cell1 gr-blue-1">إضافة للمحفظة</td>
        <td class="row3-cell2 gr-blue-1">ملخص أداء السهم</td>
        <td class="row3-cell3 gr-blue-1">مؤشر القطاع</td>
        <td class="row3-cell4 gr-blue-1">القطاع</td>
        <td class="row3-cell5 gr-blue-1">الشركة</td>


        <td class="row3-cell6 gr-blue-5">Closing Price</td>
        <td class="row3-cell7 gr-blue-5">Typical Price</td>

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
        <td class="row3-cell18 gr-blue-3">Latest Dividend Date</td>
    </tr>

   <tbody id="table-data">

{{--   @foreach($companies as $company)--}}
{{--       <tr>--}}
{{--           <td>--}}
{{--               <span><img src="{{asset('assets/media/svg/mouse-pointer-solid.svg')}}" alt="click" style="height: 30px;width: 30px"></span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span><img src="{{asset('assets/media/svg/mouse-pointer-solid.svg')}}" alt="click" style="height: 30px;width: 30px"></span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{$company->index_symbol}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{$company->index_name}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold" dir="rtl">{{$company->company_num}} <br> {{$company->company_name}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->close, 3)}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->typical_price, 3)}}</span>--}}
{{--           </td>--}}


{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->stock_var_percent, 3) . '%'}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{$company->stock_sharp_ratio}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->stock_beta_coefficient, 3)}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->annual_stock_volatility, 3) . '%'}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->daily_stock_volatility, 3) . '%'}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{$company->stock_risk_rank}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->avg_daily_expected_stock_return * 100, 3) . '%'}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->annual_stock_expected_return, 3) . '%'}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{(isset($company->pe_ratio) ? round($company->pe_ratio, 3) : 'N/A')}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{(isset($company->return_on_equity) ? round($company->return_on_equity, 3) . '%' : 'N/A')}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{(isset($company->stock_dividend_yield) ? round($company->stock_dividend_yield, 3) : 'N/A')}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{round($company->earning_per_share, 3)}}</span>--}}
{{--           </td>--}}

{{--           <td>--}}
{{--               <span style="font-weight: bold">{{$company->last_dividend_date}}</span>--}}
{{--           </td>--}}
{{--       </tr>--}}

{{--   @endforeach--}}

   </tbody>
</table>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
{{--<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>--}}

<script>

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
    function getCompanies() {
        $.ajax({
            type: 'GET',
            url: '/companies',
            dataType: 'json',
            beforeSend: function() {
                $('#table-data').append('<tr><td colspan="16" style="text-align: center;">جاري التحميل ...</td></tr>');
            },
            success: function(data) {
                $('#table-data').empty();
                $.each(data, function(index, company) {
                    $('#table-data').append(`
                          <tr>
           <td>
               <span><img src="{{asset('assets/media/svg/mouse-pointer-solid.svg')}}" alt="click" style="height: 30px;width: 30px"></span>
           </td>

           <td>
               <span><img src="{{asset('assets/media/svg/mouse-pointer-solid.svg')}}" alt="click" style="height: 30px;width: 30px"></span>
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
               <span style="font-weight: bold">${company.close}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.typical_price}</span>
           </td>


           <td>
               <span style="font-weight: bold">${company.stock_var_percent}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.stock_sharp_ratio}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.stock_beta_coefficient}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.annual_stock_volatility}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.daily_stock_volatility}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.stock_risk_rank}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.avg_daily_expected_stock_return}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.annual_stock_expected_return}</span>
           </td>

           <td>
                <span style="font-weight: bold">${company.pe_ratio !== null ? company.pe_ratio : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.return_on_equity}</span>
           </td>

           <td>
                <span style="font-weight: bold">${company.stock_dividend_yield !== null ? company.stock_dividend_yield : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.earning_per_share}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.last_dividend_date !== null ? company.last_dividend_date : '-'}</span>
           </td>
       </tr>

                `);
                });
            }
        });
    }
    // function searching() {
        $('#search-input').on('keyup', function() {
            var searchQuery = $(this).val();
            $.ajax({
                type: 'GET',
                url: '/search', // replace with your search endpoint
                data: { query: searchQuery },
                beforeSend: function() {
                    $('#table-data').append('<tr><td colspan="16" style="text-align: center;">جاري التحميل ...</td></tr>');
                },
                success: function(data) {
                    $('#table-data').empty();
                    $.each(data, function(index, company) {
                        $('#table-data').append(`
                          <tr>
           <td>
               <span><img src="{{asset('assets/media/svg/mouse-pointer-solid.svg')}}" alt="click" style="height: 30px;width: 30px"></span>
           </td>

           <td>
               <span><img src="{{asset('assets/media/svg/mouse-pointer-solid.svg')}}" alt="click" style="height: 30px;width: 30px"></span>
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
               <span style="font-weight: bold">${company.close}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.typical_price}</span>
           </td>


           <td>
               <span style="font-weight: bold">${company.stock_var_percent}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.stock_sharp_ratio}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.stock_beta_coefficient}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.annual_stock_volatility}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.daily_stock_volatility}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.stock_risk_rank}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.avg_daily_expected_stock_return}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.annual_stock_expected_return}</span>
           </td>

           <td>
                <span style="font-weight: bold">${company.pe_ratio !== null ? company.pe_ratio : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.return_on_equity}</span>
           </td>

           <td>
                <span style="font-weight: bold">${company.stock_dividend_yield !== null ? company.stock_dividend_yield : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.earning_per_share}</span>
           </td>

           <td>
               <span style="font-weight: bold">${company.last_dividend_date !== null ? company.last_dividend_date : '-'}</span>
           </td>
       </tr>

                `);
                    });
                }
            });
        });
    // }
    $(document).ready(function () {
        // searching();
        getCompanies();
        fetchStockAverages();
        // setInterval(fetchStockAverages, 60000);
    });
</script>

<script>

    // const searchButton = document.getElementById('search-button');
    // const searchInput = document.getElementById('search-input');

    // searchButton.addEventListener('click', () => {
    //     const searchTerm = searchInput.value.trim();
    //     // Add your search logic here
    //     console.log(`Searching for: ${searchTerm}`);
    // });

    {{--var lang = $('html').attr('lang');--}}

    {{--const currentLanguage = document.documentElement.lang || "ar";--}}
    {{--const dataTableLanguage = currentLanguage === "ar"--}}
    {{--    ? '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json'--}}
    {{--    : '';--}}
    {{--$(document).ready(function () {--}}
    {{--    $('#stock_table').DataTable({--}}
    {{--        "bFilter": false,--}}
    {{--        "bInfo": false,--}}
    {{--        "bAutoWidth": false,--}}
    {{--        "sDom": '<"table-responsive"t>',--}}
    {{--        "customCss": "my-custom-datatable",--}}
    {{--        processing: true,--}}
    {{--        serverSide: true,--}}
    {{--        language: { url: dataTableLanguage },--}}
    {{--        scrollX: false,--}}
    {{--        paging: true,--}}
    {{--        searching: true,--}}
    {{--        responsive: false,--}}
    {{--        ajax: '{{ route("companies.index.ajax") }}', // Adjust route name as appropriate--}}
    {{--        columns: [--}}
    {{--            { data: 'avg_daily_expected_stock_return', name: 'avg_daily_expected_stock_return' },--}}
    {{--            { data: 'annual_stock_expected_return', name: 'annual_stock_expected_return' },--}}
    {{--            { data: 'earning_per_share', name: 'earning_per_share' },--}}
    {{--            { data: 'stock_dividend_yield', name: 'stock_dividend_yield' },--}}
    {{--            { data: 'return_on_equity', name: 'return_on_equity' },--}}
    {{--            { data: 'pe_ratio', name: 'pe_ratio' },--}}
    {{--            { data: 'stock_risk_rank', name: 'stock_risk_rank' },--}}
    {{--            { data: 'daily_stock_volatility', name: 'daily_stock_volatility' },--}}
    {{--            { data: 'annual_stock_volatility', name: 'annual_stock_volatility' },--}}
    {{--            { data: 'stock_beta_coefficient', name: 'stock_beta_coefficient' },--}}
    {{--            { data: 'stock_sharp_ratio', name: 'stock_sharp_ratio' },--}}
    {{--            { data: 'stock_var_percent', name: 'stock_var_percent' },--}}
    {{--            { data: 'index_symbol', name: 'index_symbol' },--}}
    {{--            { data: 'index_name', name: 'index_name' },--}}
    {{--            { data: 'company_name', name: 'company_name' },--}}
    {{--            { data: 'company_num', name: 'company_num' },--}}
    {{--            { data: 'view_stock_performance', name: 'view_stock_performance', orderable: false, searchable: false },--}}
    {{--            { data: 'add_to_portfolio', name: 'add_to_portfolio', orderable: false, searchable: false },--}}
    {{--        ]--}}
    {{--    });--}}

    {{--});--}}



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
        // fetchStockAverages();

        // Optional: Refresh data every 60 seconds
        // setInterval(fetchStockAverages, 600000);
    });

    // oTable = $('#kt_ecommerce_coupons_table').DataTable();   //pay attention to capital D, which is mandatory to retrieve "api" datatables' object, as @Lionel said
    // $('#searchInput').keyup(function(){
    //     oTable.search($(this).val()).draw() ;
    // })


    // $('#searchInput').keyup(function() {
    //     var table = $('#stock_table').DataTable();
    //     table.search($(this).val()).draw();
    // });


</script>


</html>
