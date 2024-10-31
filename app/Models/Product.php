<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'pic', // For storing the image path
    ];
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    // Many-to-Many relationship with categories
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
