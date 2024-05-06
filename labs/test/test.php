<?php


$image = imageCreate(400, 400);
$color = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
imagefilledrectangle($image, 0, 0, imagesx($image), imagesy($image), $color);
imagesetthickness($image, 10);
imagepolygon($image, [100, 100, 200, 100, 150, 200], 3,  $green);
imageline($image, 0,0, 100, 100, $green);
imageline($image, 400, 0, 100, 100, $green);
imagestring($image, 5, 300, 300, 'KRUTIs', $blue);
IMG_FILTER_PIXELATE;


header("Content-type: image/jpeg");
imagejpeg($image);
imagedestroy($image);

