<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('investment_amount', 10, 2)->default(0);
            $table->decimal('sharp_risk_ratio', 10, 2)->default(0);
            $table->decimal('var', 10, 2)->default(0);
            $table->decimal('beta_coefficient', 10, 2)->default(0);
            $table->decimal('annual_volatility', 10, 2)->default(0);
            $table->decimal('daily_volatility', 10, 2)->default(0);
            $table->string('risk_ranking')->nullable();
            $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->enum('status', ['active', 'inactive'])->default('inactive');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
