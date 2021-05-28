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
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="p_id" value="{{ $product->p_id }}">
                <input type="submit" value="カートに入れる">
            </div>
                  
                <a href="/">商品一覧に戻る</a>
    </div>
    @endsection
</html>
