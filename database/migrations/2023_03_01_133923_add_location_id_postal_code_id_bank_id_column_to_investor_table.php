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
        Schema::table('investors', function (Blueprint $table) {
            $table->unsignedBigInteger('location_id')->after('birth_date')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('restrict');
            $table->unsignedBigInteger('bank_id')->after('identity_photo')->nullable();
            $table->foreign('bank_id')->references('id')->on('bank')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('investors', function (Blueprint $table) {
            $table->dropForeign(['location_id']);
            $table->dropColumn('location_id');
            $table->dropForeign(['postal_code_id']);
            $table->dropColumn('postal_code_id');
            $table->dropForeign(['bank_id']);
            $table->dropColumn('bank_id');
        });
    }
};
