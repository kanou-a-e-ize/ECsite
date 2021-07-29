@extends('shop/layout')
@section('title', '商品詳細')
@section('content')

    <div class="container">
        <div class="product-detail">
            <img src="{{ asset('storage/upload/') }}/{{$product->image1}}" alt="{{$product->image1}}" width="180" height="180">
            <img src="{{ asset('storage/upload/') }}/{{$product->image2}}" alt="{{$product->image2}}" width="180" height="180">
            <img src="{{ asset('storage/upload/') }}/{{$product->image3}}" alt="{{$product->image3}}" width="180" height="180">
            
            <table class="detail-table">
            <tr>
                <th>商品名</th>
                <th>商品説明</th>
                <th>単価</th>
            </tr>
                <tr>
                    <td>{{ $product->p_name }}</td>
                    <td>{{ $product->p_detail }}</td>
                    <td>¥{{ $product->p_price }}</td>
                </tr>
            </table>
        </div>
           <button type="button" class="btn-gray" onclick="location.href='/index'">商品一覧に戻る</button>   
    </div>

@endsection
