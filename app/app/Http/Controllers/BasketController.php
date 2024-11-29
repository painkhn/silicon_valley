<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, Basket};
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $baskets = $user->baskets()->with('product.category')->get();

        $totalAmount = 0;
        foreach ($baskets as $basketItem) {
            $totalAmount += $basketItem->count * $basketItem->product->price;
        }

        return view('basket', compact('baskets', 'totalAmount'));
    }

    public function addToBasket(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Продукт не найден');
        }

        $user = Auth::user();

        $basketItem = Basket::where('product_id', $product->id)
                            ->where('user_id', $user->id)
                            ->first();

        if ($basketItem) {
            $basketItem->count += 1;
            $basketItem->save();
        } else {
            Basket::create([
                'product_id' => $product->id,
                'user_id' => $user->id,
                'count' => 1,
            ]);
        }

        return redirect()->route('basket.index');
    }
}
