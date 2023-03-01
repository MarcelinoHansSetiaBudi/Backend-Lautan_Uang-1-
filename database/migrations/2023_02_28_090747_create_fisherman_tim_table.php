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
            $table->unsignedBigInteger('chief_fisherman_id')->after('phone')->required();
            $table->foreign('chief_fisherman_id')->references('id')->on('fisherman_chief')->onDelete('restrict');
            $table->integer('year_formed');
            $table->string('address');
            $table->bigInteger('balance')->required();
            $table->unsignedBigInteger('postal_code_id')->after('balance')->required();
            $table->foreign('postal_code_id')->references('id')->on('postal_code')->onDelete('restrict');
            $table->unsignedBigInteger('location_id')->after('postal_code_id')->required();
            $table->foreign('location_id')->references('id')->on('location')->onDelete('restrict');
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
