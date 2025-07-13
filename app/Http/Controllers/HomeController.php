<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Sector;
use App\Models\Stock;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\Normal;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('cms.dashboard');
    }


    public function marketStockScreen()
    {
        return view('cms.market-stock-screen');
    }

    public function ajaxIndex()
    {
        $companies = Company::all(); // Fetch data from the database

        return DataTables::of($companies)
            ->addColumn('view_stock_performance', function ($row) {
                return '<button class="btn btn-info"><i class="fa fa-eye"></i></button>';
            })
            ->addColumn('add_to_portfolio', function ($row) {
                return '<button class="btn btn-success"><i class="fa fa-user-plus"></i></button>';
            })
            ->editColumn('avg_daily_expected_stock_return', function ($row) {
                $value = round($row->avg_daily_expected_stock_return * 100, 3);
                $badgeClass = $value > 0 ? 'badge-light-success' : 'badge-light-danger';
                return '<span class="fw-bold ms-3 badge badge-lg ' . $badgeClass . '">' . $value . '%</span>';
            })
            ->editColumn('annual_stock_expected_return', function ($row) {
                $value = round($row->annual_stock_expected_return * 100, 2);
                $badgeClass = $value > 0 ? 'badge-light-success' : 'badge-light-danger';
                return '<span class="fw-bold ms-3 badge badge-lg ' . $badgeClass . '">' . $value . '%</span>';
            })
            ->editColumn('earning_per_share', function ($row) {
                $value = round($row->earning_per_share, 2);
                $badgeClass = $value > 0 ? 'badge-light-success' : 'badge-light-danger';
                return '<span class="fw-bold ms-3 badge badge-lg ' . $badgeClass . '">' . $value . '</span>';
            })
            ->editColumn('stock_dividend_yield', function ($row) {
                $value = isset($row->stock_dividend_yield) ? round($row->stock_dividend_yield, 2) : null;
                if ($value !== null) {
                    $badgeClass = $value > 0 ? 'badge-light-success' : 'badge-light-danger';
                    return '<span class="fw-bold ms-3 badge badge-lg ' . $badgeClass . '">' . $value . '</span>';
                }
                return 'N/A'; // If value is not set, return N/A
            })
            // Add similar conditions for other numeric columns
            ->rawColumns([
                'view_stock_performance',
                'add_to_portfolio',
                'avg_daily_expected_stock_return',
                'annual_stock_expected_return',
                'earning_per_share',
                'stock_dividend_yield'
            ])
            ->make(true);    }



    public function getStockAverages(Request $request)
    {
        $averages = Company::query()
            ->where('index_symbol', '=', $request->sector_code)
            ->selectRaw("
        AVG(stock_var_percent) AS avg_stock_var_percent,
        AVG(stock_sharp_ratio) AS avg_stock_sharp_ratio,
        AVG(stock_beta_coefficient) AS avg_stock_beta_coefficient,
        AVG(annual_stock_volatility) AS avg_annual_stock_volatility,
        AVG(daily_stock_volatility) AS avg_daily_stock_volatility,

        AVG(minimum_daily_stock_3_years) AS avg_minimum_daily_stock_3_years,
        AVG(maximum_daily_stock_3_years) AS avg_maximum_daily_stock_3_years,
        AVG(annual_stock_expected_return) AS avg_annual_stock_expected_return,

        AVG(avg_daily_expected_stock_return) AS avg_daily_expected_stock_return,
        AVG(minimum_daily_stock_1_year) AS avg_minimum_daily_stock_1_year,
        AVG(maximum_daily_stock_1_year) AS avg_maximum_daily_stock_1_year,
        AVG(average_daily_expected_return_1_year) AS avg_average_daily_expected_return_1_year,

        AVG(pe_ratio) AS avg_pe_ratio,
        AVG(market_to_book_ratio) AS avg_market_to_book_ratio,
        AVG(return_on_equity) AS avg_return_on_equity,
        AVG(free_cash_flow_yield) AS avg_free_cash_flow_yield,
        AVG(leverage_ratio) AS avg_leverage_ratio,
        AVG(stock_dividend_yield) AS avg_stock_dividend_yield,
        AVG(earning_per_share) AS avg_earning_per_share,
        AVG(annual_dividend_rate) AS avg_annual_dividend_rate
    ")
            ->get();

//        dd($averages);
        if (!$averages) {
            return response()->json(['message' => 'لا توجد بيانات متاحة لحساب المتوسط.'], 404);
        }

        $averages = collect($averages)->map(function ($value) {
            if ($value->avg_annual_stock_volatility <= 0.10) {
                $stockRiskRank = "Conservative";
            } elseif ($value->avg_annual_stock_volatility <= 0.20) {
                $stockRiskRank = "Moderately Conservative";
            } elseif ($value->avg_annual_stock_volatility <= 0.30) {
                $stockRiskRank = "Aggressive";
            } else {
                $stockRiskRank = "Very Aggressive";
            }

            return [
                'avg_stock_var_percent' => round($value->avg_stock_var_percent, 2),
                'avg_stock_sharp_ratio' => round($value->avg_stock_sharp_ratio, 2),
                'avg_stock_beta_coefficient' => round($value->avg_stock_beta_coefficient, 2),
                'avg_annual_stock_volatility' => round($value->avg_annual_stock_volatility, 2),
                'avg_daily_stock_volatility' => round($value->avg_daily_stock_volatility, 2),
                'stock_risk_rank' => $stockRiskRank,

                'avg_minimum_daily_stock_3_years' => round($value->avg_minimum_daily_stock_3_years,2),
                'avg_maximum_daily_stock_3_years' => round($value->avg_maximum_daily_stock_3_years,2),
                'avg_annual_stock_expected_return' => round($value->avg_annual_stock_expected_return, 2),
                'avg_daily_expected_stock_return' => round($value->avg_daily_expected_stock_return,2),

                'avg_minimum_daily_stock_1_year' => round($value->avg_minimum_daily_stock_1_year,2),
                'avg_maximum_daily_stock_1_year' => round($value->avg_maximum_daily_stock_1_year,2),
                'avg_average_daily_expected_return_1_year' => round($value->avg_average_daily_expected_return_1_year,2),

                'avg_pe_ratio' => round($value->avg_pe_ratio, 2),
                'avg_market_to_book_ratio' => round($value->avg_market_to_book_ratio, 2),
                'avg_return_on_equity' => round($value->avg_return_on_equity, 2),
                'avg_free_cash_flow_yield' => round($value->avg_free_cash_flow_yield, 2),
                'avg_leverage_ratio' => round($value->avg_leverage_ratio, 2),
                'avg_stock_dividend_yield' => round($value->avg_stock_dividend_yield, 2),
                'avg_earning_per_share' => round($value->avg_earning_per_share, 2),
                'avg_annual_dividend_rate' => round($value->avg_annual_dividend_rate, 2),

            ];
        });
        return response()->json($averages[0]);
    }


    public function getCompanies()
    {
        $companies = Company::all();
        return response()->json($companies);

    }

    public function stockPerformance(Request $request)
    {
        $company = Company::query()->findOrFail($request->id);
        $company_ratios = calculateRatiosByCompany($company->company_num);
        $sector_ratios = calculateRatiosBySector($company->index_symbol);

        $sector_ratios = array_slice($sector_ratios, 0,count($company_ratios));

        $binBoundary = binBoundary($company->company_num);
        $frequency = frequency($company_ratios,$binBoundary);
        return response()->json([
            'company' => $company,
            'frequency' => $frequency,
            'company_ratios' => $company_ratios,
            'sector_ratios' => $sector_ratios,
        ]);
    }

    public function selectStock()
    {
        $lastStockDate = Stock::query()->orderBy('updated_at', 'desc')->first(['updated_at']);
        $lastSectorDate = Sector::query()->orderBy('updated_at', 'desc')->first(['updated_at']);
        return view('cms.select_stock', compact('lastStockDate','lastSectorDate'));
    }

    public function stockAnalysis(Request $request)
    {
        return response()->json([
            'status' => 'success',
            'redirect_url' => route('stock-analysis-screen', ['company_id' => $request->company_id, 'message' => 'done']) // /dashboard?user=5&message=done
        ]);

    }

    public function stockAnalysisScreen(Request $request)
    {
        $company_id = $request->query('company_id');
        $company = Company::query()->where('company_id','=',$company_id)->first();
        return view('cms.test_stock', compact('company'));
    }

// SearchController.php

    public function search(Request $request)
    {

        $query = $request->input('query');
        // Perform the search logic here
        // For example, query the database
        $results = Company::query()
            ->where('company_name', 'LIKE', '%' . $query . '%')
            ->orWhere('company_num', 'LIKE', '%' . $query . '%')
            ->orWhere('index_name', 'LIKE', '%' . $query . '%')
            ->orWhere('index_symbol', 'LIKE', '%' . $query . '%')
            ->get();

        // Return the search results as JSON
        return response()->json($results);
    }

    public function getResistanceAndSupport(Request $request)
    {
        return response()->json(resistanceSupport($request->id));
    }

    public function getClosePrices(Request $request)
    {
        $ticker = $request->query('ticker');
        $prices = Stock::where('ticker', $ticker)
            ->orderBy('date', 'desc')
            ->limit(30)
            ->get(['adjclose'])
            ->pluck('adjclose')
            ->toArray();

        return response()->json([
            'prices' => $prices
        ]);
    }

    public function updateStockVar(Request $request)
    {
        $company = Company::query()->where('company_id','=',$request->company_id)->first();
        $ticker = $company->company_num;
        $companyRatios = calculateRatiosByCompany($ticker);
//        0.95 is the Confidence Level
        $stockVar = Normal::inverse((1 - 0.95), calculateAverage($companyRatios), stdDeviation($companyRatios)) * sqrt($request->days);
        $company->stock_var_percent = round($stockVar,2);
        $isSaved = $company->save();
        if ($isSaved) {
            return response()->json([
                'success' => true,
            ]);
        }else{
            return response()->json([
                'success' => false,
            ]);
        }
    }

}
