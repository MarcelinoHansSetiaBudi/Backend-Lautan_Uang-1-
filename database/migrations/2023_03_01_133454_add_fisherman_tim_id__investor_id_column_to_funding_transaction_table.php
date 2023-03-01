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
        Schema::table('funding_transaction', function (Blueprint $table) {
            $table->unsignedBigInteger('fisherman_tim_id')->after('id')->required();
            $table->foreign('fisherman_tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
            $table->unsignedBigInteger('Investor_id')->after('fisherman_tim_id')->required();
            $table->foreign('Investor_id')->references('id')->on('Investor')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('funding_transaction', function (Blueprint $table) {
            $table->dropForeign(['fisherman_tim_id']);
            $table->dropColumn('fisherman_tim_id');
            $table->dropForeign(['Investor_id']);
            $table->dropColumn('Investor_id');
        });
    }
};
