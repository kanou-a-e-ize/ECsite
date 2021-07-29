@extends('shop/layout')
@section('title', '注文者情報')
@section('content')       

    <div class="container-manageorder">
        <table class="manegeorder-table">
            <tr>
                <th>顧客ID</th>
                <th>顧客名</th>
                <th>顧客名（フリガナ）</th>
                <th>電話番号</th>
                <th>メールアドレス</th>
                <th>郵便番号</th>
                <th>住所</th>
            </tr>
            <tr>
                <td>{{ $customer->id }}</td>
                <td>{{ $customer->c_name }}</td>
                <td>{{ $customer->c_name_kana }}</td>
                <td>{{ $customer->c_phone }}</td>
                <td>{{ $customer->c_mail }}</td>
                <td>{{ $customer->postcode }}</td>
                <td>{{ $customer->address }}</td>
            </tr>
        </table>
            <button type="button" class="btn-gray2" onclick="location.href='/manageorder'">注文一覧に戻る</button>
        
    </div>
    
@endsection