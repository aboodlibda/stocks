<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NotesSeeder extends Seeder
{
    public function run(): void
    {
        Note::query()->create([
            'closing_price' => ['en' => '', 'ar' => ''],
            'average_price_midpoint' => ['en' => '', 'ar' => ''],
            '52_week_high' => ['en' => '', 'ar' => ''],
            '52_week_low' => ['en' => '', 'ar' => ''],
            'maximum_stock_return_over_250_days' => ['en' => '', 'ar' => ''],
            'minimum_stock_return_over_250_days' => ['en' => '', 'ar' => ''],
            'sharp_risk_ratio' => ['en' => '', 'ar' => ''],
            'beta_coefficient' => ['en' => '', 'ar' => ''],
            'daily_stock_volatility' => ['en' => '', 'ar' => ''],
            'annual_stock_volatility' => ['en' => '', 'ar' => ''],
            'stock_risk_ranking' => ['en' => '', 'ar' => ''],
            'price_earning_ratio' => ['en' => '', 'ar' => ''],
            'market_to_book_ratio' => ['en' => '', 'ar' => ''],
            'free_cash_flow' => ['en' => '', 'ar' => ''],
            'leverage_ratio' => ['en' => '', 'ar' => ''],
            'return_on_equity' => ['en' => '', 'ar' => ''],
            'dividend_yield' => ['en' => '', 'ar' => ''],
            'earning_per_share' => ['en' => '', 'ar' => ''],
            'annual_dividend_rate' => ['en' => '', 'ar' => ''],
            'expected_annual_stock_return' => ['en' => '', 'ar' => ''],
            'daily_expected_stock_return' => ['en' => '', 'ar' => ''],
            'stock_value_at_risk' => ['en' => '', 'ar' => ''],
            'last_date_for_dividend_distribution' => ['en' => '', 'ar' => ''],
            'last_updated_income_statement' => ['en' => '', 'ar' => ''],
            'last_updated_balance_sheet' => ['en' => '', 'ar' => ''],
            'stock_dividend_distribution_possibilities_chart' => ['en' => '', 'ar' => ''],
            'last_stock_vs_index_return_chart' => ['en' => '', 'ar' => ''],
            'support_and_resistance_price_level_chart' => ['en' => '', 'ar' => ''],
        ]);
    }
}
