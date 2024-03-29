<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oth extends Model
{
    use HasFactory;
    protected $table = 'otherbs';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'is_active'
    ];
}
