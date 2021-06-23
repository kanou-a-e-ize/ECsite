@extends('shop/layout')
@section('title', '注文情報一覧')
@section('content')       

    <div class="container">
        <table class="manegeorder-table">
            <tr>
                <th>注文ID</th>
                <th>注文商品ID</th>
                <th>注文商品名</th>
                <th>単価</th>
                <th>注文数量</th>
                <th>合計</th>
                <th>注文日時</th>
                <th>顧客ID</th>
                <th>顧客名</th>
            </tr> 
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_p_id }}</td>
                <td>{{ $order->order_p_name }}</td>
                <td>¥{{ $order->order_p_price }}</td>
                <td>{{ $order->order_p_number }}</td>
                <td>¥{{ $order->order_p_number*$order->order_p_price }}</td>
                <td>{{ $order->created_at }}</td>
                <td><a href='/customer/{{ $order->customer_id }}/info'>{{ $order->customer_id }}</a></td>
                <td>{{ $order->c_name }}</td>
            </tr>
            @endforeach    
        </table>
        <div class="btn">
            <button type="button" class="btn-gray" onclick="location.href='index'">商品一覧に戻る</button>
        </div>
    </div>
    
@endsection