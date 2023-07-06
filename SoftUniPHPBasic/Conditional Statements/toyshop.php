<?php

$exPrice = floatval(readline());
$numberPuzzle = intval(readline());
$numberDoll  = intval(readline());
$numberBear  = intval(readline());
$numberMin = intval(readline());
$numberTruck = intval(readline());


$puzzle = 2.60;
$talkingDoll = 3;
$flufyBear = 4.10;
$minion = 8.20;
$truck = 2;



$countToys = $numberPuzzle + $numberDoll + $numberBear + $numberMin + $numberTruck;
$totalSum = ($numberPuzzle * $puzzle) + ($numberDoll * $talkingDoll) + ($numberBear * $flufyBear) + ($numberMin * $minion) + ($numberTruck * $truck );

if ($countToys >= 50){
    $totalSum = $totalSum * 0.75;
}

$totalSum = $totalSum * 0.90;
$diff = abs($exPrice - $totalSum);
if ($exPrice <=  $totalSum){
    $diff1 = number_format($diff, 2);
    echo "Yes! $diff1 lv left.";
}
else{
    $diff2 = number_format($diff, 2);
    echo "Not enough money! $diff2 lv needed.";
}

