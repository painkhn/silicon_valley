<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'count'
    ];

    // Связь с продуктом
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Связь с пользователем
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
