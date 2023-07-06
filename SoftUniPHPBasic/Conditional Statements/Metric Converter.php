<?php

$number = floatval(readline());
$inmed = readline();
$outmed = readline();

if ($inmed === 'mm'){
    $number /= 1000;
}
elseif ($inmed === 'cm'){
    $number /= 100;
}
if ($outmed === 'mm'){
    $number *= 1000;
}
elseif ($outmed === 'cm'){
    $number *=100;
}

printf("%0.3f", $number);