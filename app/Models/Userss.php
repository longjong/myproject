<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userss extends Model
{
    use HasFactory;

    protected $table = 'userss';
    protected $fillable = [
        'username',
        'full_name',
        'telephone',
        'email',
        'address',
        'image',
        'is_active'
    ];
}
