<?php
    $c_name = isset($_POST['c_name'])? htmlspecialchars($_POST['c_name'],ENT_QUOTES,'utf-8'):'';
    $c_name_kana = isset($_POST['c_name_kana'])? htmlspecialchars($_POST['c_name_kana'],ENT_QUOTES,'utf-8'):'';
    $c_phone = isset($_POST['c_phone'])? htmlspecialchars($_POST['c_phone'],ENT_QUOTES,'utf-8'):'';
    $c_mail = isset($_POST['c_mail'])? htmlspecialchars($_POST['c_mail'],ENT_QUOTES,'utf-8'):'';
    $postcode = isset($_POST['postcode'])? htmlspecialchars($_POST['postcode'],ENT_QUOTES,'utf-8'):'';
    $address = isset($_POST['address'])? htmlspecialchars($_POST['address'],ENT_QUOTES,'utf-8'):'';

    session_start();

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
    <header>
    
            <h2>入力情報確認</h2>
           
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
            <table class="confirm-table">
                <caption>カート商品情報</caption>
                    
                    <tr>
                        <th>商品名</th>
                        <th>単価</th>
                        <th>個数</th>
                        <th>小計</th>
                    </tr>
                    
                    <?php foreach($stocks as $order_p_id => $stock): ?>
                    <tr>
                        <td><?php echo $stock['order_p_name']; ?></td>
                        <td label="価格：">¥<?php echo $stock['order_p_price']; ?></td>
                        <td label="個数："><?php echo $stock['order_p_number']; ?></td>
                        <td label="小計：">¥<?php echo $stock['order_p_price']*$stock['order_p_number']; ?></td>   
                    </tr>
                    <?php endforeach; ?>
                    <tr class="confirm-total">
                        <th colspan="3">合計</th>
                        <td colspan="2">¥<?php echo $total; ?></td>
                    </tr>  
            </table>
            <br>
            @include('Cart/message')
            <form class="address-form" action="/cart/checkout" method="post">
                @csrf
                <div class="subtitle">
                    <p>お客さま情報</p>
                </div>
                <div class="form-group">
                    <p class="form-title">お名前</lavel>
                    <p><?php echo $c_name; ?></p>
                    <input type="hidden" name="c_name" value="<?php echo $c_name; ?>">
                </div>
                <div class="form-group">
                    <p class="form-title">お名前フリガナ（全角カナ）</lavel>                        
                    <p><?php echo $c_name_kana; ?></p>
                    <input type="hidden" name="c_name_kana" value="<?php echo $c_name_kana; ?>">
                </div> 
                <div class="form-group">
                    <p class="form-title">電話番号（ハイフン不要）</label>                        
                    <p><?php echo $c_phone; ?></p>
                    <input type="hidden" name="c_phone" value="<?php echo $c_phone; ?>">
                </div>
                <div class="form-group">
                    <p class="form-title">メールアドレス</label>                        
                    <p><?php echo $c_mail; ?></p>
                    <input type="hidden" name="c_mail" value="<?php echo $c_mail; ?>">
                </div>
                <div class="form-group">
                    <p class="form-title">郵便番号（ハイフン不要）</label>                        
                    <p><?php echo $postcode; ?></p>
                <input type="hidden" name="postcode" value="<?php echo $postcode; ?>">
                </div>
                <div class="form-group">
                    <p class="form-title">住所</label>
                    <p><?php echo $address; ?></p>
                    <input type="hidden" name="address" value="<?php echo $address; ?>">
                </div>
                
                <div class="btn">
                    <button type="submit" class="btn-blue">注文確定</button>
                </div>
            </form>
        </div>
            <div class="btn">
                <button type="button" class="btn-gray" onclick="location.href='/cart/address'">修正する</button>
            </div>
    </main>
    </body>
</html>
