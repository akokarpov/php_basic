<?php

$menu = [
    "Главная"=>"/",
    "Каталог"=>"?page=catalog",
    "Фото"=>"?page=gallery",
];

$menuNonAuthed = [
    "Войти"=>"?page=auth",
];

$menuAuthed = [
    "Корзина"=>"?page=cart",
    "Отзывы" => "?page=feedback",
    "Кабинет"=>"?page=profile",
    "Выйти"=>"?page=exit",
];

$menuAdmin = [
    "Администратор"=>"?page=admin",
];

switch ($_SESSION['userId']) {
    case false:
        $menu = array_merge($menu, $menuNonAuthed);
        break;
    case '1':
        $menu = array_merge($menuAdmin, $menu, $menuAuthed);
        break;
    default:
        $menu = array_merge($menu, $menuAuthed);
        break;
};

$list = "<ul>";
foreach($menu as $title => $link):
    $list .= "<li><a class='menu-item-hover' title='$title' href='$link'>$title</li>";
endforeach;
$list .= "</ul>";

?>

<?=$list?>
<a href=""></a>