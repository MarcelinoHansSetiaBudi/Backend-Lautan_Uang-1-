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
        Schema::create('assets_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fisherman_tim_id')->after('id')->required();
            $table->foreign('fisherman_tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
            $table->string('name');
            $table->unsignedBigInteger('type_id')->after('name')->required();
            $table->foreign('type_id')->references('id')->on('type_asset')->onDelete('restrict');
            $table->integer('quantity');
            $table->dateTime('purchase_date');
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
        Schema::dropIfExists('assets_detail');
    }
};
