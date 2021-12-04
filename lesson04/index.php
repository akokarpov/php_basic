<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>photo gallery PHP</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<h1>Моя фотогалерея</h1>
<section class='photogallery container'>

<?php

$images = scandir("files/images_thumbnails");

for ($i=2; $i < count($images); $i++) { ?>
    <a href="full_image.php?file=<?=$images[$i]?>"><img width="100" src="files/images_thumbnails/<?=$images[$i]?>" alt=""></a>
<?php
}?>

</section>

<form action="server.php" method="post" enctype="multipart/form-data">
<h1>Загрузить фото</h1>
        <input type="file" accept='image/*' name='photo'><br><br>
        <input type="submit" value='Загрузить'>
    </form>

</body>
</html>