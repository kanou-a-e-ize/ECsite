<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('cart/layout')
    @section('content')
    <div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">注文情報</h3>
        </div>
    </div>

    @if($stocks->isNotEmpty())
        <div class="col-md-11 col-md-offset-1">
        
            <table class="table text-center">
                <tr>
                    <th class="text-center">商品名</th>
                    <th class="text-center">単価（税抜）円</th>
                    <th class="text-center">数量</th>
                    <th class="text-center">小計（税抜）円</th>
                    <th class="text-center">削除</th>
                </tr>
            
            @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->stock_p_name }}</td>
                    <td>{{ $stock->stock_p_price }}</td>
                    <td>{{ $stock->stock_p_number }}</td>
                    <td>{{ $stock->stock_p_number*$stock->stock_p_price}}</td>
                    
                    <td>
                        <form action="/cart/{{ $stock->stock_id }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>

    @else
        <p class="text-center">注文情報がありません...!</p>
    @endif

            <form action="/cart/address" method="post">
                @csrf
                    <input type="hidden" name="order_p_id" value="{{ $stock->stock_p_id }}" >
                    <input type="hidden" name="order_p_name" value="{{ $stock->stock_p_name }}" >
                    <input type="hidden" name="order_p_price" value="{{ $stock->stock_p_price }}" >
                    <input type="hidden" name="order_p_number" value="{{ $stock->stock_p_number }}" >       
                <button type="submit" class="btn btn-default">住所入力</button>
            </form>      

            <a href="/cart">商品一覧に戻る</a>  
        </div> 

    @endsection
</html>