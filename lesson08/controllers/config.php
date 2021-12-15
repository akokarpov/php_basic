<?php

// MySQL settings
const SERVER = "localhost";
const DB = "my_db";
const LOGIN = "root";
const PASS = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect = mysqli_connect(SERVER,LOGIN,PASS,DB);

// Functions

function getGoodsInCart($connect, $status=0) {
    $sqlQuery = "SELECT goodId, title, price * count AS sum, count FROM goods
    INNER JOIN cart ON cart.goodId = goods.id
    AND userId = {$_SESSION['userId']} AND status = {$status}";
    $answer = mysqli_query($connect, $sqlQuery);
    if(!$answer) {
        die(mysqli_error($connect));
    }
    while($data = mysqli_fetch_assoc($answer)) {
        $goodsInCart[] = $data;
    }
    return $goodsInCart;
}

function cartManager($connect, $goodId, $action) {
    $goodId = (int)$goodId;
    $message = "";
    switch ($action) {
        case 'addGood':
            $sqlQuery = "select id from cart where goodId = $goodId and userId = {$_SESSION['userId']} and status = 0";
            $answer = mysqli_query($connect, $sqlQuery);
            $goodInCart = mysqli_fetch_assoc($answer)['id'];
            if($goodInCart == null) {
                $sqlQuery = "insert into cart values (id, $goodId, 1, {$_SESSION['userId']}, 0)";
                $message .= "<h1 style='color: darkgreen'>Товар успешно добавлен в корзину!</h1><br>";
            } else {
                $sqlQuery = "update cart set count=count+1 where goodId = $goodId";
                $message .= "<h1 style='color: darkgreen'>Товар был в корзине! Добавили еще одну единицу!</h1><br>";
            }
            break;
        case 'delGood':
            $sqlQuery = "delete from cart where goodId = $goodId and userId = {$_SESSION['userId']}";
            break;
        case 'addCount':
            $sqlQuery = "update cart set count=count+1 where goodId = $goodId and userId = {$_SESSION['userId']}";
            break;
        case 'remCount':
            $sqlQuery = "select count from cart where goodId = $goodId and userId = {$_SESSION['userId']}";
            $answer = mysqli_query($connect, $sqlQuery);
            $count = mysqli_fetch_assoc($answer)['count'];
            if($count > 1){   
                $sqlQuery = "update cart set count=count-1 where goodId = $goodId and userId = {$_SESSION['userId']}";    
            } else {
                $sqlQuery = "delete from cart where goodId = $goodId and userId = {$_SESSION['userId']}";         
            }
            break;
    }
    mysqli_query($connect, $sqlQuery);
    return $message;
}

function goodsAll($connect) {
    $sqlQuery = "select * from goods order by id desc";
    $answer = mysqli_query($connect, $sqlQuery);
    if(!$answer) {
        die(mysqli_error($connect));
    }
    while($data = mysqli_fetch_assoc($answer)) {
        $goods[] = $data;
    }
    return $goods;
}

function goodGet($connect, $id){
    $sqlQuery = sprintf("select * from goods where id=%d", $id);
    $answer = mysqli_query($connect, $sqlQuery);
    if(!$answer) {
        die(mysqli_error($connect));
    }
    $good = mysqli_fetch_assoc($answer); 
    return $good;
}

?>