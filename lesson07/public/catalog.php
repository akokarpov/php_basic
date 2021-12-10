<?php
    include "../admin/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="header">
        <div class="header__menu">
            <a href="index.php" class="header__item">Главная</a>&nbsp;
            <a href="#" class="header__item">Каталог</a>&nbsp;
            <a href="#" class="header__item">Корзина </a>&nbsp;
            <a href="#" class="header__item">Профиль </a>&nbsp;
            <a href="#" class="header__item">Админ</a>&nbsp;
        </div>
    </header>
    <main>
        <section class="catalog flexcontainer">
            <?php
            if($goods) {
                foreach($goods as $good):?>
                    <div class="catalog__item flexcontainer">
                        <a href="item.php?id=<?=$good['id']?>"><img src="./img/thumbnails/<?=$good['image']?>" alt="<?=$good['image']?>"></a>
                        <h4><a href="item.php?id=<?=$good['id']?>"><?=$good['title']?></a></h4>
                        <br>
                        <p><?=$good['price']?>&nbsp;&#8381;</p>
                        <br>
                        <p><a class='to-cart-button' href="#" title="Добавить в корзину">Купить</a></p>
                    </div>
                <?endforeach;
            }?> 
        </section>
    </main>
    <footer class="footer footer__container">
        <div class="footer">
            <ul>
                <li><a href="yandex.ru">Yandex</a></li>
                <li><a href="google.com">Google</a></li>
            </ul>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, saepe! Ad tenetur, non illo sunt consectetur, quae dolore doloribus quod tempora voluptates consequuntur debitis quas praesentium quibusdam ducimus quisquam vitae.</p>
            &copy; 2021 All rights reserved.
        </div>
    </footer>
</body>
</html>