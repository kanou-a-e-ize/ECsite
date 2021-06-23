<?php
    $delete_p_id = isset($_POST['delete_p_id'])? htmlspecialchars($_POST['delete_p_id'], ENT_QUOTES, 'utf-8') : '';
     
    session_start();

    if($delete_p_id != '') unset($_SESSION['stocks'][$delete_p_id]);

    $total = 0;

    $stocks = isset($_SESSION['stocks'])? $_SESSION['stocks']:[];

    foreach($stocks as $stock){
        $subtotal = (int)$stock['order_p_price']*(int)$stock['order_p_number'];
        $total += $subtotal;
    }
?>


@extends('cart/layout')
@section('title', 'MY CART')
@section('content') 

    <div class="container">    
        <?php if(empty($stocks)){ ?>
            <div class="notcart">カートに商品がありません...!</div>
        <?php }else{ ?>
            
        <div class="cartlist">
            <table class="cart-table">
                <tr>
                    <th>商品名</th>
                    <th>単価</th>
                    <th>個数</th>
                    <th>小計</th>
                    <th>削除</th>
                </tr>
                            
                <?php foreach($stocks as $order_p_id => $stock): ?>
                <tr>
                    <td><?php echo $stock['order_p_name']; ?></td>
                    <td label="価格：">¥<?php echo $stock['order_p_price']; ?></td>
                    <td label="個数："><?php echo $stock['order_p_number']; ?></td>
                    <td label="小計：">¥<?php echo $stock['order_p_price']*$stock['order_p_number']; ?></td>   
                    <td>
                        <form action="mycart" method="post">
                        @csrf
                            <input type="hidden" name="delete_p_id" value="<?php echo $order_p_id; ?>">
                            <button type="submit" class="btn-red">削除</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr class="total">
                    <th colspan="3">合計</th>
                    <td colspan="2">¥<?php echo $total; ?></td>
                </tr>  
            </table>
            <div class="btn">
                <button type="submit" class="btn-green" onclick="location.href='/cart/address'">住所入力</button>
            </div>     
        </div>
        <?php } ?>
            
        <div class="btn">
            <button type="button" class="btn-gray" onclick="location.href='/cart/index'">商品一覧に戻る</button>
        </div>
    </div>

@endsection