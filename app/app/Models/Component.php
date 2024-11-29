<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = [
        'name', 'type', 'image_path', 'product_id',
    ];

    // Связь с продуктом (компонент принадлежит одному продукту)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
