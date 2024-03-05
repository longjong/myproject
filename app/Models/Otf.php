<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otf extends Model
{
    use HasFactory;
    protected $table = 'otfoods';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'is_active'
    ];
}
