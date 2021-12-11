<?php
    include "./controllers/config.php";
    if($_GET['id']) {
        $id = (int)$_GET['id'];
    }
    $good = goodGet($connect, $id);
?>

<div>
    <h1><?=$good['title']?></h1>
    <a href="../img/<?=$good['image']?>"><img src="../img/thumbnails/<?=$good['image']?>" alt="<?=$good['title']?>"></a>
    <h3>Описание товара:</h3>
    <p><?=$good['spec']?></p>
    <h3>Цена:</h3>
    <p><?=$good['price']?>&nbsp;&#8381;</p>
    <h3><a class='to-cart-button' href="#" title="Добавить в корзину">Купить</a></h3>
</div>