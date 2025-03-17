<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Yajra\DataTables\Facades\DataTables;

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



    public function getStockAverages()
    {
        $averages = Company::selectRaw("
            AVG(stock_var_percent) AS avg_stock_var_percent,
            AVG(stock_sharp_ratio) AS avg_stock_sharp_ratio,
            AVG(stock_beta_coefficient) AS avg_stock_beta_coefficient,
            AVG(annual_stock_volatility) AS avg_annual_stock_volatility,
            AVG(daily_stock_volatility) AS avg_daily_stock_volatility,
            AVG(pe_ratio) AS avg_pe_ratio,
            AVG(return_on_equity) AS avg_return_on_equity,
            AVG(stock_dividend_yield) AS avg_stock_dividend_yield,
            AVG(earning_per_share) AS avg_earning_per_share,
            AVG(annual_stock_expected_return) AS avg_annual_stock_expected_return,
            AVG(avg_daily_expected_stock_return) AS avg_avg_daily_expected_stock_return
        ")->whereNotNull('stock_var_percent')
            ->whereNotNull('stock_sharp_ratio')
            ->whereNotNull('stock_beta_coefficient')
            ->whereNotNull('annual_stock_volatility')
            ->whereNotNull('daily_stock_volatility')
            ->whereNotNull('pe_ratio')
            ->whereNotNull('return_on_equity')
            ->whereNotNull('stock_dividend_yield')
            ->whereNotNull('earning_per_share')
            ->whereNotNull('annual_stock_expected_return')
            ->whereNotNull('avg_daily_expected_stock_return')
            ->first();

        if (!$averages) {
            return response()->json(['message' => 'لا توجد بيانات متاحة لحساب المتوسط.'], 404);
        }

        // تقريب القيم إلى خانتين عشريتين
        $averages = collect($averages)->map(function ($value) {
            return round($value, 2);
        });

        return response()->json($averages);
    }


}
