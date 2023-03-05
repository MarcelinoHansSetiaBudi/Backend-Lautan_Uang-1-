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
        Schema::create('investor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('password');
            $table->enum('gender', ['male', 'female', 'unknown'])->default('unknown');
            $table->string('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('nik', 16)->nullable();
            $table->string('npwp',16)->nullable();
            $table->binary('identity_photo')->nullable();
            $table->dateTime('register_date')->nullable();
            $table->bigInteger('balance')->nullable();
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
        Schema::dropIfExists('investor');
    }
};
