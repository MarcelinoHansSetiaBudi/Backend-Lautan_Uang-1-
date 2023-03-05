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
            $table->string('name');
            $table->string('phone', 13);
            $table->string('email');
            $table->string('password');
            $table->enum('gender',['male', 'female']);
            $table->date('birth_date');
            $table->enum('status',['aktif', 'non-aktif']);
            $table->enum('role',['member', 'manager']);
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
