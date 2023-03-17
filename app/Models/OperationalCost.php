<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationalCost extends Model
{
    use HasFactory;

    protected $table = 'operational_cost';

    protected $fillable = [
        'fisherman_tim_id',
        'date',
        'amount',
        'category_id',
        'description',
        'payment_method_id',
        'vendor',
        'receipt_photo'
    ];
}
