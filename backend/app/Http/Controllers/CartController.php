<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Stock;
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
        $stock = new Stock;
        $stock->stock_p_id = $request->stock_p_id;
        $stock->stock_p_name = $request->stock_p_name;
        $stock->stock_p_price = $request->stock_p_price;
        $stock->stock_p_number = $request->stock_p_number;

        $stock->save();
        
        return redirect('cart/mycart');
    }

    public function mycart()
    {
        $stocks = Stock::all();
        return view('cart/mycart', compact('stocks'));
    }
    
    public function destroy($stock_id)
    {
        $stock = Stock::findOrFail($stock_id);
        $stock->delete();
    
        return redirect('cart/mycart');
    }

    public function order(Request $request)
    {
        $order = new Order;
        $order->order_p_id = $request->order_p_id;
        $order->order_p_name = $request->order_p_name;
        $order->order_p_price = $request->order_p_price;
        $order->order_p_number = $request->order_p_number;
        $order->save();

        return view('cart/address', compact('order'));
    }

    public function resister(CustomerRequest $request)
    {
        $customer = new Customer;
        $customer->c_name = $request->c_name;
        $customer->c_name_kana = $request->c_name_kana;
        $customer->postcode = $request->postcode;
        $customer->prefecture = $request->prefecture;
        $customer->city = $request->city;
        $customer->street = $request->street;
        $customer->c_phone = $request->c_phone;
        $customer->c_mail = $request->c_mail;
        $customer->c_p_id = $request->c_p_id;
        $customer->c_p_name = $request->c_p_name;
        $customer->c_p_price = $request->c_p_price;
        $customer->c_p_number = $request->c_p_number;

        $customer->save();

        return redirect('cart/ordered');
    }
}