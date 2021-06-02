<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('cart/layout')
    @section('content')
    <div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">ようこそ！！- 商品一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
                <table class="table text-center">

                @foreach($products as $product)
               <td>
                    <a href="/cart/{{ $product->p_id }}/detail"><img src="{{ asset('storage/upload/') }}/{{$product->image1}}" alt="{{$product->image1}}" width="150" height="150"></a><br>
                    商品名：{{ $product->p_name }}<br>
                    単価（税抜）：{{ $product->p_price }} 円<br>
                </td>   
                @endforeach
            </table>
        </div>
    </div>
    @endsection
</html>
