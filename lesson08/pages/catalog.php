<?php include "controllers/config.php";



?>

<div claSs='flexcontainer'>
    <?php
    if($goods) {
        foreach($goods as $good):?>
            <div class="catalog__item">
                <a href="?page=item&id=<?=$good['id']?>"><img src="../img/thumbnails/<?=$good['image']?>" alt="<?=$good['image']?>"></a>
                <h4><a href="?page=item&id=<?=$good['id']?>"><?=$good['title']?></a></h4>
                <p><?=$good['price']?>&nbsp;&#8381;</p>
                <p><a class='to-cart-button' href="#" title="Добавить в корзину">Купить</a></p>
            </div>
        <?endforeach;
    }?>
</div>