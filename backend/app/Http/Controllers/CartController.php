<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Stock;


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
        $stocks = Stock::all();
        return view('cart/mycart', compact('stocks'));
    }

    public function store(Request $request, $stock_id)
    {
        $stock = new Stock;
        $stock->stock_p_id = $request->stock_p_id;
        $stock->stock_p_name = $request->stock_p_name;
        $stock->stock_p_price = $request->stock_p_price;
        $stock->stock_number = $request->stock_number;

        $stock->save();
        
        return redirect('cart/mycart');
    }

    public function destroy($stock_id)
    {
        $stock = Stock::findOrFail($stock_id);
        $stock->delete();
    
        return redirect('cart/mycart');
    }

    public function address(Request $request)
    {

        
        return view('cart/address');
    }
}