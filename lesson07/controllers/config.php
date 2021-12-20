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

// Functions

function goodsAll($connect) {
    $query = "select * from goods order by id desc";
    $answer = mysqli_query($connect, $query);
    if(!$answer) {
        die(mysqli_error($connect));
    }
    while($data = mysqli_fetch_assoc($answer)) {
        $goods[] = $data;
    }
    return $goods;
}

function goodGet($connect, $id){
    $query = sprintf("select * from goods where id=%d", $id);
    $answer = mysqli_query($connect, $query);
    if(!$answer) {
        die(mysqli_error($connect));
    }
    $good = mysqli_fetch_assoc($answer); 
    return $good;
}

?>