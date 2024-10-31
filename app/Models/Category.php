<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Many-to-Many relationship with products
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
