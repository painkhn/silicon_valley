<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'image_path',
    ];

    // Связь с категорией (множество продуктов к одной категории)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Связь с компонентами (один продукт может иметь много компонентов)
    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
