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
                    <th class="text-center">単価（税抜）</th>
                    <th class="text-center">注文数量</th>
                    <th class="text-center">合計金額</th>
                    <th class="text-center">顧客ID</th>
                    <th class="text-center">顧客名</th>
                </tr>
                @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->c_id }}</td>
                    <td>{{ $customer->c_p_id }}</td>
                    <td>{{ $customer->c_p_name }}</td>
                    <td>{{ $customer->c_p_price }}</td>
                    <td>{{ $customer->c_p_number }}</td>
                    <td>{{ $customer->c_p_price*$customer->c_p_number }}</td>
                    <td>{{ $customer->c_id }}</td>
                    <td>{{ $customer->c_name }}</td>
                </tr>
                @endforeach
            </table>
            <div>
            <a href="shopindex">商品一覧に戻る</a>
            </div>
        </div>
    </div>
    @endsection
</html>
