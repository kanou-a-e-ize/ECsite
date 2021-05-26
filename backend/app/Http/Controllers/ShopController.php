<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ShopController;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Http\Controllers\Auth;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // DBよりproductsテーブルの値を全て取得
        $products = Product::all();

        // 取得した値をビュー「shopindex」に渡す
        return view('/product/shopindex', compact('products'));
    }
    
    public function create()
    {
        $product = new Product();
        return view('/product/create', compact('product'));
    }
    
    public function store(ProductRequest $request)
    {   
       
        // 画像ファイルのパス
        $img1_url = $request->image1->store('public/upload');
        $img2_url = $request->image2->store('public/upload');
        $img3_url = $request->image3->store('public/upload');

        // DB更新処理
        $product = new Product();
        $product->p_name = $request->p_name;
        $product->p_detail = $request->p_detail;
        $product->p_price = $request->p_price;
        
        $image1 = str_replace('public/upload', '', $img1_url);
        $product->image1 = $request->image1;
        $image2 = str_replace('public/upload', '', $img2_url);
        $product->image2 = $request->image2;
        $image3 = str_replace('public/upload', '', $img3_url);
        $product->image3 = $request->image3;

        $product->save();
    
        return redirect("/product/shopindex");
    }
    
    public function destroy($p_id)
    {
        $product = Product::findOrFail($p_id);
        $product->delete();
    
        return redirect("/product/shopindex");
    }
}

