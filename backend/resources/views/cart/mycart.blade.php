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
                <h2>MY CART</h2>
                <p>カート</p>
            </div>
            <?php if(empty($stocks)){ ?>
                <div class="notcart">カートに商品がありません...!</div>
            <?php }else{ ?>
            <div class="cartlist">
            <form action="/cart/address" method="post">
            @csrf
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>商品名</th>
                            <th>価格</th>
                            <th>個数</th>
                            <th>小計</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php foreach($stocks as $order_p_id => $stock): ?>
                            <tr>
                                <td label="商品名" class="text-right"><?php echo $stock['order_p_name']; ?></td>
                                <td label="価格：" class="text-right">¥<?php echo $stock['order_p_price']; ?></td>
                                <td label="個数：" class="text-right"><?php echo $stock['order_p_number']; ?></td>
                                <td label="小計：" class="text-right">¥<?php echo $stock['order_p_price']*$stock['order_p_number']; ?></td>
                                <input type="hidden" name="order_p_id" value="<?php echo $order_p_id; ?>">
                                <input type="hidden" name="order_p_name" value="<?php echo $stock['order_p_name']; ?>">
                                <input type="hidden" name="order_p_price" value="<?php echo $stock['order_p_price']; ?>">
                                <input type="hidden" name="order_p_number" value="<?php echo $stock['order_p_number']; ?>">    
                                    
                                <td>
                                <form action="mycart" method="post">
                                @csrf
                                    <input type="hidden" name="delete_p_id" value="<?php echo $order_p_id; ?>">
                                <button type="submit" class="btn btn-red">削除</button>
                                </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <tr class="total">
                                <th colspan="3">合計</th>
                                <td colspan="2">¥<?php echo $total; ?></td>
                            </tr>  
                    </tbody>
                </table>
                <br>
                <div class="cart-btn">
                    <button type="submit" class="btn btn-blue">住所入力</button>
                </div>
            </form> 
                
            </div>
            <?php } ?>
            
            <div class="cart-btn">
                <button type="button" class="btn btn-gray" onclick="location.href='/cart'">商品一覧に戻る</button>
            </div>
            
        </div>
    </main>
</body>
</html>