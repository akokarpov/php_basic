<?php

// print_r($_FILES);
$path_fullscale = "files/images_fullscale/{$_FILES['photo']['name']}";
$path_thumbnail = "files/images_thumbnails/{$_FILES['photo']['name']}";

if(move_uploaded_file($_FILES['photo']['tmp_name'], $path_fullscale)) {

    // Set a maximum height and width
    $width = 100;
    $height = 100;

    // Content type
    header('Content-Type: image/jpeg');

    // Get new dimensions
    list($width_orig, $height_orig) = getimagesize($path_fullscale);

    $ratio_orig = $width_orig/$height_orig;

    if ($width/$height > $ratio_orig) {
    $width = $height*$ratio_orig;
    } else {
    $height = $width/$ratio_orig;
    }

    // Resample
    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg($path_fullscale);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

    // Output
    imagejpeg($image_p, $path_thumbnail);

    // Update header
    header("Location: index.php");
}

?>