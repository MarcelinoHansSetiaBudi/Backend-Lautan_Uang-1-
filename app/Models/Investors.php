<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Investors extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $table = 'investors';
    
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'balance' => 'integer',
    ];

    public function tim()
    {
        return $this->belongsTo(FishermanTim::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // JWTSubject implementation
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    // JWTSubject implementation
    public function getJWTCustomClaims()
    {
        return [];
    }
}
