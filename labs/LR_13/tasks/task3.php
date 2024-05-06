<?php

# Options

// General
$width = 1000;
$height = 1000;
$marginTop = 500;
$stroke = 5;

// Body
$bodyWidth = 400;
$bodyHeight = 200;
$legSize = 100;

// Tail
$tailWidth = 80;
$tailHeight = 50;
$shear = 50;
$deg = -35;

// Head
$radius = 150;
$nouseScale = 1;
$eyeScale = 1;
$earScale = 1;

// Mouth
$toothSide = 25;
$mothRotate = -25;
$toothNum = 4;


# endOptions

// Logic
{
    $centerX = $width / 2;
    $centerY = $height / 2;

    $img = imagecreate($width, $height);
    imagecolorallocate($img, 255, 255, 255);

    // Colors
    {
        $bodyColor = imagecolorallocate($img, 158, 140, 116);
        $headColor = imagecolorallocate($img, 133, 115, 91);
        $strokeColor = imagecolorallocate($img, 82, 72, 50);
        $grayColor = imagecolorallocate($img, 45, 40, 44);
        $whiteColor = imagecolorallocate($img, 255, 255, 255);
    }

    // Utils
    {
        $reflectionYMatrix = array(
            [1, 0, 0],
            [0, -1, 0],
            [0, 0, 1]
        );

        $reflectionXMatrix = array(
            [-1, 0, 0],
            [0, 1, 0],
            [0, 0, 1]
        );

        function scaleMatrix($scale)
        {
            return array(
                [$scale, 0, 0],
                [0, $scale, 0],
                [0, 0, 1]
            );
        }

        function rotationMatrix($fi_rad)
        {
            return array(
                [cos($fi_rad), sin($fi_rad), 0],
                [-sin($fi_rad), cos($fi_rad), 0],
                [0, 0, 1]
            );
        }

        function translateMatrix($dx, $dy, $negative = false)
        {
            if ($negative) {
                return array(
                    [1, 0, 0],
                    [0, 1, 0],
                    [-$dx, -$dy, 1]
                );
            } else {
                return array(
                    [1, 0, 0],
                    [0, 1, 0],
                    [$dx, $dy, 1]
                );
            }
        }

        function matrixMultiply($input, $mat)
        {
            $inputRows = count($input);
            $inputCols = count($input[0]);
            $matRows = count($mat);
            $matCols = count($mat[0]);

            if (($inputCols != $matRows) || $inputRows <= 0 || $matRows <= 0) {
                return false;
            }

            $result = array_fill(0, $inputRows, array_fill(0, $matCols, 0));

            for ($i = 0; $i < $inputRows; $i++) {
                for ($j = 0; $j < $matCols; $j++) {
                    for ($k = 0; $k < $inputCols; $k++) {
                        $result[$i][$j] += $input[$i][$k] * $mat[$k][$j];
                    }
                }
            }

            return $result;
        }

        function parseMatrix($input)
        {
            $result = [];
            $inputRows = count($input);

            for ($i = 0; $i < $inputRows; $i++) {
                $result[] = $input[$i][0];
                $result[] = $input[$i][1];
            }

            return $result;
        }
    }

    // Draw
    {
        $center_gap = ($width - $bodyWidth) / 2;
        $headCenterX = $center_gap + $bodyWidth * 0.8;
        $headCenterY = $marginTop - $radius - $stroke;

        //body
        {
            $body = array(
                [0, 0, 1],
                [$bodyWidth, 0, 1],
                [$bodyWidth, $bodyHeight, 1],
                [0, $bodyHeight, 1],
            );

            $bodyStroke = array(
                [0 - $stroke, 0 - $stroke, 1],
                [$bodyWidth + $stroke, 0 - $stroke, 1],
                [$bodyWidth + $stroke, $bodyHeight + $stroke, 1],
                [0 - $stroke, $bodyHeight + $stroke, 1],
            );


            $body = matrixMultiply($body, translateMatrix($center_gap, $marginTop));
            $bodyStroke = matrixMultiply($bodyStroke, translateMatrix($center_gap, $marginTop));

            $body = parseMatrix($body);
            $bodyStroke = parseMatrix($bodyStroke);
            $count = count($body) / 2;

            imagefilledpolygon($img, $bodyStroke, $count, $strokeColor);
            imagefilledpolygon($img, $body, $count, $bodyColor);
        }

        //legs
        {
            $triSide = $legSize;

            $h = $triSide * sqrt(3) / 2;

            $leftLeg = array(
                [$triSide / 2, 0, 1],
                [0, $h, 1],
                [$triSide, $h, 1]
            );

            $leftLeg = matrixMultiply($leftLeg, translateMatrix($center_gap - 20, $marginTop + $bodyHeight - 20));

            $rightLeg = matrixMultiply($leftLeg, translateMatrix($centerX, $centerY, true));
            $rightLeg = matrixMultiply($rightLeg, $reflectionXMatrix);
            $rightLeg = matrixMultiply($rightLeg, translateMatrix($centerX, $centerY));



            $leftLeg = parseMatrix($leftLeg);
            $rightLeg = parseMatrix($rightLeg);

            imagefilledpolygon($img, $leftLeg, 3, $strokeColor);
            imagefilledpolygon($img, $rightLeg, 3, $strokeColor);
        }

        //tail
        {
            $tail = array(
                [0 + $shear, 0, 1],
                [$tailWidth + $shear, 0, 1],
                [$tailWidth, $tailHeight, 1],
                [0, $tailHeight, 1],
            );


            $tail = matrixMultiply($tail, translateMatrix($tailWidth + $shear, 0, true));
            $tail = matrixMultiply($tail, translateMatrix($center_gap, $marginTop));

            $pivot = [$tail[1][0], $tail[1][1]];

            $tail = matrixMultiply($tail, translateMatrix($pivot[0], $pivot[1], true));
            $tail = matrixMultiply($tail, rotationMatrix(deg2rad($deg)));
            $tail = matrixMultiply($tail, translateMatrix($pivot[0], $pivot[1]));


            $tail = parseMatrix($tail);
            imagefilledpolygon($img, $tail, 4, $strokeColor);
        }

        //face
        {
            //mouth
            $mouth = array(
                [0, 0, 1],
                [$radius, 0, 1],
                [$radius, $radius / 1.5, 1],
                [0, $radius / 1.5, 1],
            );

            $faceWidth = $mouth[1][0] - $mouth[0][0];
            $faceHeight = $mouth[3][1] - $mouth[0][1];

            $pivot = [$mouth[1][0], $mouth[1][1]];

            $mouth = matrixMultiply($mouth, translateMatrix($pivot[0], $pivot[1], true));
            $mouth = matrixMultiply($mouth, translateMatrix($headCenterX - $radius * 0.8, $headCenterY - $faceHeight / 4));

            $mouthStroke = $mouth; {
                $mouthStroke[0][0] = $mouth[0][0] - $stroke;
                $mouthStroke[0][1] = $mouth[0][1] - $stroke;
                $mouthStroke[1][0] = $mouth[1][0] + $stroke;
                $mouthStroke[1][1] = $mouth[1][1] - $stroke;
                $mouthStroke[2][0] = $mouth[2][0] + $stroke;
                $mouthStroke[2][1] = $mouth[2][1] + $stroke;
                $mouthStroke[3][0] = $mouth[3][0] - $stroke;
                $mouthStroke[3][1] = $mouth[3][1] + $stroke;
            }

            $mouth = parseMatrix($mouth);
            $mouthStroke = parseMatrix($mouthStroke);
            imagefilledpolygon($img, $mouthStroke, 4, $strokeColor);
            imagefilledpolygon($img, $mouth, 4, $bodyColor);

            //nouse
            imagefilledellipse($img, $mouth[0], $mouth[1], $radius * $nouseScale / 3, $radius * $nouseScale / 3, $strokeColor);
        }

        //back ear
        {
            $earSide = $radius * 0.6 * $earScale;
            $earOrigin = array(
                [$earSide / 2, 0, 1],
                [0, $earSide, 1],
                [$earSide, $earSide, 1],
            );


            $ear = matrixMultiply($earOrigin, translateMatrix($earOrigin[2][0], $earOrigin[2][1], true));
            $ear = matrixMultiply($ear, translateMatrix($headCenterX, $headCenterY - $radius));

            $pivot = [$ear[2][0], $ear[2][1]];

            $ear = matrixMultiply($ear, translateMatrix($pivot[0], $pivot[1], true));
            $ear = matrixMultiply($ear, rotationMatrix(deg2rad(-15)));
            $ear = matrixMultiply($ear, translateMatrix($pivot[0], $pivot[1]));

            $ear = parseMatrix($ear);

            imagefilledpolygon($img, $ear, 3, $bodyColor);
            imagesetthickness($img, $stroke);
            imagepolygon($img, $ear, 3, $strokeColor);
            imagesetthickness($img, 1);
        }

        //tooth
        {
            $mouthLength = $radius;

            $locateX = 0;
            $locateY=150;

            $tooth = array(
                [$toothSide / 2, 0, 1],
                [0, $toothSide, 1],
                [$toothSide, $toothSide, 1],
            );

            $rect = array(
                [0, $toothSide, 1],
                [$radius, $toothSide, 1],
                [$radius, $toothSide + $stroke, 1],
                [0, $toothSide + $stroke, 1],
            );


            $rect = matrixMultiply($rect, translateMatrix($mouthLength, 0, true));
            $rect = matrixMultiply($rect, rotationMatrix(deg2rad($mothRotate)));
            $rect = matrixMultiply($rect, translateMatrix($mouthLength, 0));

            $pivot = [$rect[1][0], $rect[1][1]];

            $rect = matrixMultiply($rect, translateMatrix($pivot[0], $pivot[1], true));
            $rect = matrixMultiply($rect, translateMatrix($mouth[4], $mouth[5]));
            

            $rect = parseMatrix($rect);
            imagefilledpolygon($img, $rect, 4, $strokeColor);

            for ($i = 0; $i < $toothNum; $i++) {
                $tooth = array(
                    [($toothSide / 2) + $i * $toothSide, 0, 1],
                    [0 + $i * $toothSide, $toothSide, 1],
                    [$toothSide + $i * $toothSide, $toothSide, 1],
                );

                $tooth = matrixMultiply($tooth, translateMatrix($mouthLength, 0, true));
                $tooth = matrixMultiply($tooth, rotationMatrix(deg2rad($mothRotate)));
                $tooth = matrixMultiply($tooth, translateMatrix($mouthLength, 0));
                
                $tooth = matrixMultiply($tooth, translateMatrix($pivot[0], $pivot[1], true));
                $tooth = matrixMultiply($tooth, translateMatrix($mouth[4], $mouth[5]));
    
                $tooth = parseMatrix($tooth);
    
                imagefilledpolygon($img, $tooth, 3, $whiteColor);
                imagesetthickness($img, $stroke);
                imagepolygon($img, $tooth, 3, $strokeColor);
                imagesetthickness($img, 1);
            }


        }

        //head
        {
            //shape
            $diameter = $radius * 2;
            imagefilledellipse($img, $headCenterX, $headCenterY, $diameter + $stroke * 2, $diameter + $stroke * 2, $strokeColor);
            imagefilledellipse($img, $headCenterX, $headCenterY, $diameter, $diameter, $headColor);

            //eye
            $eyeCenterX = $headCenterX - $radius / 3;
            $eyeCenterY = $headCenterY - $radius / 3;
            imagefilledellipse($img, $eyeCenterX, $eyeCenterY, $radius * $eyeScale / 2 + $stroke * 2, $radius * $eyeScale / 2 + $stroke * 2,    $strokeColor);
            imagefilledellipse($img, $eyeCenterX, $eyeCenterY, $radius * $eyeScale / 2, $radius * $eyeScale / 2, $whiteColor);

            imagefilledellipse($img, $eyeCenterX - $radius / 8, $eyeCenterY + $radius / 16, $radius * $eyeScale / 4 + $stroke * 2, $radius * $eyeScale / 4 + $stroke * 2, $strokeColor);
            imagefilledellipse($img, $eyeCenterX - $radius / 8, $eyeCenterY + $radius / 16, $radius * $eyeScale / 4, $radius * $eyeScale / 4, $grayColor);
        }

        //front ear
        {
            $earSide = $radius * $earScale * 0.6;
            $earOrigin = array(
                [$earSide / 2, 0, 1],
                [0, $earSide, 1],
                [$earSide, $earSide, 1],
            );


            $ear = matrixMultiply($earOrigin, translateMatrix($earOrigin[2][0], $earOrigin[2][1], true));
            $ear = matrixMultiply($ear, translateMatrix($headCenterX + $earSide * 1.2, $headCenterY - $radius + $earSide * 0.7));

            $pivot = [$ear[2][0], $ear[2][1]];

            $ear = matrixMultiply($ear, translateMatrix($pivot[0], $pivot[1], true));
            $ear = matrixMultiply($ear, rotationMatrix(deg2rad(25)));
            $ear = matrixMultiply($ear, translateMatrix($pivot[0], $pivot[1]));

            $ear = parseMatrix($ear);

            imagefilledpolygon($img, $ear, 3, $bodyColor);
            imagesetthickness($img, $stroke);
            imagepolygon($img, $ear, 3, $strokeColor);
            imagesetthickness($img, 1);
        }
    }

    Header("Content-type: image/jpeg");
    imagejpeg($img);
    imagedestroy($img);
}
