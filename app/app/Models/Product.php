<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'image_path',
    ];

    // Связь с категорией
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Связь с компонентами
    public function components()
    {
        return $this->hasMany(Component::class);
    }

    // Связь с моделью Basket
    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }
}
