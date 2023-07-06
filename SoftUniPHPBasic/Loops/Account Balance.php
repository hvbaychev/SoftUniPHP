<?php

$numberInput = floatval(readline());
$finish = 1;
$increase = 0;
$totalIncrease = 0;

while ($numberInput >= $finish){
    $money = floatval(readline());
    if ($money <= 0){
        echo "Invalid operation!".PHP_EOL;
        break;
    }
    $increase = $money;
    $totalIncrease += $money;
    $finish++;
    $result = number_format($increase, 2);
    echo "Increase: $result".PHP_EOL;
}

$total_sum = number_format($totalIncrease, 2);
echo "Total: $total_sum".PHP_EOL;

