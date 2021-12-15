<?php include "controllers/config.php";
if($_GET['action']) {
    $message = cartManager($connect, $_GET['goodId'], $_GET['action']);
    echo $message;
}
$goods = goodsAll($connect);
?>

<div claSs='flexcontainer'>
    <?php
    if($goods) {
        foreach($goods as $good):?>
            <div class="catalog__item">
                <a href="?page=item&id=<?=$good['id']?>"><img src="../img/thumbnails/<?=$good['image']?>" alt="<?=$good['image']?>"></a>
                <h4><a href="?page=item&id=<?=$good['id']?>"><?=$good['title']?></a></h4>
                <p><?=$good['price']?>&nbsp;&#8381;</p>
                <a href="/?page=catalog&goodId=<?=$good['id']?>&action=addGood"><button>Купить</button></a>
            </div>
        <?endforeach;
    }?>
</div>