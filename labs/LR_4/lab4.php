<?php

// TODO

$a = 200;
$b = 4;
$c = 3;

$y = round(sqrt($a)*cos(-$b*M_PI/$c)*sin(-$b/$c), 3);

echo "<p>y = $y</p>";

$x = rand(1, 7);
$y = round(($x*cos($x))/pow(($x**3+3*$x+1), 1/3), 3);

echo "<p>y = $y</p>";

$x = 4;
$y = round(cos(M_2_SQRTPI)+sin(M_PI/$x)+exp($x),3 );

echo "<p>y = $y</p>";


$x = rand(2,5);
$y = tan($x)+M_SQRT3*log(2*sin(deg2rad($x))**2, 13);
$y /= log(M_SQRT2*cos(deg2rad($x)), 31);
$y = round($y, 3);
echo "<p>x = $x; y = $y</p>";


echo "<p>Generate 3 rand int [15; 30]</p>";
echo "<p>". rand(15,30) ."</p>";
echo "<p>". rand(15,30) ."</p>";
echo "<p>". rand(15,30) ."</p>";

echo "<p>Generate 3 rand int [10; 40]</p>";
echo "<p>". rand(10,40) ."</p>";
echo "<p>". rand(10,40) ."</p>";
echo "<p>". rand(10,40) ."</p>";

echo "<p>Generate 3 rand int [70; 75]</p>";
echo "<p>". rand(70,75) ."</p>";
echo "<p>". rand(70,75) ."</p>";
echo "<p>". rand(70,75) ."</p>";


echo "<p>Generate 3 rand float [20; 45]</p>";

echo "<p>". round((20 + 25*rand()/getrandmax()), 3) ."</p>";
echo "<p>". round((20 + 25*rand()/getrandmax()), 3) ."</p>";
echo "<p>". round((20 + 25*rand()/getrandmax()), 3) ."</p>";

echo "<p>Generate 3 rand float [7; 9]</p>";

echo "<p>". (7 + 2*rand()/getrandmax()) ."</p>";
echo "<p>". (7 + 2*rand()/getrandmax()) ."</p>";
echo "<p>". (7 + 2*rand()/getrandmax()) ."</p>";
 
echo "<p>Generate 3 rand float [90; 110]</p>";

echo "<p>". (90 + 20*rand()/getrandmax()) ."</p>";
echo "<p>". (90 + 20*rand()/getrandmax()) ."</p>";
echo "<p>". (90 + 20*rand()/getrandmax()) ."</p>";


?>