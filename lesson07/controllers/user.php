<?php
session_start();

include "config.php";
$errors = "";

$login = !empty($_POST['login']) ? strip_tags($_POST['login']) : $errors .= "Не указан логин!<br>";
$password = !empty($_POST['password']) ? md5(strip_tags($_POST['password'])) : $errors .= "Не указан пароль!<br>";

// Войти
if($_POST['signIn']){
    if(!empty($errors)){
        header("Location: /?page=auth&errors_reg=$errors");
    } else {
        $sqlQuery = "select id, username, admin from users where login='$login' and password='$password'";
        $res = mysqli_query($connect, $sqlQuery);
        $data = mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res) > 0) {
            $_SESSION['userId'] = $data['id'];
            $_SESSION['userName'] = $data['username'];
            if($data['admin'] == 1) {
                $_SESSION['admin'] = true;
                header("Location: /?page=admin&success_auth=true");
            } else {
                header("Location: /?page=profile&success_auth=true");
            }
        } else {
            header("Location: /?page=auth&noUser=true");
        }
    }
}

// Регистрация
if(isset($_POST['reg'])) {
    $username =  !empty($_POST['username']) ? strip_tags($_POST['fio']) : $errors .= "Поле ФИО должно быть заполнено!<br>";

    $phone =  !empty($_POST['phone']) ? strip_tags($_POST['phone']) : $errors .= "Поле Телефон должно быть заполнено!<br>";

    $address =  !empty($_POST['address']) ? strip_tags($_POST['address']) : $errors .= "Поле Адрес должно быть заполнено!<br>";

    if(!empty($errors)){
        header("Location: /?page=reg&errors_reg=$errors");
    }
    else{

        $sql = "insert into users(fio,phone,address,login,pass) values('$fio','$phone','$address','$login','$pass')";

        $res = mysqli_query($connect,$sql);
        if($res){
            header("Location: /?page=reg&success_reg=true");
        }
    }
}