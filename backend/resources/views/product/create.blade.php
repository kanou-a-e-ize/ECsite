<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Shop</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
</head>
<div class="container">
<header>
    <div class="title">
        <h2>商品登録</h2>
    </div>
    <div class="shopindex-btn">
        <button type="button" class="btn-gray" onclick="location.href='shopindex'">商品一覧に戻る</button>
    </div>
</header> 
<body>
<main>
    @include('Product/message')
        <form class="create-form" action="store" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="p_name">商品名</label>
                <input type="text" class="form-control" name="p_name" value="{{ $product->p_name }}">
            </div>
            <div class="form-group">
                <label for="p_detail">商品説明</label>
                <input type="text" class="form-control" name="p_detail" value="{{ $product->p_detail }}">
            </div>
            <div class="form-group">
                <label for="p_price">単価（税抜）円</label>
                <input type="text" class="form-control" name="p_price" value="{{ $product->p_price }}">
            </div>
            <div class="form-image_url">
                <label for="image1">商品画像1</label><br>
                <input type="file" name="image1" value="{{ $product->image1 }}" >
            </div>
            <div class="form-image_url">
                <label for="image2">商品画像2</label><br>
                <input type="file" name="image2" value="{{ $product->image2 }}" >
            </div>
            <div class="form-image_url">
                <label for="image3">商品画像3</label><br>
                <input type="file" name="image3" value="{{ $product->image3 }}" >
            </div>
            <div class="btn">
                <button type="submit" class="btn-blue">保存</button>
            </div> 
        </form>
</main >
</body>
</div>
</html>
