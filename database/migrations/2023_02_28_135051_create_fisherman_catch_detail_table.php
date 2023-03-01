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
        Schema::create('fisherman_catch_detail', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('animl_type_id')->after('name')->required();
            $table->foreign('animal_type_id')->references('id')->on('animal_type_detail')->onDelete('restrict');
            $table->unsignedBigInteger('fishing_catch_id')->after('animal_type_id')->required();
            $table->foreign('fishing_catch_id')->references('id')->on('fisherman_catch')->onDelete('restrict');
            $table->integer('weight');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fisherman_catch_detail');
    }
};
