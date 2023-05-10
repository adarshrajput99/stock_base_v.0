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
        Schema::create('adain', function (Blueprint $table) {
            $table->date('Date');
            $table->string('Symbol');
            $table->string('Series');
            $table->decimal('Prev Close', 8, 2);
            $table->decimal('Open', 8, 2);
            $table->decimal('High', 8, 2);
            $table->decimal('Low', 8, 2);
            $table->decimal('Last', 8, 2);
            $table->decimal('Close', 8, 2);
            $table->decimal('VWAP', 8, 2);
            $table->unsignedBigInteger('Volume');
            $table->unsignedBigInteger('Turnover');
            $table->unsignedBigInteger('Trades');
            $table->unsignedBigInteger('Deliverable Volume');
            $table->decimal('%Deliverble', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adain');
    }
};
