<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class MainController extends Controller
{
    public function menu(Request $request)
    {
        if($productsSession = session()->get('cart_products')) {
            $totalCartPrice = 0;
            foreach (Product::find(array_keys($productsSession)) as $model) {
                $totalCartPrice += $model->price * $productsSession[$model->id];
            }
        } else {
            $totalCartPrice = 0;
        }

        $categories = Category::with('products')->get();

        foreach ($categories as $category) {
            foreach ($category->products as $product) {
                $product->inCart = isset($productsSession[$product->id]);
            }
        }

        return view('index', compact('categories', 'totalCartPrice'));
    }

    public function cart(Request $request)
    {
        return view('cart');
    }
}
