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
            font-size: 13px;
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

    </style>
</head>
<body>

<!-- HTML -->
<div class="logo-container">
    <img src="{{asset('assets/media/logo.png')}}" alt="Logo" class="logo">
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


            <th class="row3-cell12 gr-blue-3" style="font-size: 10px">Minimum Daily Return Over 3 Years</th>
            <th class="row3-cell12 gr-blue-3" style="font-size: 10px">Maximum Daily Return Over 3 Years</th>
            <th class="row3-cell13 gr-blue-3">Annual Expected Return</th>


            <th class="row3-cell14 gr-blue-2">P/E Ratio</th>&nbsp;
            <th class="row3-cell15 gr-blue-2">ROE</th>
            <th class="row3-cell16 gr-blue-2">Dividend Yield</th>
            <th class="row3-cell17 gr-blue-2">
                EPS<img src="{{asset('assets/media/Saudi_Riyal_Symbol.svg')}}" alt="Saudi Exchange Logo" style="width: 30px; height: 15px;">
            </th>
        </tr>
        <tr style="position: sticky; top: 60px">
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
            <th class="row1-single orange" id="avg_annual_stock_expected_return">0</th>
            <th class="row1-single orange" id="avg_minimum_daily_stock_3_years">0</th>
            <th class="row1-single orange" id="avg_maximum_daily_stock_3_years">0</th>
            <th class="row1-single orange" id="avg_pe_ratio">0</th>
            <th class="row1-single orange" id="avg_return_on_equity">0</th>
            <th class="row1-single orange" id="avg_stock_dividend_yield">0</th>
            <th class="row1-single orange" id="avg_earning_per_share">0</th>
        </tr>

        <tr>
            <th colspan="4" style="border: none">
            </th>

            <th colspan="10" style="padding: 10px;border: none">
                <a href="https://www.saudiexchange.sa/" target="_blank" style="color: black;text-decoration: none;font-size: 12px">رابط أخبار وأسعار سوق التداول السعودي</a>
            </th>
        </tr>


        <tr style="position: sticky; top: 100px">
            <th colspan="5" class="row2-mergedAll gr-blue-3">ملخص أداء أسهم الشركات في السوق السعودى للتداول</th>
            <th colspan="2" class="row2-mergedAll gr-blue-2">Stock Market Price</th>
            <th colspan="6" class="row2-mergedAll gr-blue-3">Risk measurement Ratios</th>
            <th colspan="3" class="row2-mergedAll gr-blue-2">Stock Performance <br> Over 3 Years of Historical Data </th>
            <th colspan="5" class="row2-mergedAll gr-blue-3">Financial Ratios</th>
        </tr>

        <tr style="position: sticky; top: 140px">
            <th class="row3-cell1 gr-blue-1">إضافة للمحفظة</th>
            <th class="row3-cell2 gr-blue-1">ملخص أداء السهم</th>
            <th class="row3-cell3 gr-blue-1">مؤشر القطاع</th>
            <th class="row3-cell4 gr-blue-1">القطاع</th>
            <th class="row3-cell5 gr-blue-1">الشركة</th>


            <th class="row3-cell6 gr-blue-3">Closing Price</th>
            <th class="row3-cell7 gr-blue-3">Typical Price</th>

            <th class="row3-cell6 gr-blue-2">VaR % For 1 Day</th>
            <th class="row3-cell7 gr-blue-2">Sharp Ratio</th>
            <th class="row3-cell8 gr-blue-2">Beta Coefficient</th>
            <th class="row3-cell9 gr-blue-2">Daily Volatility</th>
            <th class="row3-cell10 gr-blue-2">Annual Volatility</th>
            <th class="row3-cell11 gr-blue-2">Risk Ranking</th>


            <th class="row3-cell12 gr-blue-3">Minimum Daily Return</th>
            <th class="row3-cell12 gr-blue-3">Maximum Daily Return</th>
            <th class="row3-cell13 gr-blue-3">Annual Expected Return</th>


            <th class="row3-cell14 gr-blue-2">P/E Ratio</th>&nbsp;
            <th class="row3-cell15 gr-blue-2">ROE</th>
            <th class="row3-cell16 gr-blue-2">Dividend Yield</th>
            <th class="row3-cell17 gr-blue-2">
                EPS<img src="{{asset('assets/media/Saudi_Riyal_Symbol.svg')}}" alt="Saudi Exchange Logo" style="width: 30px; height: 15px;">
            </th>
            <th class="row3-cell18 gr-blue-2">Latest Dividend Date</th>
        </tr>
        </thead>

        <tbody id="table-data">
        </tbody>
    </table>

</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>

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
                $("#avg_pe_ratio").text("%" + response.avg_pe_ratio || "0");
                $("#avg_return_on_equity").text("%" + response.avg_return_on_equity || "0");
                $("#avg_stock_dividend_yield").text("%" + response.avg_stock_dividend_yield || "0");
                $("#avg_earning_per_share").text("%"+ response.avg_earning_per_share || "0");
                $("#avg_annual_stock_expected_return").text("%" + response.avg_annual_stock_expected_return || "0");
                $("#stock_rank_risk").text(response.stock_risk_rank || "-");
                $("#avg_minimum_daily_stock_3_years").text("%" + response.avg_minimum_daily_stock_3_years.toFixed(2) || "0");
                $("#avg_maximum_daily_stock_3_years").text("%" + response.avg_maximum_daily_stock_3_years.toFixed(2) || "0");


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
               <span style="font-weight: bold; color: ${company.close < 0 ? 'red' : 'black'}">${company.close !== null ? company.close.toFixed(2) : '00.00'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.typical_price < 0 ? 'red' : 'black'}">${company.typical_price !== null ? company.typical_price.toFixed(2) : '00.00'}</span>
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
               <span style="font-weight: bold; color: ${company.maximum_daily_stock_3_years < 0 ? 'red' : 'black'}">${'% ' + company.maximum_daily_stock_3_years}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.annual_stock_expected_return < 0 ? 'red' : 'black'}">${company.annual_stock_expected_return !== null ? '% ' + company.annual_stock_expected_return : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.pe_ratio < 0 ? 'red' : 'black'}">${company.pe_ratio !== null ? company.pe_ratio : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.return_on_equity < 0 ? 'red' : 'black'}">${company.return_on_equity !== null ? '% ' + company.return_on_equity : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.stock_dividend_yield < 0 ? 'red' : 'black'}">${company.stock_dividend_yield !== null ? '%' + company.stock_dividend_yield : 'N/A'}</span>
           </td>


           <td>
               <span style="font-weight: bold; color: ${company.earning_per_share < 0 ? 'red' : 'black'}">${company.earning_per_share !== null ? company.earning_per_share : 'N/A'}</span>
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
               <span style="font-weight: bold; color: ${company.close < 0 ? 'red' : 'black'}">${company.close !== null ? company.close.toFixed(2) : '00.00'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.typical_price < 0 ? 'red' : 'black'}">${company.typical_price !== null ? company.typical_price.toFixed(2) : '00.00'}</span>
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
               <span style="font-weight: bold; color: ${company.maximum_daily_stock_3_years < 0 ? 'red' : 'black'}">${'% ' + company.maximum_daily_stock_3_years}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.annual_stock_expected_return < 0 ? 'red' : 'black'}">${company.annual_stock_expected_return !== null ? '% ' + company.annual_stock_expected_return : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.pe_ratio < 0 ? 'red' : 'black'}">${company.pe_ratio !== null ? company.pe_ratio : 'N/A'}</span>
           </td>

           <td>
               <span style="font-weight: bold; color: ${company.return_on_equity < 0 ? 'red' : 'black'}">${company.return_on_equity !== null ? '% ' + company.return_on_equity : 'N/A'}</span>
           </td>

           <td>
                <span style="font-weight: bold; color: ${company.stock_dividend_yield < 0 ? 'red' : 'black'}">${company.stock_dividend_yield !== null ? '%' + company.stock_dividend_yield : 'N/A'}</span>
           </td>


           <td>
               <span style="font-weight: bold; color: ${company.earning_per_share < 0 ? 'red' : 'black'}">${company.earning_per_share !== null ? company.earning_per_share : 'N/A'}</span>
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

</html>
