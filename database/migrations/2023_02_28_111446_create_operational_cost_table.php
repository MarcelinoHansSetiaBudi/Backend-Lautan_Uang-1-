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
        Schema::create('operational_cost', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fisherman_tim_id')->after('id')->required();
            $table->foreign('fisherman_tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
            $table->timestamps('date');
            $table->float('amount');
            $table->unsignedBigInteger('category_id')->after('amount')->required();
            $table->foreign('category_id')->references('id')->on('category_operational_cost')->onDelete('restrict');
            $table->string('description');
            $table->unsignedBigInteger('payment_method_id')->after('description')->required();
            $table->foreign('payment_method_id')->references('id')->on('payment_method')->onDelete('restrict');
            $table->string('vendor');
            $table->binary('receipt_photo');
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
        Schema::dropIfExists('operational_cost');
    }
};
