<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    protected $casts = [
        'closing_price' => 'json',
        'average_price_midpoint' => 'json',
        '52_week_high' => 'json',
        '52_week_low' => 'json',
        'maximum_stock_return_over_250_days' => 'json',
        'minimum_stock_return_over_250_days' => 'json',
        'sharp_risk_ratio' => 'json',
        'beta_coefficient' => 'json',
        'daily_stock_volatility' => 'json',
        'annual_stock_volatility' => 'json',
        'stock_risk_ranking' => 'json',
        'price_earning_ratio' => 'json',
        'market_to_book_ratio' => 'json',
        'free_cash_flow' => 'json',
        'leverage_ratio' => 'json',
        'return_on_equity' => 'json',
        'dividend_yield' => 'json',
        'earning_per_share' => 'json',
        'annual_dividend_rate' => 'json',
        'expected_annual_stock_return' => 'json',
        'daily_expected_stock_return' => 'json',
        'stock_value_at_risk' => 'json',
        'last_date_for_dividend_distribution' => 'json',
        'last_updated_income_statement' => 'json',
        'last_updated_balance_sheet' => 'json',
        'stock_dividend_distribution_possibilities_chart' => 'json',
        'last_stock_vs_index_return_chart' => 'json',
        'support_and_resistance_price_level_chart' => 'json',
    ];
}
