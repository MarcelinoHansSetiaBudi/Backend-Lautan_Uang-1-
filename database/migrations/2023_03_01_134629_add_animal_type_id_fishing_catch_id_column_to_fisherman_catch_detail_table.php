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
        Schema::table('fisherman_catch_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('animal_type_id')->after('name')->required();
            $table->foreign('animal_type_id')->references('id')->on('animal_type_detail')->onDelete('restrict');
            $table->unsignedBigInteger('fishing_catch_id')->after('animal_type_id')->required();
            $table->foreign('fishing_catch_id')->references('id')->on('fisherman_catch')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fisherman_catch_detail', function (Blueprint $table) {
            $table->dropForeign(['animal_type_detail']);
            $table->dropColumn('animal_type_id');
            $table->dropForeign(['fishing_catch_id']);
            $table->dropColumn('fishing_catch_id');
        });
    }
};
