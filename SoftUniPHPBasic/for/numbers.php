<?php

$maxNumber = PHP_INT_MIN;
$minNumber = PHP_INT_MAX;

$n = intval(readline());

for ($i = 0; $i < $n; $i++){
    $num = intval(readline());
    if($num < $minNumber){
        $minNumber = $num;
    }
    if($num > $maxNumber){
        $maxNumber = $num;
    }
}

echo "Max number: ".$maxNumber.PHP_EOL;
echo "Min Number: ".$minNumber;