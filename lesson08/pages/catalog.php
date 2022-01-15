<?php
include "controllers/config.php";

if($_GET['action'] == 'addGood') {
    if($_SESSION['userId']) {
        $message = cartManager($connect, $_GET['goodId'], $_GET['action']);
    echo $message;
    }else{
        header("Location: /?page=auth");
    }
    
} elseif($_GET['action'] == 'delGood'){
    goodManager($connect, $_GET['goodId']);
}

if($_GET['status'] == 'goodDeleted') {
    echo "<h1 style='color:darkgreen'>Товар удален из каталога админом!</h1>";
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
                <?php
                if($_SESSION['admin'] == true):
                ?>
                <a href="/?page=catalog&goodId=<?=$good['id']?>&action=delGood"><button>Удалить из каталога</button></a>
                <?php
                endif;
                ?>
            </div>
        <?endforeach;
    }?>
</div>