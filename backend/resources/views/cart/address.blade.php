<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('cart/layout')
    @section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">住所入力</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
             @include('Product/message')
                <form action="/post" method="post" onSubmit="return checkSubmit()" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="c_name">お名前</label>

                    </div>
                    <div class="form-group">
                        <label for="c_name_kana">お名前（フリガナ）</label>
    
                    </div>
                    <div class="form-group">
                        <label for="postcode">郵便番号</label>
                        
                    </div>
                    <div class="form-group">
                        <label for="prefecture">都道府県</label>
                        
                    </div>
                    <div class="form-group">
                        <label for="city">市区町村</label>
                        
                    </div>
                    <div class="form-group">
                        <label for="street">それ以降の住所</label>
                       
                    </div>
                    <div class="form-group">
                        <label for="c_phone">それ以降の住所</label>
                        
                    </div>
                    <div class="form-group">
                        <label for="c_mail">メールアドレス</label>
                       
                    </div>

                    <br>

                    <button type="submit" class="btn btn-default">注文確定</button>
                    <a href="/cart">商品一覧に戻る</a>
                </form>
            </div>
        </div>
    </div>
    @endsection
</div>
</html>
