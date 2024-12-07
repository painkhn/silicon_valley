<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Создание заказа
     */
    public function create()
    {
        $userId = Auth::id();
        $baskets = Basket::where('user_id', $userId)->get();
        foreach ($baskets as $basket) {
            Order::create([
                'product_id' => $basket->product_id,
                'user_id' => $basket->user_id,
                'count' => $basket->count,
            ]);
        }

        Basket::where('user_id', $userId)->delete();
        return redirect()->route('dashboard');
    }
}
