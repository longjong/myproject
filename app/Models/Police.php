<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Police extends Model
{
    use HasFactory;
    protected $table = 'postations';
    protected $fillable = [
        'name',
        'address',
        'telephone',
        'map',
        'image',
        'is_active'
    ];
}
