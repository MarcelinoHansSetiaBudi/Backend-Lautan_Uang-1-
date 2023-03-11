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
        Schema::table('operational_cost_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('operational_cost_id')->after('id')->nullable();
            $table->foreign('operational_cost_id')->references('id')->on('operational_cost')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operational_cost_detail', function (Blueprint $table) {
            $table->dropForeign(['operational_cost_id']);
            $table->dropColumn('operational_cost_id');
        });
    }
};
