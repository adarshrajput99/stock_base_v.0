<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('table_name', function (Blueprint $table) {
            $table->id();
            $table->string('INSTRUMENT');
            $table->string('SYMBOL');
            $table->text('EXPIRY_DT');
            $table->decimal('STRIKE_PR', 8, 2);
            $table->string('OPTION_TYP');
            $table->decimal('OPEN', 8, 2);
            $table->decimal('HIGH', 8, 2);
            $table->decimal('LOW', 8, 2);
            $table->decimal('CLOSE', 8, 2);
            $table->decimal('SETTLE_PR', 8, 2);
            $table->unsignedBigInteger('CONTRACTS');
            $table->decimal('VAL_INLAKH', 10, 2);
            $table->unsignedBigInteger('OPEN_INT');
            $table->integer('CHG_IN_OI');
            $table->text('TIMESTAMP');
            $table->string('Unnamed_15')->nullable();
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
