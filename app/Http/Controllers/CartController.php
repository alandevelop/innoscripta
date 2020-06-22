<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'productId' => 'required',
        ]);

        $products = $request->session()->pull('cart_products');
        if($products) {
            if(isset($products[$request->productId])) {
                $products[$request->productId] = ++$products[$request->productId];
            } else {
                $products[$request->productId] = 1;
            }
        } else {
            $products = [$request->productId => 1];
        }
        $request->session()->put('cart_products', $products);

        session()->save();
        return $products;
    }

    public function decreaseById(Request $request)
    {
        $request->validate([
            'productId' => 'required',
        ]);

        if($products = $request->session()->pull('cart_products')) {

            if(isset($products[$request->productId])) {
                if($val = --$products[$request->productId]) {
                    $products[$request->productId] = $val;
                } else {
                    unset($products[$request->productId]);
                }
            }

            $request->session()->put('cart_products', $products);
        }

        session()->save();
        return $products;
    }

    public function removeById(Request $request)
    {
        $request->validate([
            'productId' => 'required',
        ]);

        if($products = $request->session()->pull('cart_products')) {
            if(isset($products[$request->productId])) unset($products[$request->productId]);
            $request->session()->put('cart_products', $products);
            session()->save();
        }

        return $products;
    }

	public function list(Request $request)
	{
		$currencyService = resolve('CurrencyService');
		$usdRate = $currencyService->getCurrencies()['rates']['USD'];

		if($productsSession = session()->get('cart_products')) {
			$productsModels = Product::find(array_keys($productsSession));
			$totalCartPrice = 0;

			foreach ($productsModels as $model) {
				$totalCartPrice += $model->price * $productsSession[$model->id];
				$model->quantity = $productsSession[$model->id];
			}

			$totalInUsd = $totalCartPrice * $usdRate;
			$totalInUsd = number_format($totalInUsd, 2);
		} else {
			$totalCartPrice = 0;
			$totalInUsd = 0;
			$productsModels = null;
		}

		return view('cart', compact('productsModels', 'totalCartPrice', 'usdRate', 'totalInUsd'));
    }
}
