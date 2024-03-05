<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    use HasFactory;
    protected $table = 'Feeds';
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active'
    ];

    
}
