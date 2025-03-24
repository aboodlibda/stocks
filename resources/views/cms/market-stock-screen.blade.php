@extends('cms.layout.master')
@section('title',trans('dashboard_trans.All portfolios'))
@section('style')

    <style>

        /*html, body {*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    font-family: Arial, sans-serif;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    align-items: center;*/
        /*}*/
        /*.table-container {*/
        /*    width: 100%;*/
        /*    height: 100%;*/
        /*    display: flex;*/
        /*    justify-content: center;*/
        /*    align-items: center;*/
        /*    padding: 20px;*/
        /*}*/
        table {
            width: 100%;
            height: 100%;
        }
    </style>

    @if(App::getLocale()=='ar')
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css">
    @else
        <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    @endif
@endsection
@section('content')
    <!--begin::Page title-->
    <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-10 pb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
        <!--begin::Heading-->
        <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">شاشة سوق الأسهم</h1>
        <!--end::Heading-->
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
            <li class="breadcrumb-item text-muted">
                <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">{{trans('dashboard_trans.Home')}}</a>
            </li>
            <li class="breadcrumb-item text-dark">شاشة سوق الأسهم</li>

        </ul>
        <!--end::Breadcrumb-->
    </div>
    <!--end::Page title=-->
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Container-->
        <div class="container-xxl" id="kt_content_container">
            <!--begin::Table-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <i class="ki-duotone ki-magnifier fs-3 position-absolute ms-4">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                    <input type="text" data-kt-ecommerce-coupons-filter="search" id="searchInput" class="form-control form-control-solid w-250px ps-12" placeholder="{{'ابحث في سوق الأسهم'}}" />
                </div>
                <!--end::Search-->
            </div>
            <table class="table table-row-dashed table dataTable "
                   id="kt_ecommerce_coupons_table">
                <thead>
                <tr>
                    <th colspan="4" class="color1">رابط اخبار و اسعار سوق التداول السعودى</th>
                    <th colspan="2" class="bg-danger text-white">average industry</th>
                    <th  class="bg-warning text-dark" id="avg_stock_var_percent"></th>
                    <th  class="bg-warning text-dark" id="avg_stock_sharp_ratio"></th>
                    <th  class="bg-warning text-dark" id="avg_stock_beta_coefficient"></th>
                    <th  class="bg-warning text-dark" id="avg_annual_stock_volatility"></th>
                    <th  class="bg-warning text-dark" id="avg_daily_stock_volatility"></th>
                    <th  class="color2"></th>
                    <th  class="bg-warning text-dark" id="avg_pe_ratio"></th>


                    <th  class="bg-warning text-dark" id="avg_return_on_equity"></th>
                    <th  class="bg-warning text-dark" id="avg_stock_dividend_yield"></th>
                    <th  class="bg-warning text-dark" id="avg_earning_per_share"></th>
                    <th  class="bg-warning text-dark" id="avg_annual_stock_expected_return"></th>
                    <th  class="bg-warning text-dark" id="avg_avg_daily_expected_stock_return"></th>

                </tr>

                <tr>
                    <th colspan="6" class="color1">اسماء الشركات فى سوق التداول السعودى</th>
                    <th colspan="6" class="color2">Risk measurement Ratios</th>
                    <th colspan="2" class="color3">Earning Ratios</th>
                    <th colspan="4" class="color4">Financial Ratios</th>
                </tr>


                <tr class="text-start text-white fw-bold fs-7 text-uppercase gs-0">
{{--                    <th scope="col" class="bg-secondary">add to portfilio</th>--}}
{{--                    <th scope="col" class="bg-secondary">view stock performance</th>--}}
{{--                    <th scope="col" class="bg-success">Symbol Code</th>--}}
{{--                    <th scope="col" class="bg-success">Company Name</th>--}}
{{--                    <th scope="col" class="bg-success">Industry Type</th>--}}
{{--                    <th scope="col" class="bg-success">Index Code</th>--}}
{{--                    <th class="bg-danger">Stock Value at Risk (VaR %)</th>--}}
{{--                    <th class="bg-danger">Stock - Sharp Risk Ratio</th>--}}
{{--                    <th class="bg-danger">Stock Beta Coefficient</th>--}}
{{--                    <th class="bg-danger">Annual Stock Volatility % (Risk Level)</th>--}}
{{--                    <th class="bg-danger">Daily Stock Volatility % (Risk Level)</th>--}}
{{--                    <th class="bg-danger">Stock Risk Rank</th>--}}
{{--                    <th class="bg-warning">P/E Ratio</th>--}}
{{--                    <th class="bg-warning">Return on Equity (ROE %)</th>--}}
{{--                    <th class="bg-info">Stock Dividend Yield</th>--}}
{{--                    <th class="bg-info">Earning Per Share</th>--}}
{{--                    <th class="bg-info">Annual Stock Expected Return (3 Years)</th>--}}
{{--                    <th class="bg-info">Avg Daily Expected Stock Return (3 Years)</th>--}}

                                        <th class="min-w-50px bg-info">Avg Daily Expected Stock Return (3 Years)</th>
                    <th class="min-w-50px bg-info">Annual Stock Expected Return (3 Years)</th>
                    <th class="min-w-50px bg-info">Earning Per Share</th>
                    <th class="min-w-50px bg-info">Stock Dividend Yield</th>
                    <th class="min-w-50px bg-warning">Return on Equity (ROE %)</th>
                    <th class="min-w-50px bg-warning">P/E Ratio</th>
                    <th class="min-w-50px bg-danger">Stock Risk Rank</th>
                    <th class="min-w-50px bg-danger">Daily Stock Volatility</th>
                    <th class="min-w-50px bg-danger">Annual Stock Volatility % (Risk Level)</th>
                    <th class="min-w-50px bg-danger">Stock Beta Coefficient</th>
                    <th class="min-w-50px bg-danger">Stock - Sharp Risk Ratio</th>
                    <th class="min-w-50px bg-danger">Stock Value at Risk (VaR %)</th>
                    <th class="min-w-50px bg-success">Index Code</th>
                    <th class="min-w-50px bg-success">Industry Type</th>
                    <th class="min-w-50px bg-success">Company Name</th>
                    <th class="min-w-50px bg-success">Symbol Code</th>
                    <th class="min-w-50px">View Stock Performance</th>
                    <th class="min-w-50px">Add to Portfolio</th>
                </tr>
                </thead>
                <tbody class="fw-semibold text-gray-600">
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>

    <script>

        var lang = $('html').attr('lang');

        const currentLanguage = document.documentElement.lang || "ar";
        const dataTableLanguage = currentLanguage === "ar"
            ? '//cdn.datatables.net/plug-ins/2.1.8/i18n/ar.json'
            : '';
        $(document).ready(function () {
            $('#kt_ecommerce_coupons_table').DataTable({
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
            var table = $('#kt_ecommerce_coupons_table').DataTable();
            table.search($(this).val()).draw();
        });
    </script>



@endsection
