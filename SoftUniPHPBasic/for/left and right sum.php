<?php

$n = intval(readline());

$leftSum = 0;
$rightSum = 0;

for ($i = 0; $i < $n; $i++){
    $num = intval(readline());
    $leftSum += $num;
}

for ($i = 0; $i < $n; $i++){
    $num = intval(readline());
    $rightSum += $num;
}

$diff = abs($leftSum - $rightSum);
if ($diff === 0){
    echo "Yes, sum = $leftSum";
}
else{
    echo "No, diff = $diff";
}