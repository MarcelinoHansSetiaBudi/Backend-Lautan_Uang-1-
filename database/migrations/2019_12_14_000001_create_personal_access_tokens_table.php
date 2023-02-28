<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 
 *  Buat FK
 *  Kalau ambil nilai dari primary key tabel lain maka tipe data yang digunakan adalah unsignedBigInteger
 *  Dan jangan lupa untuk UP di beri:
 *      $table->unsignedBigInteger('<nama_att>')->after('<nama_attribut>')->required();
 *      $table->foreign('<nama_attribut>')->references('<nama_table(PK)')->on('<nama_table(FK)')->onDelete('restrict');
 *  untuk down 
 *      $table->dropForeign(['<nama_attribut(FK)>']);
 *      $table->dropColumn('<nama_attributnya>');
 */

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * Syntax: 
     * 1. Untuk rollback batch terakhir
     *      php artisan migrate:rollback 
     * 2. Untuk rollback lebih dari satu batch semisal terdapat 3 batch kita mau rollback batch 2 dan 3 maka:
     *      php artisan migrate:rollback --step = 2        // sehingga yang terdrop / rollback batch 2 dan 3
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
