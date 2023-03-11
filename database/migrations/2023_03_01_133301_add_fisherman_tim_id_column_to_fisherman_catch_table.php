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
        Schema::table('fisherman_catch', function (Blueprint $table) {
            $table->unsignedBigInteger('fisherman_tim_id')->after('id')->nullable();
            $table->foreign('fisherman_tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fisherman_catch', function (Blueprint $table) {
            $table->dropForeign(['fisherman_tim_id']);
            $table->dropColumn('fisherman_tim_id');
        });
    }
};
