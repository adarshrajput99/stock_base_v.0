<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stock_prices', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->float('open')->nullable();
            $table->float('high')->nullable();
            $table->float('low')->nullable();
            $table->float('close')->nullable();
            $table->float('volume')->nullable();
            $table->float('turnover')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
