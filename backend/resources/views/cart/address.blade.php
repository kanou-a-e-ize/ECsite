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
        <header>
        
                <h2>住所入力</h2>
            
                <ul class="menu">
                    <li>ログイン中：{{ Auth::user()->name }} さん</li>
                    <li>
                        <form action="/member/logout" method="post">
                            @csrf
                            <button type="submit">Log out</button>    
                        </form>
                    </li>
                </ul>
        </header>
        <main>
        <div class="container">
            @include('Cart/message')
            <form class="address-form" action="/cart/confirm" method="post">
                @csrf
                <div class="form-group">
                    <label for="c_name">お名前</lavel>
                    <input type="text" class="form-control" name="c_name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="c_name_kana">お名前フリガナ（全角カナ）</lavel>
                    <input type="text" class="form-control" name="c_name_kana" value="{{ Auth::user()->name_kana }}">
                </div>                         <div class="form-group">
                    <label for="c_phone">電話番号（ハイフン不要）</label>
                    <input type="text" class="form-control" name="c_phone" value="{{ Auth::user()->phone }}">
                </div>
                <div class="form-group">
                    <label for="c_mail">メールアドレス</label>
                    <input type="text" class="form-control" name="c_mail" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label for="postcode">郵便番号（ハイフン不要）</label>
                    <input type="text" class="form-control" name="postcode" value="{{ Auth::user()->postcode }}">
                </div>
                <div class="form-group">
                    <label for="address">住所</label>
                    <input type="text" class="form-control" name="address"  value="{{ Auth::user()->address }}">
                </div>
                    
                <div class="btn">
                    <button type="submit" class="btn-blue">入力情報確認へ</button>
                    <button type="button" class="btn-gray" onclick="location.href='/cart/mycart'">カート確認へ戻る</button>
                </div>
            </form>
        </div>
        </main>
    </body>
</html>
