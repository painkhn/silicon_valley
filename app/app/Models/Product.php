<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'category_id', 'image_path',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
