<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ShopController;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Http\Controllers\Auth;

class ShopController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('/product/shopindex', compact('products'));
    }
    
    public function create()
    {
        $product = new Product();
        return view('/product/create', compact('product'));
    }
    
    public function store(ProductRequest $request)
    {    
        // DB更新処理
        $product = new Product();
        $product->p_name = $request->p_name;
        $product->p_detail = $request->p_detail;
        $product->p_price = $request->p_price;

        $images = ['image1', 'image2', 'image3'];
        
        foreach($images as $image){

        //拡張子付きでファイル名を取得
        $filenameWithExt = $request->file("$image")->getClientOriginalName();
        //ファイル名のみを取得
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //拡張子を取得
        $extension = $request->file("$image")->getClientOriginalExtension();
        //保存のファイル名を構築
        $filenameToStore = $filename."_".time().".".$extension;

        $path = $request->file("$image")->storeAs("public/upload", $filenameToStore);
       
        $product->$image = $filenameToStore;
        }

        $product->save();
        return redirect("/shopindex");
    }
    
    public function destroy($p_id)
    {
        $product = Product::findOrFail($p_id);
        $deletimage1 = $product->image1;
        $deletimage2 = $product->image2;
        $deletimage3 = $product->image3;
        Storage::delete('public/upload/' . $deletimage1);
        Storage::delete('public/upload/' . $deletimage2);
        Storage::delete('public/upload/' . $deletimage3);

        $product->delete();
    
        return redirect("/shopindex");
    }

    public function order()
    {  
        $customers = Customer::all();
    
        return view('product/manageorder', compact('customers'));
    }
}

