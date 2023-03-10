<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
        'province_name',
        'kota_kab_name',
        'kecamatan_name',
        'kelurahan_des_name',
        'postal_code_id',
    ];
}
