<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishermanCatch extends Model
{
    use HasFactory;

    protected $table = 'fisherman_catch';

    protected $fillable = [
        'weight'
    ];
}
