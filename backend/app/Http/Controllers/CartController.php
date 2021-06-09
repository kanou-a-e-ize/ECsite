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
    
    public function mycart()
    {
        $orders = new Order();
        return view('cart/mycart', compact('orders'));
    }

    public function order(Request $request)
    {
        $order = Order::create($request->all());
        return view('cart/address', compact('order'));
    }

    public function address(Request $request)
    {
        $customers = Customer::all();
        
        return view('cart/address', compact('customers'));
    }

    public function resister(CustomerRequest $request)
    {
        $customer = Customer::create($request->all());
        //$id = $customer->id;  
        //$customer = Customer::findOrFail($id);
        $customer->orders()->attach(request()->orders);
        return redirect('cart/checkout');
    }

}