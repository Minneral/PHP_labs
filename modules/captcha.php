<?php

$letters = 'ABCDEFGKIJKLMNOPQRSTUVWXYZ!!!+++---';
$caplen = 6;
$width = 200;
$height = 60;
$font = __DIR__ . '\..\fonts\MontserratRegular.ttf';
$fontsize = 17;
$im = imagecreatetruecolor($width, $height);
imagesavealpha($im, true);
$bg = imagecolorallocatealpha($im, 0, 0, 0, 127);

for ($i = 0; $i < $width; $i++) {

    for ($j = 0; $j < $height; $j++) {
        $color = imageColorAllocate(
            $im,
            mt_rand(200, 255),
            mt_rand(200, 255),
            mt_rand(200, 255)
        );
        imageSetPixel($im, $i, $j, $color);
    }
}

// Случайные линии под текстом
$linenum = rand(3, 7);
for ($i = 0; $i < $linenum; $i++) {
    $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
    imageline($im, rand(0, 10), rand(1, 60), rand(160, 200), rand(1, 60), $color);
}
//формирование текста капчи
$captcha = '';
for ($i = 0; $i < $caplen; $i++) {
    $captcha .= $letters[rand(0, strlen($letters) - 1)];
    $x = ($width - 20) / $caplen * $i + 10;
    $x = rand($x, $x + 4);
    $y = $height - (($height - $fontsize) / 2);
    $curcolor = imagecolorallocate($im, rand(0, 100), rand(0, 100), rand(0, 100));
    $angle = rand(-25, 25);
    imagettftext($im, $fontsize, $angle, $x, $y, $curcolor, $font, $captcha[$i]);
}
// Опять линии, уже сверху текста
$linenum = rand(3, 7);
for ($i = 0; $i < $linenum; $i++) {
    $color = imagecolorallocate($im, rand(0, 255), rand(0, 200), rand(0, 255));
    imageline($im, rand(0, 10), rand(1, 60), rand(160, 200), rand(1, 60), $color);
}
session_start();
$_SESSION['captcha'] = $captcha;

header('Content-type: image/png');
imagepng($im);
imagedestroy($im);
