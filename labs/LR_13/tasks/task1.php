<?php

// SetUp
$width = 800;
$height = 800;
$diameter = 200;

// Options
$lights_num = rand(6, 12);
$start_position_angle = 90;
$thikness = 20;
$length = 200;

// Logic
{
    $radius = $diameter / 2;
    $sector_angle = 360 / $lights_num;

    $img = imagecreate($width, $height);
    $white = imagecolorallocate($img, 255, 255, 255);

    $yellow = imagecolorallocate($img, 255, 255, 0);

    imagefilledellipse($img, $width / 2, $height / 2, $diameter, $diameter, $yellow);


    for ($i = 0; $i < $lights_num; $i++) {
        $point1_rad = deg2rad($start_position_angle - $thikness);

        $x1 = ($width / 2) + (cos($point1_rad) * $radius);
        $y1 = ($height / 2) - (sin($point1_rad) * $radius);

        $point2_rad = deg2rad($start_position_angle + $thikness);

        $x2 = ($width / 2) + (cos($point2_rad) * $radius);
        $y2 = ($height / 2) - (sin($point2_rad) * $radius);

        $point3_rad = deg2rad($start_position_angle);

        $x3 = ($width / 2) + (cos($point3_rad) * ($radius + $length));
        $y3 = ($height / 2) - (sin($point3_rad) * ($radius + $length));

        $points = [$x1, $y1, $x2, $y2, $x3, $y3];
        imagefilledpolygon($img, $points, 3, $yellow);

        $start_position_angle += $sector_angle;
    }

    Header("Content-type: image/jpeg");
    imagejpeg($img);
    imagedestroy($img);
}
