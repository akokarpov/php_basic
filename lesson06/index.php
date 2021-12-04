<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>photo gallery PHP with MySLQ</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    
<?php
include "config.php";

$sql = "select * from photos";
$res = mysqli_query($connect, $sql);
?>

<a href="#">Главная</a>
&nbsp;
<a href="calc.php">Калькулятор</a>
&nbsp;
<a href="feedback.php">Отзывы</a>

<h1>My gallery</h1>
<div class="container">
    <?php
    while($data = mysqli_fetch_assoc($res)) {?>
        <div class="image_container">
            <a href="full_image.php?file=<?=$data['filename']?>&path=<?=$data['path_fullscale']?>">
                <img width="100" src="<?=$data['path_thumbnails']?><?=$data['filename']?>" alt="">
            </a>
            <a href="server.php?action=delete&id=<?=$data['id']?>"><button class="del_button">🗑️</button></a>
        </div>
    <?php
    }?>
</div>

<h1>Upload a new photo</h1>
<form action="server.php?action=add" method="post" enctype="multipart/form-data">
    <input type="file" accept='image/*' name='photo'><br><br>
    <input type="submit" value='Upload'>
</form>

</body>
</html>