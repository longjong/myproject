<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otd extends Model
{
    use HasFactory;
    protected $table = 'otdecos';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'is_active'
    ];
}
