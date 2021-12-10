<?php
    include "../admin/config.php";
    if($_GET['id']) {
        $id = (int)$_GET['id'];
    }
    $good = goodGet($connect, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title><?=$good['title']?></title>
</head>
<body>
    <header class="header">
        <div class="header__menu">
            <a href="index.php" class="header__item">Главная</a>&nbsp;
            <a href="catalog.php" class="header__item">Каталог</a>&nbsp;
            <a href="#" class="header__item">Корзина </a>&nbsp;
            <a href="#" class="header__item">Профиль </a>&nbsp;
            <a href="#" class="header__item">Админ</a>&nbsp;
        </div>
    </header>
    <br>
    <div>
        <h1><?=$good['title']?></h1>
        <a href="./img/<?=$good['image']?>"><img src="./img/thumbnails/<?=$good['image']?>" alt="<?=$good['title']?>"></a>
        <h3>Описание товара:</h3>
        <p><?=$good['spec']?></p>
        <h3>Цена:</h3>
        <p><?=$good['price']?>&nbsp;&#8381;</p>
        <h3><a class='to-cart-button' href="#" title="Добавить в корзину">Купить</a></h3>
    </div>
</body>
</html>