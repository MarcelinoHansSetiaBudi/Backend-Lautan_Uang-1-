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
        Schema::create('fisherman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tim_id')->after('id')->required();
            $table->foreign('tim_id')->references('id')->on('fisherman_tim')->onDelete('restrict');
            $table->string('name');
            $table->string('phone', 13);
            $table->string('email');
            $table->string('password');
            $table->string('gender', 1);
            $table->timestamps('birth_date');
            $table->unsignedBigInteger('location_id')->after('birth_date')->required();
            $table->foreign('location_id')->references('id')->on('location')->onDelete('restrict');
            $table->unsignedBigInteger('postal_code_id')->after('location_id')->required();
            $table->foreign('postal_code_id')->references('id')->on('postal_code')->onDelete('restrict');
            $table->enum('status',['aktif', 'non-aktif']);
            $table->integer('experience');
            $table->string('nik', 16);
            $table->binary('image');
            $table->binary('identity_photo');
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
        Schema::dropIfExists('fisherman');
    }
};
