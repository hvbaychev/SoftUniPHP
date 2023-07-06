<?php

$n = intval(readline());
$sum = 0;

for ($i = 0; $i < $n; $i++){
    $number = intval(readline());
    $sum += $number;
}

echo $sum;
