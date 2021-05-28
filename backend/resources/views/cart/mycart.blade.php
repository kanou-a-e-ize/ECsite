<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @extends('cart/layout')
    @section('content')
    <div class="container ops-main">
    <div class="row">
        <div class="col-md-12">
            <h3 class="ops-title">カート確認</h3>
        </div>
    </div>

    @if($carts->isNotEmpty())
        @foreach($carts as $cart)
            <div class="col-md-11 col-md-offset-1">
            <table class="table text-center">
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">商品名</th>
                    <th class="text-center">数量</th>
                    <th class="text-center">単価（税抜）円</th>
                    <th class="text-center">削除</th>
                </tr>
                    <td>{{ $cart->stock_id }}</td>
                </tr>

                <td>
                    <form action="/cart/{{ $product->p_id }}" method="post">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-xs btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-trash"></span></button>
                    </form>
                </td>
            </table>
            </div>
        @endforeach

    @else
    <p class="text-center">カートはからっぽです。</p>
    @endif
        </table>
    </div> 

    @endsection
</html>