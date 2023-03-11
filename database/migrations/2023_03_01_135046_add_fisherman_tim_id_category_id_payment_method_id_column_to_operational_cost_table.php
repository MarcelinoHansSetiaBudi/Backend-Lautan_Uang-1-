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
        Schema::table('operational_cost', function (Blueprint $table) {
            $table->unsignedBigInteger('fisherman_tim_id')->after('id')->nullable();
            $table->foreign('fisherman_tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
            $table->unsignedBigInteger('category_id')->after('amount')->nullable();
            $table->foreign('category_id')->references('id')->on('category_operational_cost')->onDelete('restrict');
            $table->unsignedBigInteger('payment_method_id')->after('description')->nullable();
            $table->foreign('payment_method_id')->references('id')->on('payment_method')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operational_cost', function (Blueprint $table) {
            $table->dropForeign(['fisherman_tim_id']);
            $table->dropColumn('fisherman_tim_id');
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropForeign(['paymnt_method_id']);
            $table->dropColumn('payment_method_id');
        });
    }
};
