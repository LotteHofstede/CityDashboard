<?php
$in_filename = $_GET['url'];

list($width, $height) = getimagesize($in_filename);

$offset_x = 0;
$offset_y = 0;

$new_height = $height - 50;
$new_width = $width;

$image = imagecreatefromjpeg($in_filename);
$new_image = imagecreatetruecolor($new_width, $new_height);
imagecopy($new_image, $image, 0, 0, $offset_x, $offset_y, $width, $height);

header('Content-Type: image/jpeg');
imagejpeg($new_image);
?>