<!DOCTYPE html>
<html lang="ar" dir="rtl">

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
        <a href="{{ route('select-stock') }}" class="custom-btn btn-analysis text-center title-banner text-decoration-none">الرجوع لشاشة إختيار أسهم المحفظة</a>
        <div class="text-center">
            <a class="custom-btn btn-analysis text-center title-banner-2 text-decoration-none">تحليل أداء السهم</a>
        </div>
        <div class="d-flex align-items-end">
            <table class="header-table">
                <thead>
                <tr>
                    <th class="red-bg">Symbol Code</th>
                    <th class="red-bg">Stock Name</th>
                    <th class="red-bg">Industry Type</th>
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
                    <h4 class="text-center bg-red w-100 title-banner-2 mb-0">Stock Movement</h4>
                </div>
                <div class="d-flex content">
                    <table class="table table-bordered mb-0">
                        <tbody>

                        <tr>
                            <td class="text-center text-dark p-2">اسم المؤشر</td>
                            <td class="text-center"> <span class=" text-dark p-2">السهم</span> </td>
                            <td class="text-center"> <span class=" text-dark p-2">متوسط القطاع الصناعي</span> </td>
                        </tr>


                        <tr>
                            <td class="text-center">Market Price (Closing Price)</td>
                            <td class="text-center num-cell"> {{number_format($company->close,2)}} </td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_high_price,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center">Average Price Midpoint</td>
                            <td class="text-center num-cell"> N/A </td>
                            <td class="text-center num-cell"> N/A </td>
                        </tr>
                        <tr>
                            <td class="text-center">52 Week High</td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_high_price,2)}} </td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_high_price,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center">52 Week Low</td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_low_price,2)}} </td>
                            <td class="text-center num-cell"> {{number_format($company->week_52_low_price,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center">Maximum Stock Return over 250 Days Trading</td>
                            <td class="text-center num-cell"> N/A </td>
                            <td class="text-center num-cell"> N/A </td>
                        </tr>
                        <tr>
                            <td class="text-center">Minimum Stock Return over 250 Days Trading</td>
                            <td class="text-center num-cell"> N/A </td>
                            <td class="text-center num-cell"> N/A </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 table-container">
                <div class="d-flex align-items-center gap-2 table-caption mb-2 bg-white">
                    <h4 class="text-center bg-red w-100 title-banner-2 mb-0">Stock Risk Measurement</h4>
                </div>
                <div class="d-flex content">
                    <table class="table table-bordered mb-0">
                        <tbody>
                        <tr>
                            <td class="text-center text-dark p-2">اسم المؤشر</td>
                            <td class="text-center"> <span class=" text-dark p-2">السهم</span> </td>
                            <td class="text-center"> <span class=" text-dark p-2">متوسط القطاع الصناعي</span> </td>
                        </tr>

{{--                        <tr>--}}
{{--                            <td class="text-center">Stock Value at Risk (VaR %)</td>--}}
{{--                            <td class="text-center num-cell"> {{number_format($company->stock_var_percent,2)}} </td>--}}
{{--                            <td class="text-center num-cell" id="avg_stock_var_percent"></td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td class="text-center">Stock Value at Risk (VaR ) Expected Maximum Loss SR</td>--}}
{{--                            <td class="text-center num-cell"> N/A </td>--}}
{{--                            <td class="text-center num-cell"> N/A </td>--}}
{{--                        </tr>--}}
                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right" data-ar="معدل مخاطر السهم" data-en="Stock Risk Ratio"
                                onclick="showModal(this.getAttribute('data-ar'), this.getAttribute('data-en'))">
                                <i class="fa fa-info-circle text-primary fs-5"></i>
                                Stock - Sharp Risk Ratio
                            </td>
                            <td class="text-center num-cell"> {{number_format($company->stock_sharp_ratio,2)}} </td>
                            <td class="text-center num-cell" id="avg_stock_sharp_ratio"></td>
                        </tr>
                        <tr>
                            <td class="text-center" data-bs-toggle="tooltip" data-bs-placement="right"
                                data-ar="

                            القيمة الارشادية #9 – حساسية حركة سعر السهم تجاه السوق (معامل بيتا) -Stock Price Sensitivity to Market Movements (Beta Coefficient) :

 معامل بيتا هو مقياس لمدى تقلب (مخاطرة) السهم مقارنةً بالسوق ككل، ويقيس المخاطر النظامية، وهي المخاطر التي تؤثر على السوق بأكمله ولا يمكن التخلص منها عن طريق تنويع المحفظة الاستثمارية — فهي مُتضمَّنة في السوق بطبيعتها، مثل:

                            حالات الركود الاقتصادي
                            تغيّرات أسعار الفائدة
                            التضخم
                            عدم الاستقرار السياسي
                            الكوارث الطبيعية التي تؤثر على سلاسل الإمداد العالمية

                            معامل بيتا (Beta) هو مقياس يستخدم لتحديد حساسية حركة سعر السهم تجاه حركة السوق ككل. يوضح هذا المعامل كيف يتحرك السهم مقارنةً بتحركات السوق (عادة ما يتم استخدام مؤشر سوق تداول وفقا لقطاعات الصناعات المختلفة للأسهم المتداولة كمؤشر للسوق بشكل عام).
                            شرح معامل بيتا:
                            إذا كان بيتا = 1: السهم يتحرك بنفس درجة حركة السوق. بمعنى أنه إذا زاد السوق بنسبة 10%، فمن المتوقع أن يزيد السهم بنفس النسبة (10%).
                            إذا كان بيتا > 1: السهم أكثر تقلبًا من السوق. مثلاً، إذا كان بيتا للسهم 1.5، فهذا يعني أن السهم متوقع للتحرك بنسبة 15% في نفس الاتجاه عندما يتحرك السوق بنسبة 10%. أي أن السهم يكون أكثر خطورة (أو ربحًا) من السوق.
                            إذا كان بيتا < 1: السهم أقل تقلبًا من السوق. إذا كان بيتا للسهم 0.5، فهذا يعني أن السهم متوقع للتحرك بنسبة 5% عندما يتحرك السوق بنسبة 10%. أي أن السهم يعتبر أقل خطورة (وأيضًا قد يكون أقل ربحًا) مقارنة بالسوق.

إذا كان بيتا = 0: السهم غير مرتبط بحركة السوق. قد يكون هذا السهم مستقلًا عن تأثيرات السوق العام.
إذا كان بيتا سالبًا: السهم يتحرك في اتجاه معاكس للسوق. مثلاً، إذا كان بيتا للسهم -1، فهذا يعني أن السهم يتحرك عكس حركة السوق. إذا زاد السوق بنسبة 10%، من المتوقع أن ينخفض السهم بنسبة 10%.

كيفية استخدام معامل بيتا:
المستثمرون المحافظون قد يفضلون الأسهم ذات البيتا المنخفضة لأنها أقل تقلبًا وبالتالي أقل عرضة للخسائر الكبيرة.
المستثمرون الباحثون عن النمو قد يفضلون الأسهم ذات البيتا العالية لأن هذه الأسهم تميل إلى تقديم عوائد أعلى، لكنها تحمل أيضًا مخاطر أكبر.
مثال:
إذا كان لديك سهم مع بيتا 1.2، فإن ذلك يعني أن السهم يميل للتحرك بنسبة 12% إذا تحرك السوق بنسبة 10%. إذا كان السوق قد ارتفع بنسبة 5%، من المتوقع أن يرتفع السهم بنسبة 6.(5% × 1.2) %
معامل بيتا هو أداة هامة في تقييم مخاطر الاستثمار لأنه يساعد في مقارنة التقلبات المحتملة للسهم مع تقلبات السوق.

يستخدم المستثمرون معامل بيتا لتقييم المخاطر. تميل الأسهم ذات معامل بيتا المرتفع إلى أن تكون أكثر خطورة لكنها توفر إمكانية تحقيق عوائد أعلى؛ أما الأسهم ذات معامل بيتا المنخفض، فتكون أقل مخاطرة لكنها عادةً ما تحقق عوائد أقل.

                            "
                                data-en="
                                Guiding Value #9 – Stock Price Sensitivity to Market Movements (Beta Coefficient):

Beta is a measure of a stock's volatility (risk) compared to the overall market. It measures systematic risk, which is the risk that affects the entire market and cannot be eliminated through portfolio diversification. It is inherent to the market, such as:

Economic recessions
Changes in interest rates
Inflation
Political instability
Natural disasters that affect global supply chains

Beta is a measure used to determine the sensitivity of a stock's price movement to the overall market. It shows how a stock moves relative to the overall market (the Tadawul All-Industry Index is typically used as an indicator of the overall market).
Beta Explanation:
If Beta = 1: The stock moves at the same rate as the overall market. This means that if the market increases by 10%, the stock is expected to increase by the same rate (10%).
If beta > 1: The stock is more volatile than the market. For example, if a stock's beta is 1.5, it means the stock is expected to move 15% in the same direction when the market moves 10%. This means the stock is riskier (or more profitable) than the market.
If beta < 1: The stock is less volatile than the market. If a stock's beta is 0.5, it means the stock is expected to move 5% when the market moves 10%. This means the stock is considered less risky (and potentially less profitable) than the market.

If beta = 0: The stock is uncorrelated with market movements. This stock may be independent of the effects of the general market.
If beta is negative: The stock moves in the opposite direction to the market. For example, if a stock's beta is -1, it means the stock moves in the opposite direction of the market. If the market increases by 10%, the stock is expected to decrease by 10%.

How to Use Beta:
Conservative investors may prefer stocks with a low beta because they are less volatile and therefore less prone to large losses.
Growth-seeking investors may prefer stocks with a high beta because these stocks tend to offer higher returns, but they also carry greater risk.
Example:
If you have a stock with a beta of 1.2, it means that the stock is expected to move 12% if the market moves 10%. If the market rises 5%, the stock is expected to rise 6.(5% x 1.2)%.
Beta is an important tool in assessing investment risk because it helps compare a stock's potential volatility with that of the market.

Investors use beta to assess risk. Stocks with a high beta tend to be riskier but offer the potential for higher returns; stocks with a low beta are less risky but typically offer lower returns.
                                "
                                onclick="showModal(this.getAttribute('data-ar'), this.getAttribute('data-en'))">
                                <i class="fa fa-info-circle text-primary fs-5"></i>

                                Stock Beta Coefficient (β)(Market Sensitivity</td>
                            <td class="text-center num-cell"> {{number_format($company->stock_beta_coefficient,2)}} </td>
                            <td class="text-center num-cell" id="avg_stock_beta_coefficient"></td>
                        </tr>
                        <tr>
                            <td class="text-center">Daily Stock Volatility % (Risk Level)</td>
                            <td class="text-center num-cell"> {{number_format($company->daily_stock_volatility,2)}} </td>
                            <td class="text-center num-cell" id="avg_daily_stock_volatility"></td>
                        </tr>

                        <tr>
                            <td class="text-center">Annual Stock Volatility % (Risk Level)</td>
                            <td class="text-center num-cell"> {{number_format($company->annual_stock_volatility,2)}} </td>
                            <td class="text-center num-cell" id="avg_annual_stock_volatility"></td>
                        </tr>

                        <tr>
                            <td class="text-center">Stock Risk Ranking</td>
                            <td class="text-center num-cell"> {{$company->stock_risk_rank}} </td>
                            <td class="text-center num-cell" id="stock_rank_risk"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-3 table-container">
                <div class="d-flex align-items-center gap-2 table-caption mb-2 bg-white">
                    <h4 class="text-center bg-red w-100 title-banner-2">Stock Performance (Key Financial Ratios)</h4>
                </div>
                <div class="d-flex content">
                    <table class="table table-bordered mb-0">
                        <tbody>

                        <tr>
                            <td class="text-center text-dark p-2">اسم المؤشر</td>
                            <td class="text-center"> <span class=" text-dark p-2">السهم</span> </td>
                            <td class="text-center"> <span class=" text-dark p-2">متوسط القطاع الصناعي</span> </td>
                        </tr>


                        <tr>
                            <td class="text-center ">P/E Ratio</td>
                            <td class="text-center num-cell "> {{number_format($company->pe_ratio,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->pe_ratio,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center ">Market to Book Ratio</td>
                            <td class="text-center num-cell "> {{number_format($company->market_to_book_ratio,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->market_to_book_ratio,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center ">Free Cash Flow Yield</td>
                            <td class="text-center num-cell "> {{number_format($company->free_cash_flow_yield,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->free_cash_flow_yield,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center ">Leverage Ratio</td>
                            <td class="text-center num-cell "> {{number_format($company->leverage_ratio,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->leverage_ratio,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center ">Return on Equity</td>
                            <td class="text-center num-cell "> {{number_format($company->return_on_equity,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->return_on_equity,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center">Stock Dividend Yield</td>
                            <td class="text-center num-cell "> {{number_format($company->stock_dividend_yield,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->stock_dividend_yield,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center">Earning Per Share</td>
                            <td class="text-center num-cell "> {{number_format($company->earning_per_share,2)}} </td>
                            <td class="text-center num-cell "> {{number_format($company->earning_per_share,2)}} </td>
                        </tr>
                        <tr>
                            <td class="text-center">Annual Dividend Rate</td>
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
                        <h4 class="text-center bg-red w-100 title-banner-2">Expected Stock Return Based on Historical Data & CAPM Model</h4>
{{--                        <span class="icon-container"><i class="fa fa-user"></i></span>--}}
                    </div>
                    <div class="d-flex">
                        <table class="table table-bordered mb-0">
                            <tbody>
                            <tr>
                                <td class="text-center">Expected Annual Stock Return% (Based on CAPM Model)</td>
                                <td class="text-center num-cell"> {{number_format($company->stock_beta_coefficient,2)}} </td>
                            </tr>
                            <tr>
                                <td class="text-center">Daily Expected Stock Return % (Based on Average of  3 Years Historical Data)</td>
                                <td class="text-center num-cell"> {{number_format($company->stock_beta_coefficient,2)}} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4 class="text-center bg-red w-100 title-banner-2 mt-2">Expected Stock VaR %</h4>
                    <table class="table table-bordered mb-0">
                        <tbody>
                        <tr>
                            <td class="text-center bg-blue-2">Stock Value at Risk (VaR %)</td>
                            <td class="text-center num-cell" style="font-size: 13px"> {{number_format($company->stock_var_percent,2)}} </td>
                            <td class="text-center  bg-blue"> <span>1</span> </td>
                            <td class="text-center num-cell">
                                <button type="button" class="btn btn-primary" style="font-size: 13px" data-bs-toggle="modal" data-bs-target="#updateDaysModal">
                                    Updating No of Days
                                </button>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="updateDaysModal" tabindex="-1" aria-labelledby="updateDaysModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateDaysModalLabel">Select Number of Days</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="input-group">
                                            <span class="input-group-text">Days</span>
                                            <input type="number" class="form-control" id="daysSelect" required min="1" max="100" value="1" style="border-radius: 0;border: 1px solid #4e7bd1">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="updateDaysBtn">Update</button>
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
                <p class="bg-red p-3 mb-0 title-banner-2">Financial Statements Issuance Dates</p>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3">
                    <p class="bg-blue p-2 mb-0">اخر تاريخ لتوزيع الأرباح</p>
                    <div class="bg-blue-2 border text-dark date-box">{{$company->last_dividend_date}}</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3">
                    <p class="bg-blue p-2 mb-0">Last Updated Income Statement</p>
                    <div class="bg-blue-2 border text-dark date-box">2025-06-27</div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3">
                    <p class="bg-blue p-2 mb-0">Last Updated Balance Sheet</p>
                    <div class="bg-blue-2 border text-dark date-box">2025-06-27</div>
                </div>
            </div>
        </div>


        <div class="row mt-2 align-items-center">
            <div class="col-lg-3">
                <p class="bg-red p-2 mb-0 title-banner-2">View Chart Analysis For: </p>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3">
                    <p class="bg-blue-2 p-2 mb-0 text-dark">احتماليات توزيع عوائد الأسهم</p>
                    <button class="btn btn-primary btn-sm bg-blue-2" id="stock_probability" style="height: 40px; width: 40px; padding: 0;cursor:pointer;border: none;">
                        <img src="{{asset('assets/media/graph.png')}}" alt="Add" style="height: 40px; width: 40px;">
                    </button>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3">
                    <p class="bg-blue-2 p-2 mb-0 text-dark">Stock vs. Index Return</p>
                    <button class="btn btn-primary btn-sm bg-blue-2" id="stock_index" style="height: 40px; width: 40px; padding: 0;cursor:pointer;border: none;">
                        <img src="{{asset('assets/media/graph.png')}}" alt="Add" style="height: 40px; width: 40px;">
                    </button>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="d-flex align-items-center gap-3">
                    <p class="bg-blue-2 p-2 mb-0 text-dark">Support and Resistance Price Level</p>
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

    <div class="modal fade" id="toolTipModal" tabindex="-1" aria-labelledby="toolTipModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="max-width: 800px;width: 800px">
                <div class="modal-header justify-content-center w-100">
                    <h5 class="modal-title modal-title position-absolute start-50 translate-middle-x" id="toolTipModalLabel">Description</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <button type="button" class="btn btn-primary" onclick="showTranslation('ar')">arabic</button>
                    <button type="button" class="btn btn-primary" onclick="showTranslation('en')">english</button>
                    <div id="translationText" class="mt-3" ></div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.canvasjs.com/jquery.canvasjs.min.js"></script>

<script>
    function showModal(ar, en) {
        $('#toolTipModal').modal('show');
        window.translationData = { ar, en };
        // showTranslation('en');
    }
    $('#toolTipModal').on('hidden.bs.modal', function (e) {
        $('#translationText').text('');
    });

    function showTranslation(language) {
        const text = window.translationData[language];
        document.getElementById('translationText').innerText = text;
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
                        labelFontSize: 10
                    },
                    axisY: {
                        // title: "Number of Sales",
                        minimum: min - 2,
                        maximum: max + 2,
                        interval: 2,
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
                        name: "Support and Resistance",
                        markerType: "square",
                        // xValueFormatString: "DD MMM, YYYY",
                        color: "#4e7bd1",
                        // yValueFormatString: "#,##0K",
                        dataPoints: [
                            { label: 'Resistance Price',indexLabel: data.resistance_price.toFixed(2).toString(), y: data.resistance_price },
                            { label: 'Market Close Price',indexLabel: data.market_close_price.toFixed(2).toString(), y: data.market_close_price },
                            { label: 'Average Price Midpoint',indexLabel: data.average_price_midpoint.toFixed(2).toString(), y: data.average_price_midpoint },
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
                console.log(data.prices);
                var max = Math.max.apply(null, data.prices);
                var min = Math.min.apply(null, data.prices);
                // document.getElementById("chartDiv1").classList.remove("col-lg-12");
                // document.getElementById("chartDiv1").classList.add("col-lg-6");
                document.getElementById("lastChart").classList.remove("d-none");
                chart.html('');


                var options = {
                    animationEnabled: true,
                    theme: "light3",
                    title:{
                        text: "Stock Price Performance Over Past 30 Days",
                        fontSize: 18
                    },
                    axisX:{
                        title: "",
                        labelAngle: -90,
                        interval: 1,
                        labelFontSize: 10
                    },
                    axisY: {
                        // title: "Number of Sales",
                        minimum: min-2,
                        maximum: max+2,
                        interval: 2,
                        labelFontSize: 10
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
                            label: new Date(data.dates[index < 30 ? index : 29]).toLocaleDateString('en-GB'),
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

