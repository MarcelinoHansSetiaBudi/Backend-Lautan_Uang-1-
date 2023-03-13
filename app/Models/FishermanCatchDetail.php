<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishermanCatchDetail extends Model
{
    use HasFactory;

    protected $table = 'fisherman_catch_detail';

    protected $fillable = [
        'name',
        'animal_type_id',
        'fishing_catch_id',
        'price'
    ];
}
