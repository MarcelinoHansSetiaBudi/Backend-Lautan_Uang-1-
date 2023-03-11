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
        Schema::table('animal_type_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('animal_type_id')->after('id')->nullable();
            $table->foreign('animal_type_id')->references('id')->on('animal_type')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animal_type_detail', function (Blueprint $table) {
            $table->dropForeign(['animal_type_id']);
            $table->dropColumn('animal_type_id');
        });
    }
};
