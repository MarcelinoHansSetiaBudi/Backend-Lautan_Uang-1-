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
        Schema::create('_investor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('gender', 1);
            $table->string('address');
            $table->timestamps('birth_date');
            $table->unsignedBigInteger('location_id')->after('birth_date')->required();
            $table->foreign('location_id')->references('id')->on('location')->onDelete('restrict');
            $table->unsignedBigInteger('postal_code_id')->after('location_id')->required();
            $table->foreign('postal_code_id')->references('id')->on('postal_code')->onDelete('restrict');
            $table->string('nik', 16);
            $table->string('npwp',16);
            $table->binary('identity_photo');
            $table->unsignedBigInteger('bank_id')->after('identity_photo')->required();
            $table->foreign('bank_id')->references('id')->on('bank')->onDelete('restrict');
            $table->dateTime('register_date');
            $table->bigInteger('balance');
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
        Schema::dropIfExists('_investor');
    }
};
