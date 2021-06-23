@extends('cart/layout')
@section('title', '商品一覧')
@section('content') 

    <div class="container">
        <div class="cart-btn">
            <button type="button" class="btn-blue" onclick="location.href='mycart'">カート確認</button>               
        </div>
        <div class="itemlist">    
            <ul>
            @foreach($products as $product)
                <li>
                    <a href="/cart/{{ $product->p_id }}/detail"><img src="{{ asset('storage/upload/') }}/{{$product->image1}}" alt="{{$product->image1}}"></a>
                    <div class="item-body">
                        <h4>{{ $product->p_name }}</h4>
                        <p>¥{{ $product->p_price }}</p>
                    </div>
                </li>
            @endforeach  
            </ul>
        </div>
    </div>

@endsection