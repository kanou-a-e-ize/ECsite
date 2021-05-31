<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('cart/layout')
    @section('content')
    <div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">商品詳細 - {{ $product->p_name }}</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        
                
                商品名：{{ $product->p_name }}<br>
                商品説明：{{ $product->p_detail }}<br>
                単価（税抜）：{{ $product->p_price }} 円<br>
                
                <img src="{{ asset('storage/upload/') }}/{{$product->image1}}" alt="{{$product->image1}}" width="200" height="200">
                <img src="{{ asset('storage/upload/') }}/{{$product->image2}}" alt="{{$product->image2}}" width="200" height="200">
                <img src="{{ asset('storage/upload/') }}/{{$product->image3}}" alt="{{$product->image3}}" width="200" height="200">
              
            <div>
               
                <form action="/cart/{{ $product->p_id }}/store" method="post">
                @csrf
                    <input type="hidden" name="stock_p_id" value="{{ $product->p_id }}" >
                    <input type="hidden" name="stock_p_name" value="{{ $product->p_name }}" >
                    <input type="hidden" name="stock_p_price" value="{{ $product->p_price }}" >

                    <label for="stock_number">購入個数</label>
                    <div class="">
                        <input type="number" value="1" min="1" name="stock_number" >
                        <lavel class="stock_number">個</lavel>
                    </div>
                <br>
                <button type="submit" class="btn btn-default">カートに入れる</button>
                <a href="/cart">商品一覧に戻る</a>
            </div>
    </div>
    @endsection
</html>
