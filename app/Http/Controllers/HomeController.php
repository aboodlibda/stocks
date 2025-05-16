<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Facades\DB;
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
        $columns = [
            'stock_var_percent',
            'stock_sharp_ratio',
            'stock_beta_coefficient',
            'annual_stock_volatility',
            'daily_stock_volatility',
            'pe_ratio',
            'return_on_equity',
            'stock_dividend_yield',
            'earning_per_share',
            'annual_stock_expected_return',
            'minimum_daily_stock_3_years',
            'maximum_daily_stock_3_years',
        ];

        $selectRaw = collect($columns)->map(function ($col) {
            return "AVG($col) AS avg_$col";
        })->implode(", ");

        $averages = Company::query()
            ->where('index_symbol', $request->sector_code)
            ->selectRaw($selectRaw)
            ->where(function ($query) use ($columns) {
                foreach ($columns as $col) {
                    $query->whereNotNull($col);
                }
            })
            ->first();

        if (!$averages) {
            return response()->json(['message' => 'لا توجد بيانات متاحة لحساب المتوسط.'], 404);
        }

// Determine risk rank
        $volatility = $averages->avg_annual_stock_volatility;
        if ($volatility <= 0.10) {
            $stockRiskRank = "Conservative";
        } elseif ($volatility <= 0.20) {
            $stockRiskRank = "Moderately Conservative";
        } elseif ($volatility <= 0.30) {
            $stockRiskRank = "Aggressive";
        } else {
            $stockRiskRank = "Very Aggressive";
        }

// Format response
        $response = [
            'avg_stock_var_percent' => round($averages->avg_stock_var_percent, 2),
            'avg_stock_sharp_ratio' => round($averages->avg_stock_sharp_ratio, 2),
            'avg_stock_beta_coefficient' => round($averages->avg_stock_beta_coefficient, 2),
            'avg_annual_stock_volatility' => round($averages->avg_annual_stock_volatility, 2),
            'avg_daily_stock_volatility' => round($averages->avg_daily_stock_volatility, 2),
            'avg_pe_ratio' => round($averages->avg_pe_ratio, 2),
            'avg_return_on_equity' => round($averages->avg_return_on_equity, 2),
            'avg_stock_dividend_yield' => round($averages->avg_stock_dividend_yield, 2),
            'avg_earning_per_share' => round($averages->avg_earning_per_share, 2),
            'avg_annual_stock_expected_return' => round($averages->avg_annual_stock_expected_return, 2),
            'avg_minimum_daily_stock_3_years' => $averages->avg_minimum_daily_stock_3_years,
            'avg_maximum_daily_stock_3_years' => round($averages->avg_maximum_daily_stock_3_years, 2),
            'stock_risk_rank' => $stockRiskRank
        ];

        return response()->json($response);

    }


    public function getCompanies()
    {
        $companies = Company::all();
        return response()->json($companies);

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

}
