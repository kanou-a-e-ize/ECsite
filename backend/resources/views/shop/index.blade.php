@extends('shop/layout')
@section('title', '商品一覧')
@section('content')

    <div class="container">
        <table class="product-table">
            <tr>
                <th>商品ID</th>
                <th>商品名</th>
                <th>単価</th>
                <th>詳細</th>
                <th>削除</th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->p_id }}</td>
                <td>{{ $product->p_name }}</td>
                <td>¥{{ $product->p_price}}</td>
                <td>
                    <button type="button" class="btn-green" onclick="location.href='/shop/{{ $product->p_id }}/detail'">詳細</button>             
                </td>
                <td>
                    <form action="/product/{{ $product->p_id }}" method="post">
                        @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn-red">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div class="btn">
            <button type="button" class="btn-blue" onclick="location.href='create'">商品登録</button>
            <button type="button" class="btn-blue" onclick="location.href='manageorder'">注文一覧</button>
        </div>
    </div>

@endsection
