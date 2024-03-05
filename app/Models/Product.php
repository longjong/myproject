<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'is_active'
    ];


    //relationship
    public function otop()
    {
        return $this->belongsTo(Otop::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
