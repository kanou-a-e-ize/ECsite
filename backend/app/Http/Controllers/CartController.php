<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Cart;


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
        $carts = Cart::all();
        return view('cart/mycart', compact('carts'));
    }

    public function store(Request $request)
    {
        $cart = new Cart();
        $cart->stock_id = $request->stock_id;
        
        return redirect('cart/{p_id}/detail');
        
    }

    

}
