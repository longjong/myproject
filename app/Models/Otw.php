<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otw extends Model
{
    use HasFactory;
    protected $table = 'otwaters';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'is_active'
    ];
}
