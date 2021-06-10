<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>
<div class="container">
<header>
    <div class="title">
        <h2>注文情報一覧</h2>
    </div>
</header> 
<body>
<main>
    <table class="manegeorder-table">
        <tr>
            <th>注文ID</th>
            <th>注文商品ID</th>
            <th>注文商品名</th>
            <th>単価 [円]</th>
            <th>注文数量</th>
            <th>合計 [円]</th>
            <th>注文日時</th>
            <th>顧客ID</th>
            <th>顧客名</th>
        </tr>
        
        @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->order_p_id }}</td>
            <td>{{ $order->order_p_name }}</td>
            <td>{{ $order->order_p_price }}</td>
            <td>{{ $order->order_p_number }}</td>
            <td>{{ $order->order_p_number*$order->order_p_price }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->customer_id }}</td>
            <td>{{ $order->c_name }}</td>
        </tr>
        @endforeach
       
    </table>
    <div class="btn">
        <button type="button" class="btn-gray" onclick="location.href='shopindex'">商品一覧に戻る</button>
    </div>
</main>
</body>
</div>
</html>
