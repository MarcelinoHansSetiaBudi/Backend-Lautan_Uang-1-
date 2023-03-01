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
        Schema::table('fisherman_chief', function (Blueprint $table) {
            $table->unsignedBigInteger('fisherman_id')->after('id')->required();
            $table->foreign('fisherman_id')->references('id')->on('fisherman')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fisherman_chief', function (Blueprint $table) {
            $table->dropForeign(['fisherman_id']);
            $table->dropColumn('fisherman_id');
        });
    }
};
