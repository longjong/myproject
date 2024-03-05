<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ots extends Model
{
    use HasFactory;
    protected $table = 'otshirts';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'is_active'
    ];
}
