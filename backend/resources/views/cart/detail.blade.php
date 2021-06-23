<?php

    $order_p_id = isset($_POST['order_p_id'])? htmlspecialchars($_POST['order_p_id'], ENT_QUOTES, 'utf-8') : '';
    $order_p_name = isset($_POST['order_p_name'])? htmlspecialchars($_POST['order_p_name'], ENT_QUOTES, 'utf-8') : '';
    $order_p_price = isset($_POST['order_p_price'])? htmlspecialchars($_POST['order_p_price'], ENT_QUOTES, 'utf-8') : '';
    $order_p_number = isset($_POST['order_p_number'])? htmlspecialchars($_POST['order_p_number'], ENT_QUOTES, 'utf-8') : '';

    session_start();

    if(isset($_SESSION['stocks'])){
        $stocks = $_SESSION['stocks'];
        foreach($stocks as $key => $stock){
            if($key == $order_p_id){ 
                $order_p_number = (int)$order_p_number + (int)$stock['order_p_number'];
            }
        }
    }

    if($order_p_id!=''&&$order_p_name!=''&&$order_p_price!=''&&$order_p_number!=''){
        $_SESSION['stocks'][$order_p_id]=[
            'order_p_name' => $order_p_name,
            'order_p_price' => $order_p_price,
            'order_p_number' => $order_p_number
        ];
    }
    $stocks = isset($_SESSION['stocks'])? $_SESSION['stocks']:[];
?>

@extends('cart/layout')
@section('title', '商品詳細')
@section('content') 
    <div class="container">
        <div class="detail">
            <img src="{{ asset('storage/upload/') }}/{{$product->image1}}" alt="{{$product->image1}}" width="180" height="180">
            <img src="{{ asset('storage/upload/') }}/{{$product->image2}}" alt="{{$product->image2}}" width="180" height="180">
            <img src="{{ asset('storage/upload/') }}/{{$product->image3}}" alt="{{$product->image3}}" width="180" height="180">
            <br>
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
            
            <form action="detail" method="post" class="item-form">
            @csrf
                <input type="hidden" name="order_p_id" value="{{ $product->p_id }}" >
                <input type="hidden" name="order_p_name" value="{{ $product->p_name }}" >
                <input type="hidden" name="order_p_price" value="{{ $product->p_price }}" >
                カート追加個数<input type="number" value="1" min="1" name="order_p_number"> 個
                    <button type="submit" class="btn-blue">カートに入れる</button>
            </form>

        <!-- フラッシュメッセージ -->
        @if (Session::has('message'))
            <div class="flashmsg">{{ session('message') }}</div>
        @endif

            <div class="btn">
                <button type="button" class="btn-gray" onclick="location.href='/cart/index'">商品一覧に戻る</button>
            </div>
        </div>
    </div>

@endsection