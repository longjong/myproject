<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thai extends Model
{
    use HasFactory;
    protected $table = 'thais';
    protected $fillable = [
        'name',
        'address',
        'telephone',
        'map',
        'rating',
        'image',
        'is_active'
    ];
}
