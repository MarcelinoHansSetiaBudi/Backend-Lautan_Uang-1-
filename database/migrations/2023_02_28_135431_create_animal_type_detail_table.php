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
        Schema::create('animal_type_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_type_id')->after('id')->required();
            $table->foreign('animal_type_id')->references('id')->on('animal_type')->onDelete('restrict');
            $table->bigInteger('price');
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
        Schema::dropIfExists('animal_type_detail');
    }
};
