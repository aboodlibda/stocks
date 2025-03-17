<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('company_num')->unique();
            $table->string('company_name');
            $table->string('index_name');
            $table->string('index_symbol');
            $table->decimal('stock_var_percent', 10, 2)->default(0);
            $table->decimal('stock_sharp_ratio', 10, 2)->default(0);
            $table->decimal('stock_beta_coefficient', 10, 2)->default(0);
            $table->decimal('annual_stock_volatility', 10, 2)->default(0);
            $table->decimal('daily_stock_volatility', 10, 2)->default(0);
            $table->string('stock_risk_rank');
            $table->decimal('pe_ratio', 10, 2)->default(0);
            $table->decimal('return_on_equity', 10, 2)->default(0);
            $table->decimal('stock_dividend_yield', 10, 2)->default(0);
            $table->decimal('earning_per_share', 10, 2)->default(0);
            $table->decimal('annual_stock_expected_return', 10, 2)->default(0);
            $table->decimal('avg_daily_expected_stock_return', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
