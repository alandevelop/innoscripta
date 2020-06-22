<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;


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
}
