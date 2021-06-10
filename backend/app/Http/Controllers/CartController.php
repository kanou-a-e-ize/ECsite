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

    public function address(Request $request)
    {
        $customer = new Customer();
        
        return view('cart/address', compact('customer'));
    }

    public function resister(CustomerRequest $request)
    {
        //$customer->orders()->attach(request()->orders);
        return view('cart/checkout');
    }

}