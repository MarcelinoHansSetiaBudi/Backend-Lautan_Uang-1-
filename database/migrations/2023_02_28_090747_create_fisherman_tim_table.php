<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fisherman_tim', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->integer('year_formed');
            $table->string('address');
            $table->bigInteger('balance')->required();
            $table->integer('quantity');
            $table->bigInteger('total_assets')->required();
            $table->float('divident_yield');
            $table->float('debt_to_equity_ratio');
            $table->bigInteger('market_cap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fisherman_tim');
    }
};
