@extends('cart/layout')
@section('title', '商品一覧')
@section('content') 

    <div class="container">
        <div class="cart-btn">
            <button type="button" class="btn-green" onclick="location.href='mycart'">カート確認</button>               
        </div>
        <div class="itemlist">    
            <ul>
            @foreach($products as $product)
            <a href="/cart/{{ $product->p_id }}/detail">    
                <li>
                    
                    <img src="{{ asset('storage/upload/') }}/{{$product->image1}}" alt="{{$product->image1}}">
                    <div class="item-body">
                        <p class='product-name'>{{ $product->p_name }}</p>
                        <p>¥{{ $product->p_price }}</p>
                    </div>
                   
                </li>
                </a>
            @endforeach  
            </ul>
        </div>
    </div>

@endsection