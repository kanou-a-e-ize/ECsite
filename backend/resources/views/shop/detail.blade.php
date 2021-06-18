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
<body>
    <main>
        <div class="container">
            <div class="title">
                <h2>商品詳細</h2>
            </div>

            <div class="product-detail">
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
                <div class="btn">
                    <button type="button" class="btn-gray" onclick="location.href='/index'">商品一覧に戻る</button>
                </div>
        
            </div>
        </div>
    </main>
    </body>
</html>
