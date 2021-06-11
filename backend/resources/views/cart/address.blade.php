<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Shop</title>
    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<main>
    <div class="container">
        <div class="title">
            <h2>住所入力</h2>
        </div>
            @include('Cart/message')
                <form class="address-form" action="/checkout" method="post">
                    @csrf
                    <div class="form-group">
                       <label for="c_name">お名前</lavel>
                        <input type="text" class="form-control" name="c_name">
                    </div>
                    <div class="form-group">
                        <label for="c_name_kana">お名前フリガナ（全角カナ）</lavel>
                        <input type="text" class="form-control" name="c_name_kana">
                    </div> 
                    <div class="form-group">
                        <label for="c_phone">電話番号（ハイフン不要）</label>
                        <input type="text" class="form-control" name="c_phone">
                    </div>
                    <div class="form-group">
                        <label for="c_mail">メールアドレス</label>
                        <input type="text" class="form-control" name="c_mail">
                    </div>
                    <div class="form-group">
                        <label for="postcode">郵便番号（ハイフン不要）</label>
                        <input type="text" class="form-control" name="postcode">
                    </div>
                    <div class="form-group">
                        <label for="address">住所</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                
                    <div class="btn">
                        <button type="submit" class="btn-blue">注文確定</button>
                    </div>
                </form>
    </div>
</main>
</body>
</html>
