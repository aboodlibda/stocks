<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('sectors', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->decimal('open', 15, 2)->default(0);
            $table->decimal('high', 15, 2)->default(0);
            $table->decimal('low', 15, 2)->default(0);
            $table->decimal('close', 15, 2)->default(0);
            $table->decimal('volume', 15, 2)->default(0);
            $table->decimal('turnover', 15, 2)->default(0);
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sectors');
    }
};
