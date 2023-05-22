<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

class PostalCode extends Model
{
    use HasFactory;

    protected $table = 'postal_code';

    protected $fillable = [
        'name',
        'description',
    ];

    public function location()
    {
        return $this->hasMany(Location::class);
    }
}
