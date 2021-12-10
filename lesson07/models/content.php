<?php
    switch($_GET['page']){
        case '':
            include "pages/about_us.php";
            break;
        case 'catalog':
            include "pages/catalog.php";
            break;
        case 'item':
            include "pages/item.php";
            break;
        case 'auth':
            include "pages/auth.php";
            break;
        case 'exit':
            session_destroy();
            header("Location: /");
            // unset($_SESSION['user_id']);
            // $_SESSION = null;
            break;
        case 'profile':
            include "pages/profile.php";
            break;
        case 'admin':
            include "pages/admin.php";
            break;
            
    //      case 'add_good':
    //          include "pages/admin/add_good.php";
    //          break;
    //     case 'edit_good':
    //         include "pages/admin/edit_good.php";
    //         break;
    //      case 'prices':
    //         include "pages/prices.php";
    //         break;
    //    case 'reg':
    //         include "pages/reg.php";
    //         break;
    //    case 'details_order':
    //        include "pages/admin/detail_order.php";
    //        break;
    //    case 'cart':
    //         include "pages/cart.php";
    //         break;
       
            
    //    case 'edit_orders':
    //        include "pages/admin/orders.php";
    //        break;
    //    case 'exit':
    //        unset($_SESSION['user_id']);
    //        session_destroy();
    //        $_SESSION = null;
          
            
    //         echo "Вы успешно вышли из системы<br>";
    //         echo "<a href='index.php'>Перейти на главную</a>";
    //         break;
    //     default:
    //         include "pages/prices.php";
    }
?>