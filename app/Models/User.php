<?php

/** Untuk make model bisa pake syntax: php artisan make:model <Nama_Model>
 *  Lalu untuk memberi tahu laravel bahwa model kita ambil dari DB menggunakan syntax
 *      protected $table = '<nama_table>'; Jika nama tabel dalam bentuk plural contoh students
 *  Maka gk perlu lagi pake protected $table. 
 *  Kalo singular contoh student baru perlu pake 
 *      protected $table='<nama_table>';
 *  
 *  untuk PK jika bukan ID maka perlu buat
 *      protected $primarykey='<nama_att_PK>';
 * 
 *  Lalu untuk auto increment mau dimatiin kita bisa pake:
 *      public $incrementing = false
 *  Karena PK auto increment dari laravel.
 * 
 *  Untuk mengubah tipe data dari PK semisal menjadi tipe data String menggunakan:
 *      protected $keyType ='string';
 * 
 *  Untuk TimeStamp jika di DB gk ada attribut created_at dan update_at
 *  Maka kita perlu memberi tahu ke Laravel bahwa
 *      public $timestamps = false;
 *  Agar ketika kita input banyak data dari front end maka tidak terjadi error.
 */
namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
