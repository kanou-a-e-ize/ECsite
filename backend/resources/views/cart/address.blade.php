@extends('cart/layout')
@section('title', '住所入力')
@section('content') 

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
            </div>                         
            <div class="form-group">
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
                <button type="submit" class="btn-green">入力情報確認へ</button>
            </div>
        </form>
    </div>
        <div class="btn">
            <button type="button" class="btn-gray" onclick="location.href='/cart/mycart'">カート確認へ戻る</button>
        </div>

@endsection