<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('product/layout')
    @section('content')
    <div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">商品一覧</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table text-center">
                <tr>
                    <th class="text-center">商品ID</th>
                    <th class="text-center">商品名</th>
                    <th class="text-center">単価（税抜）円</th>
                    <th class="text-center">削除</th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->p_id }}</td>
                    <td>{{ $product->p_name }}</td>
                    <td>{{ $product->p_price}}</td>
                
                
                    <td>
                        <form action="/product/{{ $product->p_id }}" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <div>
                <a href="create" class="btn btn-default">商品登録</a>
                <a href="manageorder" class="btn btn-default">注文一覧</a>
            </div>
        </div>
    </div>
    @endsection
</html>
