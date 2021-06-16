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
                <h2>商品一覧</h2>
            </div>

            <div class="productlist">
                <table class="product-table">
                    <tr>
                        <th>商品ID</th>
                        <th>商品名</th>
                        <th>単価</th>
                        <th>削除</th>
                    </tr>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->p_id }}</td>
                        <td>{{ $product->p_name }}</td>
                        <td>¥{{ $product->p_price}}</td>                
                        
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
                    <button type="button" class="btn-orange" onclick="location.href='create'">商品登録</button>
                    <button type="button" class="btn-orange" onclick="location.href='manageorder'">注文一覧</button>
                </div>
            </div>
        </div>
    </main>
    </body>
</html>
