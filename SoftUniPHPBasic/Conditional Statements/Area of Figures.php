<?php

$shape = readline();
$area = 0;



if ($shape === 'square'){
    $a = floatval(readline());
    $area = $a * $a;
}
elseif ($shape === 'rectangle') {
    $a =  floatval(readline());
    $b =  floatval(readline());
    $area = $a * $b;
}
elseif ($shape === 'circle' ) {
    $a =  floatval(readline());
    $b = M_PI;
    $area = $b * $a * $a;
}
elseif ($shape === 'triangle'){
    $a = floatval(readline());
    $b = floatval(readline());
    $area = 1/2 * $a * $b;
}

echo number_format($area, 3);