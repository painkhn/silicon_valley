<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::with([
            'products.components'
        ])->get();

        return view('catalog', compact('categories'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('index');
    }

    public function upload(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            $product->image_path = $request->file('image')->store('products', 'public');
        }

        $product->save();

        if ($request->has('components')) {
            foreach ($request->input('components') as $index => $componentData) {
                $component = new Component();
                $component->name = $componentData['name'];
                $component->product_id = $product->id;
                $component->type = $componentData['type'];

                if ($request->hasFile("components.$index.image")) {
                    $component->image_path = $request->file("components.$index.image")->store('components', 'public');
                }

                $component->save();
            }
        }

        return redirect()->back();
    }

    public function show($id) {
        return view('product', [
            'product' => Product::with('category', 'components')->findOrFail($id),
            'category' => Category::all()
        ]);
    }

    public function search(Request $request) {
        $product = Product::where('name', $request->word)->firstOrFail();
        return $this->show($product->id);
    }

    public function update(Request $request, $id)
    {

        $product = Product::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');

        $product->save();

        return redirect()->route('product.show', ['id' => $product->id]);
    }
}
