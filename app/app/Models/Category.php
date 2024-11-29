<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    // Связь с продуктами (категория может иметь много продуктов)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
