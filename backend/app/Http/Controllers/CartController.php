<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Http\Controllers\CartController;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use Session;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\StatefulGuard;

use Illuminate\Routing\Pipeline;
use App\Actions\Member\AttemptToAuthenticate;
use Laravel\Fortify\Actions\PrepareAuthenticatedSession;
//use App\Responses\MemberLoginResponse;
//use Laravel\Fortify\Contracts\LogoutResponse;
use Laravel\Fortify\Http\Requests\LoginRequest;

class CartController extends Controller
{

    protected $guard;

    public function __construct(StatefulGuard $guard)
    {
        $this->guard = $guard;
    }

    public function create()
    {
        return view('auth.memberLogin', ['guard' => 'member']);
    }

    public function store(LoginRequest $request)
    {
        return $this->loginPipeline($request)->then(function ($request) {
            return redirect('cart/index');
        });
    }

    protected function loginPipeline(LoginRequest $request)
    {
        return (new Pipeline(app()))->send($request)->through(array_filter([
            AttemptToAuthenticate::class,
            PrepareAuthenticatedSession::class,
        ]));
    }


    
    public function destroy(Request $request)
    {
        $this->guard->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('member/login');
    }


    
    public function index()
    {
        $products = Product::all();
        return view('cart/index', compact('products'));
    }

    public function detail($p_id)
    {
        $product = Product::findOrFail($p_id);

        return view('cart/detail', compact('product'));
    } 
    
    public function add($p_id)
    {
        $product = Product::findOrFail($p_id);

        Session::flash('message', 'カートに商品を追加しました!');
        return view('cart/detail', compact('product'));
    }

    public function mycart()
    {
        $orders = new Order();
        return view('cart/mycart', compact('orders'));
    }

    public function delete()
    {
        return view('cart/mycart');
    }
    

    public function address(Request $request)
    {
        $customer = new Customer();
        
        return view('cart/address', compact('customer'));
    }

    public function confirm()
    {    
        return view('cart/confirm');
    }

    public function resister(CustomerRequest $request)
    {
        //$customer->orders()->attach(request()->orders);
        return view('cart/checkout');
    }

}