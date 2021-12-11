<?php
include "./controllers/config.php";
if($_GET['action']) {
    cartManager($connect, $_GET['goodId'], $_GET['action']);
    header('Location: /?page=cart');
}
?>

<div>
    <?php
    if($goodsInCart) {
        $totalCart = 0;
        foreach($goodsInCart as $good):?>
            <p><strong>Товар:&nbsp;</strong><?=$good['title']?></p>
            <p><strong>Кол-во:&nbsp;</strong><?=$good['count']?></p>
            <p><strong>Цена:&nbsp;</strong><?=intval($good['sum'])/intval($good['count'])?></p>
            <p><strong>Итого:&nbsp;</strong><?=$good['sum']?></p>
            <a href="/?page=cart&goodId=<?=$good['goodId']?>&action=addCount"><button>+</button></a>
            <a href="/?page=cart&goodId=<?=$good['goodId']?>&action=remCount"><button>-</button></a>
            <a href="/?page=cart&goodId=<?=$good['goodId']?>&action=delGood"><button>Удалить</button></a>
            <br>
            <hr>
            <?php $totalCart += intval($good['sum']);?>
        <?endforeach;
        echo "<h1> Итого: $totalCart&nbsp;&#8381;.</h1><br>";
        echo "<button type='add' value='del'>Оформить заказ</button>";
    }?>
</div>
