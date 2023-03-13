<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeAsset extends Model
{
    use HasFactory;

    protected $table = 'type_asset';

    protected $fillable = [
        'name',
        'description'
    ];
}
