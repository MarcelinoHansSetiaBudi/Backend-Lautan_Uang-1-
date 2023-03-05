<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FishermanTim extends Model
{
    use HasFactory;

    protected $table = 'fisherman_tim';

    protected $fillable = [
        'name',
        'phone',
        'year_formed',
        'address',
        'balance',
        'quantity',
        'total_assets',
        'divident_yield',
        'debt_to_equity_ratio',
        'market_cap'
    ];
}
