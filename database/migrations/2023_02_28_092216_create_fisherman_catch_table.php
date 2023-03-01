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
        Schema::create('fisherman_catch', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fisherman_tim_id')->after('id')->required();
            $table->foreign('fisherman_tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
            $table->integer('weight');
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
        Schema::dropIfExists('fisherman_catch');
    }
};
