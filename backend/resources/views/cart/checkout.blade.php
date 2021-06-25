<?php
    $c_name = isset($_POST['c_name'])? htmlspecialchars($_POST['c_name'],ENT_QUOTES,'utf-8'):'';
    $c_name_kana = isset($_POST['c_name_kana'])? htmlspecialchars($_POST['c_name_kana'],ENT_QUOTES,'utf-8'):'';
    $c_phone = isset($_POST['c_phone'])? htmlspecialchars($_POST['c_phone'],ENT_QUOTES,'utf-8'):'';
    $c_mail = isset($_POST['c_mail'])? htmlspecialchars($_POST['c_mail'],ENT_QUOTES,'utf-8'):'';
    $postcode = isset($_POST['postcode'])? htmlspecialchars($_POST['postcode'],ENT_QUOTES,'utf-8'):'';
    $address = isset($_POST['address'])? htmlspecialchars($_POST['address'],ENT_QUOTES,'utf-8'):'';

    session_start();
    $stocks = isset($_SESSION['stocks'])? $_SESSION['stocks']:[];

    try{
        $dbh = new PDO("mysql:host=db;dbname=laravel_local;charset=utf8mb4;","phper","secret");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }
    
    //customersテーブル
    $stmt1 = $dbh->prepare("INSERT INTO customers(c_name,c_name_kana,c_phone,c_mail,postcode,address,created_at,updated_at) VALUES(:c_name,:c_name_kana,:c_phone,:c_mail,:postcode,:address,now(),now())");
    $stmt1->bindParam(':c_name',$c_name);
    $stmt1->bindParam(':c_name_kana',$c_name_kana);
    $stmt1->bindParam(':c_phone',$c_phone);
    $stmt1->bindParam(':c_mail',$c_mail);
    $stmt1->bindParam(':postcode',$postcode);
    $stmt1->bindParam(':address',$address);
    $stmt1->execute();

    //customersのid取得
    $customer_id = $dbh->lastInsertId();

    //ordersテーブル
    foreach($stocks as $key => $stock){
            $stmt2 = $dbh->prepare("INSERT INTO orders(customer_id,order_p_id,order_p_name,order_p_price,order_p_number,created_at,updated_at) VALUES(:customer_id,:order_p_id,:order_p_name,:order_p_price,:order_p_number,now(),now())");
            $stmt2->bindParam(':customer_id',$customer_id);
            $stmt2->bindParam(':order_p_id',$key);
            $stmt2->bindParam(':order_p_name',$stock['order_p_name']);
            $stmt2->bindParam(':order_p_price',$stock['order_p_price']);
            $stmt2->bindParam(':order_p_number',$stock['order_p_number']);
            $stmt2->execute();
        }
    
    unset($_SESSION['stocks']);

 ?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome Shop</title>
        <!-- css -->
        <link rel="stylesheet" href="{{ asset('css/style_cart.css') }}">
    </head>
    <body>
    <main>
        <div class="container">
            <div class="thanks">
                <h2>注文完了</h2>
                <h3>ご注文ありがとうございました!</h3>
                <div class="btn">
                    <button type="button" class="btn-gray" onclick="location.href='/cart/index'">TOPページに戻る</button>
                </div>
            </div>
        </div>
    </main>
    </body>
</html>