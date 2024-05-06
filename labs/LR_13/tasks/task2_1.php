<?php

if (isset($_GET['submit'])) {
    $img = imagecreatefromjpeg($_GET['img']);

    $img = imagescale($img, 600);

    $filters = array(
        'pixel' => IMG_FILTER_PIXELATE,
        'toGray' => IMG_FILTER_GRAYSCALE,
        'blur' => IMG_FILTER_GAUSSIAN_BLUR,
        'invert' => IMG_FILTER_NEGATE,
        'inc' => IMG_FILTER_EMBOSS
    );

    $filter = $filters[$_GET['myradio']];

    header('Content-type: image/png');

    if ($img && imagefilter($img, $filter, 3)) {
        imagejpeg($img);
    }


    imagedestroy($img);
}
