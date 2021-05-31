<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('product/layout')
    @section('content')
    <div class="container ops-main">
        <div class="row">
            <div class="col-md-12">
                <h3 class="ops-title">商品登録</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
             @include('Product/message')
                <form action="/post" method="post" onSubmit="return checkSubmit()" enctype="multipart/form-data">
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
                        <label for="image1">商品画像1</label>
                        <input type="file" name="image1" value="{{ $product->image1 }}" >
                    </div>
                    <div class="form-image_url">
                        <label for="image2">商品画像2</label>
                        <input type="file" name="image2" value="{{ $product->image2 }}" >
                    </div>
                    <div class="form-image_url">
                        <label for="image3">商品画像3</label>
                        <input type="file" name="image3" value="{{ $product->image3 }}" >
                    </div>

                    <br>

                    <button type="submit" class="btn btn-default">保存</button>
                    <a href="shopindex">戻る</a>
                </form>
            </div>
        </div>
    </div>
    @endsection
</div>
</html>
