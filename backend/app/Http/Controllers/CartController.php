<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;


class CartController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('cart/cartindex', compact('products'));
    }

    public function detail($p_id)
    {
        $product = Product::findOrFail($p_id);

        return view('cart/detail', compact('product'));
    }

    public function store(Request $request)
    {
        $order = new Order;
        $order->order_p_id = $request->order_p_id;
        $order->order_p_name = $request->order_p_name;
        $order->order_p_price = $request->order_p_price;
        $order->order_p_number = $request->order_p_number;

        $order->save();
        
        return redirect('cart/mycart');
    }

    public function mycart()
    {
        $orders = Order::all();
        return view('cart/mycart', compact('orders'));
    }
    
    public function destroy($order_id)
    {
        $order = order::findOrFail($order_id);
        $order->delete();
    
        return redirect('cart/mycart');
    }

    public function address(Request $request)
    {
        $orders = Order::all();
        return view('cart/address', compact('orders'));
    }

    public function resister(CustomerRequest $request)
    {
        $customer = Customer::create($request->all());
        $customer->orders()->attach(request()->orders);


        return redirect('cart/checkout');
    }
}