<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('product/layout')
    @section('content')
    <div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">注文情報一覧</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table text-center">
            <tr>
                <th class="text-center">注文ID</th>
                <th class="text-center">注文商品ID</th>
                <th class="text-center">注文商品名</th>
                <th class="text-center">単価（税抜）円</th>
                <th class="text-center">注文数量</th>
                <th class="text-center">合計（税込）円</th>
                <th class="text-center">顧客ID</th>
                <th class="text-center">顧客名</th>
            </tr>
                
            @foreach($customers as $customer)
                @foreach($customer->orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->order_p_id }}</td>
                    <td>{{ $order->order_p_name }}</td>
                    <td>{{ $order->order_p_price }}</td>
                    <td>{{ $order->order_p_number }}</td>
                    <td>{{ $order->order_p_price*$order->order_p_number*1.08 }}</td>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->c_name }}</td>
                </tr>   
                @endforeach
            @endforeach
                
            </table>
            <div>
            <a href="shopindex">商品一覧に戻る</a>
            </div>
        </div>
    </div>
    @endsection
</html>
