<?php
include "config.php";

$sql = "select * from feedback";
$res = mysqli_query($connect, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">Главная</a>
&nbsp;
<a href="calc.php">Калькулятор</a>
&nbsp;
<a href="#">Отзывы</a><br><br>
    <form action="server.php?action=newpost" method='post'>
        <input type="text" name='username' placeholder='Ваше имя'><br>
        <textarea name="post" cols="20" rows="3" placeholder='Ваш отзыв'></textarea><br>
        <input type="submit" value="Post">
    </form>
<h1>Feedback</h1>
    <?php
        while($data = mysqli_fetch_assoc($res)) {?>
            <p style="font-size:20px"><?=$data['username']?></p>
            <p><em><?=$data['post']?></em></p>
            <p style="font-size:12px"><?=$data['date']?></p>
            <hr>
    <?php
    }?>
</body>
</html>