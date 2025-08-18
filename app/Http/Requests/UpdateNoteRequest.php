<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // For now, we'll allow any authenticated user to update a note.
        // You might want to add more specific authorization logic here, 
        // for example, checking if the user owns the note.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'closing_price.en' => 'nullable|string',
            'closing_price.ar' => 'nullable|string',
            'average_price_midpoint.en' => 'nullable|string',
            'average_price_midpoint.ar' => 'nullable|string',
            '52_week_high.en' => 'nullable|string',
            '52_week_high.ar' => 'nullable|string',
            '52_week_low.en' => 'nullable|string',
            '52_week_low.ar' => 'nullable|string',
            'maximum_stock_return_over_250_days.en' => 'nullable|string',
            'maximum_stock_return_over_250_days.ar' => 'nullable|string',
            'minimum_stock_return_over_250_days.en' => 'nullable|string',
            'minimum_stock_return_over_250_days.ar' => 'nullable|string',
            'sharp_risk_ratio.en' => 'nullable|string',
            'sharp_risk_ratio.ar' => 'nullable|string',
            'beta_coefficient.en' => 'nullable|string',
            'beta_coefficient.ar' => 'nullable|string',
            'daily_stock_volatility.en' => 'nullable|string',
            'daily_stock_volatility.ar' => 'nullable|string',
            'annual_stock_volatility.en' => 'nullable|string',
            'annual_stock_volatility.ar' => 'nullable|string',
            'stock_risk_ranking.en' => 'nullable|string',
            'stock_risk_ranking.ar' => 'nullable|string',
            'price_earning_ratio.en' => 'nullable|string',
            'price_earning_ratio.ar' => 'nullable|string',
            'market_to_book_ratio.en' => 'nullable|string',
            'market_to_book_ratio.ar' => 'nullable|string',
            'free_cash_flow.en' => 'nullable|string',
            'free_cash_flow.ar' => 'nullable|string',
            'leverage_ratio.en' => 'nullable|string',
            'leverage_ratio.ar' => 'nullable|string',
            'return_on_equity.en' => 'nullable|string',
            'return_on_equity.ar' => 'nullable|string',
            'dividend_yield.en' => 'nullable|string',
            'dividend_yield.ar' => 'nullable|string',
            'earning_per_share.en' => 'nullable|string',
            'earning_per_share.ar' => 'nullable|string',
            'annual_dividend_rate.en' => 'nullable|string',
            'annual_dividend_rate.ar' => 'nullable|string',
            'expected_annual_stock_return.en' => 'nullable|string',
            'expected_annual_stock_return.ar' => 'nullable|string',
            'daily_expected_stock_return.en' => 'nullable|string',
            'daily_expected_stock_return.ar' => 'nullable|string',
            'stock_value_at_risk.en' => 'nullable|string',
            'stock_value_at_risk.ar' => 'nullable|string',
            'last_date_for_dividend_distribution.en' => 'nullable|string',
            'last_date_for_dividend_distribution.ar' => 'nullable|string',
            'last_updated_income_statement.en' => 'nullable|string',
            'last_updated_income_statement.ar' => 'nullable|string',
            'last_updated_balance_sheet.en' => 'nullable|string',
            'last_updated_balance_sheet.ar' => 'nullable|string',
            'stock_dividend_distribution_possibilities_chart.en' => 'nullable|string',
            'stock_dividend_distribution_possibilities_chart.ar' => 'nullable|string',
            'last_stock_vs_index_return_chart.en' => 'nullable|string',
            'last_stock_vs_index_return_chart.ar' => 'nullable|string',
            'support_and_resistance_price_level_chart.en' => 'nullable|string',
            'support_and_resistance_price_level_chart.ar' => 'nullable|string',
        ];
    }
}
