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
        Schema::create('operational_cost_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('operational_cost_id')->after('id')->required();
            $table->foreign('operational_cost_id')->references('id')->on('operational_cost')->onDelete('restrict');
            $table->string('name');
            $table->float('price_@item');
            $table->integer('quantity');
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
        Schema::dropIfExists('operational_cost_detail');
    }
};
