<?php

// MySQL settings
const SERVER = "localhost";
const DB = "my_db";
const LOGIN = "root";
const PASS = "";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$connect = mysqli_connect(SERVER,LOGIN,PASS,DB);

// Variables

$goods = goodsAll($connect);
$goodsInCart = getGoodsInCart($connect);

// Functions

function getGoodsInCart($connect) {
    $sqlQuery = "SELECT goodId, title, price * count AS sum, count FROM goods INNER JOIN cart ON cart.goodId = goods.id AND userId = {$_SESSION['userId']}";
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
    switch ($action) {
        case 'addGood':
            $sqlQuery = "insert into cart values (id, " . (int)$goodId . ", 1, {$_SESSION['userId']}, 0)";
            break;
        case 'addCount':
            $sqlQuery = "update cart set count=count+1 where goodId = " . (int)$goodId;
            break;
        case 'remCount':
            $sqlQuery = "select count from cart where goodId = ". (int)$goodId;
            $answer = mysqli_query($connect, $sqlQuery);
            $count = mysqli_fetch_assoc($answer)['count'];
            if($count > 1){   
                $sqlQuery = "update cart set count=count-1 where goodId = " . (int)$goodId;    
            } else {
                $sqlQuery = "delete from cart where goodId = " . (int)$goodId;         
            }
            break;
        case 'delGood':
            $sqlQuery = "delete from cart where goodId = " . (int)$goodId;
            break;
    }
    mysqli_query($connect, $sqlQuery);

    $sqlQuery = "SELECT goodId, title, price * count AS sum, count FROM goods INNER JOIN cart ON cart.goodId = goods.id AND userId = {$_SESSION['userId']}";
    $answer = mysqli_query($connect, $sqlQuery);
    if(!$answer) {
        die(mysqli_error($connect));
    }
    while($data = mysqli_fetch_assoc($answer)) {
        $goodsInCart[] = $data;
    }
    return $goodsInCart;
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