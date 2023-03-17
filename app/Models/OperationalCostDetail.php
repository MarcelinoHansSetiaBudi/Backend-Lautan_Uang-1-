<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalCostDetail extends Model
{
    use HasFactory;

    protected $table = 'operational_cost_detail';

    protected $fillable = [
        'operational_cost_id',
        'name',
        'price_item',
        'quantity'
    ];
}
