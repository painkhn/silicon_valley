<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{

    // Указываем, что это модель корзины
    protected $fillable = ['product_id', 'user_id', 'count'];

    // Связь с моделью Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Связь с моделью User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
