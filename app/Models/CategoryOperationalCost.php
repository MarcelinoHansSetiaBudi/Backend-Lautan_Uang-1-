<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryOperationalCost extends Model
{
    use HasFactory;
    protected $table = 'category_operational_cost';

    protected $fillable = [
        'name',
        'description'
    ];

}
