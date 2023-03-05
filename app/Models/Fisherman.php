<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fisherman extends Model
{
    use HasFactory;

    protected $table = 'fisherman';

    protected $fillable = [
        'name',
        'tim_id',
        'phone',
        'email',
        'password',
        'gender',
        'birth_date',
        'location_id',
        'status',
        'experience',
        'nik',
        'image',
        'identity_photo'
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];
}
