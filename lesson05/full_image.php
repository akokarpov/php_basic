
<?php
include "config.php";
$query = "SELECT counter_views FROM photos WHERE filename='{$_GET['file']}'";
    if(mysqli_query($connect,$query)) {
        $res = mysqli_query($connect,$query);
        $current_count = mysqli_fetch_array($res)[0];
        $query_count = "UPDATE photos SET counter_views = $current_count+1 WHERE filename='{$_GET['file']}'";
        mysqli_query($connect,$query_count);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <img width="640" src="<?=$_GET['path'] ?><?=$_GET['file']?>" alt=""><br>
    <a href="<?=$_SERVER['HTTP_REFERER']?>">Вернуться назад</a>

</body>
</html>