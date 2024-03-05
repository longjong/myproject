<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'hospitals';
    protected $fillable = [
        'name',
        'address',
        'telephone',
        'map',
        'image',
        'is_active'
    ];
}
