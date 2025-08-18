<!DOCTYPE html>
@if(App::getLocale()=='ar')
    <html dir="rtl" lang="ar">
    @else
        <html dir="ltr" lang="en">
    @endif

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تحليل سهم {{$company->company_name}} | {{$company->company_num}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/stock-preformance-style.css')}}">
    <style>

    </style>
</head>

<body>

<div id="stock-section" class="container py-3">
    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('select-stock') }}" class="custom-btn btn-analysis text-center title-banner text-decoration-none">{{ __('trans.Return to the portfolio stock selection screen') }}</a>
        <div class="text-center">
            <a class="custom-btn btn-analysis text-center title-banner-2 text-decoration-none">{{__('trans.Stock performance analysis')}}</a>
        </div>
        <div class="d-flex align-items-end">
            <table class="header-table">
                <thead>
                <div style="position: fixed; top: 10px; right: 10px; z-index: 1000;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="flag-icon flag-icon-sa"></i>
                        {{ LaravelLocalization::getCurrentLocaleNative() }}
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach(LaravelLocalization::getSupportedLocales()  as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" hreflang="{{ $localeCode }}">
                                    <i class="flag-icon flag-icon-sa"></i>
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <tr>
                    <th class="red-bg">{{__('trans.Stock Code')}}</th>
                    <th class="red-bg">{{__('trans.Stock Name')}}</th>
                    <th class="red-bg">{{__('trans.Industry Type')}}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="yellow-bg">{{$company->company_num}}</td>
                    <td class="orange-bg">{{$company->company_name}}</td>
                    <td class="orange-bg">{{$company->index_name}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <img src="{{asset('assets/media/dan logo.jpg')}}" alt="الشعار" class="logo-img">
    </div>

    <div id="stock-tables">
        <div class="row">
            <div class="col-lg-3 table-container">
                <div class="d-flex align-items-center gap-2 table-caption mb-2 bg-white">
                    <h4 class="text-center bg-red w-100 title-banner-2 mb-0">{{__('trans.Stock Movement')}}</h4>
                </div>
                <div class="d-flex content">
                    <table class="table table-bordered mb-0">
                        <tbody>

                        <tr>
                            <td class="text-center text-dark p-2">{{__('trans.Indicator name')}}</td>
                            <td class="text-center"> <span class=" text-dark p-2">{{__('trans.stock')}}</span> </td>
                            <td class="text-center"> <span class=" text-dark p-2">{{__('trans.Average industrial sector')}}</span> </td>
                        </tr>


                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="closing_price"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{ __('trans.Market Price (Closing Price)')}}</td>
                            <td class="text-center num-cell"> {{number_format($company->close,2)}} </td>
                            <td class="text-center num-cell"> {{number_format($company->close,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center">{{__('trans.Average Price Midpoint')}}</td>
                            <td class="text-center num-cell"> N/A </td>
                            <td class="text-center num-cell"> N/A </td>
                        </tr>
                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="52_week_high"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.52 Week High')}}</td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_high_price,2)}} </td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_high_price,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="52_week_low"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.52 Week Low')}}</td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_low_price,2)}} </td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_low_price,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="maximum_stock_return_over_250_days"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Maximum Stock Return over 250 Days Trading')}}</td>
                            <td class="text-center num-cell"> N/A </td>
                            <td class="text-center num-cell"> N/A </td>
                        </tr>
                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="minimum_stock_return_over_250_days"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Minimum Stock Return over 250 Days Trading')}}</td>
                            <td class="text-center num-cell"> N/A </td>
                            <td class="text-center num-cell"> N/A </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 table-container">
                <div class="d-flex align-items-center gap-2 table-caption mb-2 bg-white">
                    <h4 class="text-center bg-red w-100 title-banner-2 mb-0">{{__('trans.Stock Risk Measurement')}}</h4>
                </div>
                <div class="d-flex content">
                    <table class="table table-bordered mb-0">
                        <tbody>
                        <tr>
                            <td class="text-center text-dark p-2">{{__('trans.Indicator name')}}</td>
                            <td class="text-center"> <span class=" text-dark p-2">{{__('trans.stock')}}</span> </td>
                            <td class="text-center"> <span class=" text-dark p-2">{{__('trans.Average industrial sector')}}</span> </td>
                        </tr>

                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="sharp_risk_ratio"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Sharp Risk Ratio')}}
                            </td>
                            <td class="text-center num-cell"> {{number_format($company->stock_sharp_ratio,2)}} </td>
                            <td class="text-center num-cell" id="avg_stock_sharp_ratio"></td>
                        </tr>
                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="beta_coefficient"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Beta Coefficient')}}</td>
                            <td class="text-center num-cell"> {{number_format($company->stock_beta_coefficient,2)}} </td>
                            <td class="text-center num-cell" id="avg_stock_beta_coefficient"></td>
                        </tr>
                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="daily_stock_volatility"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Daily Stock Volatility')}}</td>
                            <td class="text-center num-cell"> {{number_format($company->daily_stock_volatility,2)}} </td>
                            <td class="text-center num-cell" id="avg_daily_stock_volatility"></td>
                        </tr>

                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="annual_stock_volatility"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Annual Stock Volatility')}}</td>
                            <td class="text-center num-cell"> {{number_format($company->annual_stock_volatility,2)}} </td>
                            <td class="text-center num-cell" id="avg_annual_stock_volatility"></td>
                        </tr>

                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="stock_risk_ranking"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Stock Risk Ranking')}}</td>
                            <td class="text-center num-cell"> {{$company->stock_risk_rank}} </td>
                            <td class="text-center num-cell" id="stock_rank_risk"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 table-container">
                <div class="d-flex align-items-center gap-2 table-caption mb-2 bg-white">
                    <h4 class="text-center bg-red w-100 title-banner-2">{{__('trans.Stock Performance (Key Financial Ratios)')}}</h4>
                </div>
                <div class="d-flex content">
                    <table class="table table-bordered mb-0">
                        <tbody>

                        <tr>
                            <td class="text-center text-dark p-2">{{__('trans.Indicator name')}}</td>
                            <td class="text-center"> <span class=" text-dark p-2">{{__('trans.stock')}}</span> </td>
                            <td class="text-center"> <span class=" text-dark p-2">{{__('trans.Average industrial sector')}}</span> </td>
                        </tr>


                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="p_e_ratio"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Price Earning Ratio')}}</td>
                            <td class="text-center num-cell "> {{number_format($company->pe_ratio,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->pe_ratio,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="market_to_book_ratio"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Market to Book Ratio')}}</td>
                            <td class="text-center num-cell "> {{number_format($company->market_to_book_ratio,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->market_to_book_ratio,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="free_cash_flow_yield"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Free Cash Flow')}}</td>
                            <td class="text-center num-cell "> {{number_format($company->free_cash_flow_yield,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->free_cash_flow_yield,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="leverage_ratio"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Leverage Ratio')}}</td>
                            <td class="text-center num-cell "> {{number_format($company->leverage_ratio,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->leverage_ratio,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="return_on_equity"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Return on Equity')}}</td>
                            <td class="text-center num-cell "> {{number_format($company->return_on_equity,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->return_on_equity,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="dividend_yield"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Dividend Yield')}}</td>
                            <td class="text-center num-cell "> {{number_format($company->stock_dividend_yield,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->stock_dividend_yield,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="earning_per_share"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Earning Per Share')}}</td>
                            <td class="text-center num-cell "> {{number_format($company->earning_per_share,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->earning_per_share,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="annual_dividend_rate"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Annual Dividend Rate')}}</td>
                            <td class="text-center num-cell "> {{number_format($company->annual_dividend_rate,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->annual_dividend_rate,2)}} </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="table-container">
                    <div class="d-flex align-items-center gap-2">
                        <h4 class="text-center bg-red w-100 title-banner-2">{{__('trans.Expected Stock Return Based on Historical Data & CAPM Model')}}</h4>
{{--                        <span class="icon-container"><i class="fa fa-user"></i></span>--}}
                    </div>
                    <div class="d-flex">
                        <table class="table table-bordered mb-0">
                            <tbody>
                            <tr>
                                <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                    data-key="expected_annual_stock_return"
                                    onclick="showTooltipFromKey(this)">
                                    <i class="fa fa-info-circle text-primary fs-5"></i>
                                    {{__('trans.Expected Annual Stock Return')}}</td>
                                <td class="text-center num-cell"> {{number_format($company->annual_stock_expected_return,2)}} </td>
                            </tr>
                            <tr>
                                <td class="text-center"data-bs-toggle="tooltip" data-bs-placement="right"
                                    data-key="daily_expected_stock_return"
                                    onclick="showTooltipFromKey(this)">
                                    <i class="fa fa-info-circle text-primary fs-5"></i>
                                    {{__('trans.Daily Expected Stock Return')}}</td>
                                <td class="text-center num-cell"> {{number_format($company->avg_daily_expected_stock_return,2)}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4 class="text-center bg-red w-100 title-banner-2 mt-2">{{__('trans.Expected Stock VaR')}}</h4>
                    <table class="table table-bordered mb-0">
                        <tbody>
                        <tr>
                            <td class="text-center bg-blue-2" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-key="value_at_risk"
                                onclick="showTooltipFromKey(this)">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                {{__('trans.Stock Value at Risk')}}</td>
                            <td class="text-center num-cell" style="font-size: 13px"> {{number_format($company->stock_var_percent,2)}} </td>
                            <td class="text-center bg-blue"> <span>{{$company->stock_var_days}}</span> </td>
                            <td class="text-center num-cell">
                                <button type="button" class="btn btn-primary" style="font-size: 13px" data-bs-toggle="modal" data-bs-target="#updateDaysModal">
                                    {{__('trans.updating number of days')}}
                                </button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="updateDaysModal" tabindex="-1" aria-labelledby="updateDaysModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateDaysModalLabel">{{__('trans.select Number of Days')}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group">
                                            <span class="input-group-text">{{__('trans.Day')}}</span>
                                            <input type="number" class="form-control" id="daysSelect" required min="1" max="100" value="{{$company->stock_var_days}}" style="border-radius: 0;border: 1px solid #4e7bd1">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('trans.close')}}</button>
                                        <button type="button" class="btn btn-primary" id="updateDaysBtn">{{__('trans.update')}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row mt-2 align-items-center">
            <div class="col-lg-3">
                <p class="bg-red p-3 mb-0 title-banner-2">{{__('trans.Financial Statements Issuance Dates')}}</p>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3"
                     data-bs-toggle="tooltip"
                     data-bs-placement="right"
                     data-key="last_date_for_dividend_distribution"
                     onclick="showTooltipFromKey(this)"
                     style="cursor:pointer"> <!-- optional to show pointer -->
                    <i class="fa fa-info-circle text-primary fs-5"></i>
                    <p class="bg-blue p-2 mb-0" style="font-size: 12px">{{__('trans.Last date for dividend distribution')}}</p>
                    <div class="bg-blue-2 border text-dark date-box">{{$company->last_dividend_date}}</div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3"
                     data-bs-toggle="tooltip"
                     data-bs-placement="right"
                     data-key="last_updated_income_statement"
                     onclick="showTooltipFromKey(this)"
                     style="cursor:pointer"> <!-- optional to show pointer -->
                    <i class="fa fa-info-circle text-primary fs-5"></i>
                    <p class="bg-blue p-2 mb-0" style="font-size: 12px">{{__('trans.Last Updated Income Statement')}}</p>
                    <div class="bg-blue-2 border text-dark date-box">2025-06-27</div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3"
                     data-bs-toggle="tooltip"
                     data-bs-placement="right"
                     data-key="last_updated_balance_sheet"
                     onclick="showTooltipFromKey(this)"
                     style="cursor:pointer"> <!-- optional to show pointer -->
                    <i class="fa fa-info-circle text-primary fs-5"></i>
                    <p class="bg-blue p-2 mb-0" style="font-size: 12px">{{__('trans.Last Updated Balance Sheet')}}</p>
                    <div class="bg-blue-2 border text-dark date-box">2025-06-27</div>
                </div>
            </div>


        </div>


        <div class="row mt-2 align-items-center">
            <div class="col-lg-3">
                <p class="bg-red p-2 mb-0 title-banner-2">{{__('trans.View Chart Analysis For:')}}</p>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3"
                     data-bs-toggle="tooltip"
                     data-bs-placement="right"
                     data-key="stock_dividend_distribution_possibilities_chart"
                     onclick="showTooltipFromKey(this)"
                     style="cursor:pointer">
                    <i class="fa fa-info-circle text-primary fs-5"></i>
                    <p class="bg-blue-2 p-2 mb-0 text-dark" >{{__('trans.Stock dividend distribution possibilities')}}</p>
                    <button class="btn btn-primary btn-sm bg-blue-2" id="stock_probability" style="height: 40px; width: 40px; padding: 0;cursor:pointer;border: none;">
                        <img src="{{asset('assets/media/graph.png')}}" alt="Add" style="height: 40px; width: 40px;">
                    </button>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3"
                     data-bs-toggle="tooltip"
                     data-bs-placement="right"
                     data-key="last_stock_vs_index_return_chart"
                     onclick="showTooltipFromKey(this)"
                     style="cursor:pointer">
                    <i class="fa fa-info-circle text-primary fs-5"></i>
                    <p class="bg-blue-2 p-2 mb-0 text-dark">{{__('trans.Stock vs. Index Return')}}</p>
                    <button class="btn btn-primary btn-sm bg-blue-2" id="stock_index" style="height: 40px; width: 40px; padding: 0;cursor:pointer;border: none;">
                        <img src="{{asset('assets/media/graph.png')}}" alt="Add" style="height: 40px; width: 40px;">
                    </button>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3"
                     data-bs-toggle="tooltip"
                     data-bs-placement="right"
                     data-key="support_and_resistance_price_level_chart"
                     onclick="showTooltipFromKey(this)"
                     style="cursor:pointer">
                    <i class="fa fa-info-circle text-primary fs-5"></i>
                    <p class="bg-blue-2 p-2 mb-0 text-dark">{{__('trans.Support and Resistance Price Level')}}</p>
                    <button class="btn btn-primary btn-sm bg-blue-2" id="support_and_resistance" style="height: 40px; width: 40px; padding: 0;cursor:pointer;border: none;">
                        <img src="{{asset('assets/media/graph.png')}}" alt="Add" style="height: 40px; width: 40px;">
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
            <div  id="chartDiv1" class="col-lg-12">
                <div id="chart">
                </div>
            </div>

            <div  id="chartDiv2" class="col-lg-6">
                <div id="lastChart" class="d-none">
                </div>
            </div>
        </div>

    <div class="modal fade bd-example-modal-lg" id="toolTipModal" tabindex="-1" aria-labelledby="toolTipModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" style="width: auto; height: auto;">
            <div class="modal-content" style="width: auto; height: auto;">
                <div class="modal-header ">
                    <h5 class="modal-title modal-title position-absolute start-50 translate-middle-x" id="toolTipModalLabel">Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <button type="button" class="btn btn-primary" onclick="showTranslation('ar')">arabic</button>
                    <button type="button" class="btn btn-primary" onclick="showTranslation('en')">english</button>
                    <div id="translationText" class="mt-3" style="width: auto;"></div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>
<script src="{{asset('assets/js/tooltip-content.js')}}"></script>



<script>
    var modal = $('#toolTipModal');

    function showModal(ar, en) {
        modal.modal('show');
        window.translationData = { ar, en };
        showTranslation("ar");
    }

    modal.on('hidden.bs.modal', function (e) {
        $('#translationText').html(''); // clear as HTML
    });

    function showTranslation(language) {
        const text = window.translationData[language];

        // Use innerHTML to render TinyMCE HTML
        document.getElementById('translationText').innerHTML = text;
    }

    function showTooltipFromKey(element) {
        const key = element.getAttribute('data-key');
        $.ajax({
            url: "{{route('get-tooltip-content')}}", // Adjust the URL if needed
            method: "GET",
            dataType: "json",
            data: { key: key },
            success: function (response) {
                showModal(response.ar, response.en); // Your existing modal function
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

</script>


<script>

    document.addEventListener('DOMContentLoaded', function() {
        drawCharts1({{$company->company_id}});
        fetchStockAverages(@json($company->index_symbol));
    });

    function fetchStockAverages(value) {
        var risk_rank = $("#stock_rank_risk");
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
                risk_rank.text(response.stock_risk_rank || "-");

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
                    risk_rank.css("background-color", "lightgreen");
                } else if (riskRank === "Moderately Conservative") {
                    risk_rank.css("background-color", "yellow");
                } else if (riskRank === "Aggressive") {
                    risk_rank.css("background-color", "orange");
                } else if (riskRank === "Very Aggressive") {
                    risk_rank.css("background-color", "red");
                } else {
                    risk_rank.css("background-color", "gray");
                }
            },

            error: function () {
                console.error("Failed to fetch stock averages.");
            }
        });
    }

    $(document).ready(function() {

        $("#stock_probability").on('click', function (){
            drawCharts1({{$company->company_id}})
            })

        $("#stock_index").on('click', function (){
            drawCharts2({{$company->company_id}})
        })

        $("#support_and_resistance").on('click', function (){
            drawCharts3({{$company->company_num}})
            drawCharts4({{$company->company_num}})
        })


        });


    function drawCharts1(company_id) {

        var chart = $("#chart");

        chart.html();

        $.ajax({
            type: 'GET',
            url: '/stock-performance',
            dataType: 'json',
            data: {
                {{--"_token": "{{ csrf_token() }}",--}}
                id: company_id
            },
            beforeSend: function() {
                // Show loading spinner
                chart.html('<div class="text-center"><div class="spinner-border" role="status"></div><div class="mt-3">Loading...</div></div>');
            },
            success: function(data) {
                // Remove loading spinner and show data
                document.getElementById("chartDiv1").classList.remove("col-lg-6");
                document.getElementById("chartDiv1").classList.add("col-lg-12");
                document.getElementById("lastChart").classList.add("d-none");


                chart.html('');

                const values = Object.values(data.frequency);
                const binBoundary = Object.values(data.binBoundary);
                var dataPointsArray = {
                    var_t: values,
                    bin_boundaries: binBoundary
                };

                var bin_boundaries = dataPointsArray.bin_boundaries;
                var chartData = dataPointsArray.var_t.map(function(value, index) {
                    return { y: value * 0.1 , label: (parseFloat(bin_boundaries[index]) ? bin_boundaries[index].toFixed(2)  : 0) + "%" };
                });

                var options = {
                    animationEnabled: true,
                    title: {
                        text: data.company.company_name
                    },
                    axisX: {
                        title: "",
                        labelAngle: -0,
                        interval: 1,
                        labelFontSize: 9
                    },
                    axisY: {
                        title: "",
                        includeZero: true,
                        suffix: "%",
                        labelFontSize: 10
                    },
                    toolTip: {
                        shared: true,
                        reversed: true
                    },
                    data: [
                        {
                            type: "column",
                            color: "#7CB9E8",
                            dataPoints: chartData
                        }
                    ]
                };

                chart.CanvasJSChart(options);

            },
        });


    }

    function drawCharts2(company_id) {

        var chart = $("#chart");

        chart.html();

        $.ajax({
            type: 'GET',
            url: '/stock-performance',
            dataType: 'json',
            data: {
                {{--"_token": "{{ csrf_token() }}",--}}
                id: company_id
            },
            beforeSend: function() {
                chart.html('<div class="text-center"><div class="spinner-border" role="status"></div><div class="mt-3">Loading...</div></div>');
            },
            success: function(data) {
                // Remove loading spinner and show data
                document.getElementById("chartDiv1").classList.remove("col-lg-6");
                document.getElementById("chartDiv1").classList.add("col-lg-12");
                document.getElementById("lastChart").classList.add("d-none");


                chart.html('');

                // بيانات ثابتة
                var dataPointsArray = {
                    log_array1:  data.company_ratios,
                    log_array2:  data.sector_ratios,
                };

                var chartData1 = dataPointsArray.log_array1.map((value, index) => ({
                    y: value ,
                    label: index.toString()
                }));

                var chartData2 = dataPointsArray.log_array2.map((value, index) => ({
                    y: value ,
                    label: index.toString()
                }));

                var chartOptions = {
                    title:{
                        text: "Stock vs. Index Chart - Daily Return Based on Last 6 Months Historical Data",
                        fontSize: 18
                    },
                    axisX: {
                        labelAngle: -45,
                        // interval: 10,
                        labelFontSize: 10,
                        labelFormatter: function () { return ""; }
                    },
                    axisY: {
                        includeZero: true,
                        suffix: "%",
                        // interval: 2,
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
                            type: "column",
                            color: "#0000FF",
                            name: data.company.company_name,
                            showInLegend: true,
                            dataPoints: chartData1
                        },
                        {
                            type: "column",
                            color: "#FF7F50",
                            name: data.company.index_name,
                            showInLegend: true,
                            dataPoints: chartData2
                        }
                    ]
                };

                chart.CanvasJSChart(chartOptions);

            }
        });


    }

    function drawCharts3(company_num) {

        var chart = $("#chart");
        chart.html();

        $.ajax({
            type: 'GET',
            url: '/resistance-support',
            dataType: 'json',
            data: {
                id: company_num
            },
            beforeSend: function() {
                chart.html('<div class="text-center"><div class="spinner-border" role="status"></div><div class="mt-3">Loading...</div></div>');
            },
            success: function(data) {
var values = [
    data.support_price,
    data.average_price_midpoint,
    data.market_close_price,
    data.resistance_price
];

var max = Math.max.apply(null, values);
var min = Math.min.apply(null, values);
                console.log(max)

                document.getElementById("chartDiv1").classList.remove("col-lg-12");
                document.getElementById("chartDiv1").classList.add("col-lg-6");
                chart.html('');


                var options = {
                    animationEnabled: true,
                    theme: "light3",
                    title:{
                        text: "Chart Analysis of Support and Resistance Price Level - Over Past 30 Days",
                        fontSize: 18
                    },
                    axisX:{
                        title: "",
                        labelAngle: -0,
                        interval: 1,
                        labelFontSize: 15,
                        labelFontStyle: "bold"
                    },
                    axisY: {
                        // title: "Number of Sales",
                        minimum: min - data.binRange,
                        maximum: max + data.binRange,
                        interval: data.binRange,
                        labelFontSize: 15,
                        labelFontStyle: "bold"
                    },
                    toolTip:{
                        shared:true
                    },
                    legend:{
                        cursor:"pointer",
                        verticalAlign: "bottom",
                        horizontalAlign: "left",
                        dockInsidePlotArea: true,
                    },
                    data: [{
                        type: "line",
                        showInLegend: true,
                        name: "",
                        markerType: "square",
                        // xValueFormatString: "DD MMM, YYYY",
                        color: "#4e7bd1",
                        // yValueFormatString: "#,##0K",
                        dataPoints: [
                            { label: 'Resistance Price',indexLabel: data.resistance_price.toFixed(2).toString(), y: data.resistance_price },
                            { label: 'Market Close Price',indexLabel: data.market_close_price.toFixed(2).toString(), y: data.market_close_price },
                            { label: 'Price Midpoint',indexLabel: data.average_price_midpoint.toFixed(2).toString(), y: data.average_price_midpoint },
                            { label: 'Support Price',indexLabel: data.support_price.toFixed(2).toString(), y: data.support_price },
                        ]

                    }]
                };
                chart.CanvasJSChart(options);



                // const chartData = [
                //     { label: "Support Price", value: data.support_price.toFixed(2) },
                //     { label: "Average Price Midpoint", value: data.average_price_midpoint.toFixed(2) },
                //     { label: "Market Close Price", value: data.market_close_price.toFixed(2) },
                //     { label: "Resistance Price", value: data.resistance_price.toFixed(2) }
                // ];
                //
                // const maxValue = 100; // maximum value for scaling
                // const chart1 = document.getElementById('chart');
                //
                // const heading = document.createElement('h6');
                // heading.textContent = "Chart Analysis of Support and Resistance Price Level - Over Past 30 Days";
                // heading.className = 'text-center pb-3';
                // chart1.appendChild(heading);
                //
                //
                // chartData.forEach(item => {
                //     const wrapper = document.createElement('div');
                //     wrapper.className = 'bar-wrapper';
                //
                //     const label = document.createElement('div');
                //     label.className = 'label-text';
                //     label.textContent = item.label;
                //
                //     const barContainer = document.createElement('div');
                //     barContainer.className = 'bar-container';
                //
                //     const bar = document.createElement('div');
                //     bar.className = 'bar';
                //     const widthPercent = (item.value / maxValue) * 100;
                //     bar.style.width = `${widthPercent}%`;
                //     bar.textContent = item.value;
                //
                //     barContainer.appendChild(bar);
                //     wrapper.appendChild(label);
                //     wrapper.appendChild(barContainer);
                //     chart1.appendChild(wrapper);
                // });
            }
        });


    }

    function drawCharts4(company_num) {

        var chart = $("#lastChart");
        chart.html();

        $.ajax({
            type: 'GET',
            url: '/get-close-prices',
            dataType: 'json',
            data: {
                ticker: company_num
            },
            beforeSend: function() {
                chart.html('<div class="text-center"><div class="spinner-border" role="status"></div><div class="mt-3">Loading...</div></div>');
            },
            success: function(data) {
                var max = Math.max.apply(null, data.prices);
                var min = Math.min.apply(null, data.prices);
                console.log("min : " . min)

                // document.getElementById("chartDiv1").classList.remove("col-lg-12");
                // document.getElementById("chartDiv1").classList.add("col-lg-6");
                document.getElementById("lastChart").classList.remove("d-none");
                chart.html('');


                var options = {
                    animationEnabled: true,
                    theme: "light3",
                    title:{
                        text: "Stock Price (Closing Price) Performance Over Past 30 Days",
                        fontSize: 18
                    },
                    axisX:{
                        title: "",
                        labelAngle: -60,
                        interval: 1,
                        labelFontSize: 15,
                        labelFontStyle: "bold",

                    },
                    axisY: {
                        // title: "Number of Sales",
                        minimum: min - data.binRange,
                        maximum: max + data.binRange,
                        interval: data.binRange,
                        labelFontSize: 15,
                        labelFontStyle: "bold",
                        // valueFormatString: "DD MMM"
                    },
                    toolTip:{
                        shared:true
                    },
                    legend:{
                        cursor:"pointer",
                        verticalAlign: "bottom",
                        horizontalAlign: "left",
                        dockInsidePlotArea: true,
                    },
                    data: [{
                        type: "line",
                        showInLegend: true,
                        name: "",
                        markerType: "none",
                        xValueFormatString: "DD MMM, YYYY",
                        color: "#4e7bd1",
                        // yValueFormatString: "#,##0K",
                        dataPoints: data.prices.map((price, index) => ({
                            label: new Date(data.dates[index < 30 ? index : 29]).toLocaleDateString('en-GB', { day: '2-digit', month: 'short' }),
                            y: parseFloat(price)
                        }))

                    }]
                };
                chart.CanvasJSChart(options);



                // const chartData = [
                //     { label: "Support Price", value: data.support_price.toFixed(2) },
                //     { label: "Average Price Midpoint", value: data.average_price_midpoint.toFixed(2) },
                //     { label: "Market Close Price", value: data.market_close_price.toFixed(2) },
                //     { label: "Resistance Price", value: data.resistance_price.toFixed(2) }
                // ];
                //
                // const maxValue = 100; // maximum value for scaling
                // const chart1 = document.getElementById('chart');
                //
                // const heading = document.createElement('h6');
                // heading.textContent = "Chart Analysis of Support and Resistance Price Level - Over Past 30 Days";
                // heading.className = 'text-center pb-3';
                // chart1.appendChild(heading);
                //
                //
                // chartData.forEach(item => {
                //     const wrapper = document.createElement('div');
                //     wrapper.className = 'bar-wrapper';
                //
                //     const label = document.createElement('div');
                //     label.className = 'label-text';
                //     label.textContent = item.label;
                //
                //     const barContainer = document.createElement('div');
                //     barContainer.className = 'bar-container';
                //
                //     const bar = document.createElement('div');
                //     bar.className = 'bar';
                //     const widthPercent = (item.value / maxValue) * 100;
                //     bar.style.width = `${widthPercent}%`;
                //     bar.textContent = item.value;
                //
                //     barContainer.appendChild(bar);
                //     wrapper.appendChild(label);
                //     wrapper.appendChild(barContainer);
                //     chart1.appendChild(wrapper);
                // });
            }
        });


    }


</script>


<script>
    $("#updateDaysBtn").click(function(e){
        e.preventDefault();
        var days = $("#daysSelect").val();
        if(days === ""){
            alert("Please select number of days");
            return;
        }
        $.ajax({
            url: "{{route('update-stock-var')}}",
            type: "GET",
            dataType: 'json',
            data: {
                days: days,
                company_id: '{{$company->company_id}}'
            },
            beforeSend: function() {
                // Show loading spinner
                $("#updateDaysModal").append(`
                                                        <div class="position-absolute fixed-top fixed-bottom fixed-right fixed-left d-flex justify-content-center align-items-center" style="background-color: rgba(0,0,0,0.5); z-index: 10;color: white;">
                                                        <div class="text-center">
                                                        <div class="spinner-border" role="status"></div>
                                                        <div class="mt-3 text-white">Loading...</div></div>
                                                        </div>

                                                    `);
            },
            success: function(response) {
                if(response.success){
                    location.reload();
                }else{
                    alert(response.message);
                }
                $(".position-fixed").remove();
            }
        });
    });
</script>


</html>

