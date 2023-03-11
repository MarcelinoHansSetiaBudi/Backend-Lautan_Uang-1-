<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetsDetail extends Model
{
    use HasFactory;

    protected $table = 'assets_detail';

    protected $fillable = [
        'name',
        'quantity',
        'purchase_date'
    ];

    protected $casts = [
        'purchase_date' => 'date'
    ];
}