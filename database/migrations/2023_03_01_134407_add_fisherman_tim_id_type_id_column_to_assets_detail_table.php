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
        Schema::table('assets_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('fisherman_tim_id')->after('id')->nullable();
            $table->foreign('fisherman_tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
            $table->unsignedBigInteger('type_id')->after('name')->nullable();
            $table->foreign('type_id')->references('id')->on('type_asset')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets_detail', function (Blueprint $table) {
            $table->dropForeign(['fisherman_tim_id']);
            $table->dropColumn('fisherman_tim_id');
            $table->dropForeign(['type_id']);
            $table->dropColumn('type_id');
        });
    }
};
