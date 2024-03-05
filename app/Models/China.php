<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class China extends Model
{
    use HasFactory;
    protected $table = 'chinas';
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
