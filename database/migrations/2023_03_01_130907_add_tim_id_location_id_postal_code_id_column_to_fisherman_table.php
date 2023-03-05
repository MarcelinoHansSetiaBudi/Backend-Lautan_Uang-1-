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
        Schema::table('fisherman', function (Blueprint $table) {
            $table->unsignedBigInteger('tim_id')->after('id')->required();
            $table->foreign('tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
            $table->unsignedBigInteger('location_id')->after('birth_date')->required();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fisherman', function (Blueprint $table) {
            $table->dropForeign(['tim_id']);
            $table->dropColumn('tim_id');
            $table->dropForeign(['location_id']);
            $table->dropColumn('location_id');
            $table->dropForeign(['postal_code_id']);
            $table->dropColumn('postal_code_id');
        });
    }
};
