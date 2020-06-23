<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
	public function create(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'surname' => 'required',
			'address' => 'required',
		]);

		$order = new Order;
		$order->name = $request->input('name');
		$order->surname = $request->input('surname');
		$order->address = $request->input('address');
		$order->total_price = $request->input('total_price');
		if (Auth::check()) $order->user_id = Auth::id();

		$order->save();

		$attachArr = [];
		foreach ($request->products as $id => $quantity) {
			$attachArr[$id] = ['quantity' => $quantity];
		}

		$order->products()->attach($attachArr);

		session()->forget('cart_products');
		$request->session()->flash('order_success', 'Your order has been received!');

		return redirect()->route('menu');
    }

	public function list(Request $request)
	{
		if($productsSession = session()->get('cart_products')) {
			$totalCartPrice = 0;
			foreach (Product::find(array_keys($productsSession)) as $model) {
				$totalCartPrice += $model->price * $productsSession[$model->id];
			}
		} else {
			$totalCartPrice = 0;
		}

		$user = Auth::user();
		$orders = $user->orders()->get();
		return view('orders', compact('user','orders', 'totalCartPrice'));
    }
}
