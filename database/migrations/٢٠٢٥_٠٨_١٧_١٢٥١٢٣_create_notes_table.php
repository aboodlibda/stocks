<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->json('closing_price')->nullable();
            $table->json('average_price_midpoint')->nullable();
            $table->json('52_week_high')->nullable();
            $table->json('52_week_low')->nullable();
            $table->json('maximum_stock_return_over_250_days')->nullable();
            $table->json('minimum_stock_return_over_250_days')->nullable();
            $table->json('sharp_risk_ratio')->nullable();
            $table->json('beta_coefficient')->nullable();
            $table->json('daily_stock_volatility')->nullable();
            $table->json('annual_stock_volatility')->nullable();
            $table->json('stock_risk_ranking')->nullable();
            $table->json('price_earning_ratio')->nullable();
            $table->json('market_to_book_ratio')->nullable();
            $table->json('free_cash_flow')->nullable();
            $table->json('leverage_ratio')->nullable();
            $table->json('return_on_equity')->nullable();
            $table->json('dividend_yield')->nullable();
            $table->json('earning_per_share')->nullable();
            $table->json('annual_dividend_rate')->nullable();
            $table->json('expected_annual_stock_return')->nullable();
            $table->json('daily_expected_stock_return')->nullable();
            $table->json('stock_value_at_risk')->nullable();
            $table->json('last_date_for_dividend_distribution')->nullable();
            $table->json('last_updated_income_statement')->nullable();
            $table->json('last_updated_balance_sheet')->nullable();
            $table->json('stock_dividend_distribution_possibilities_chart')->nullable();
            $table->json('last_stock_vs_index_return_chart')->nullable();
            $table->json('support_and_resistance_price_level_chart')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('note');
    }
};
