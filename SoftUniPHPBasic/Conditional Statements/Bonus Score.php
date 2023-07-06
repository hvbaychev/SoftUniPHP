<?php

$points = intval(readline());
$total = 0;
$totalBonus = 0;


if ($points <= 100){
    $bonus = 5;
    $total = $points + $bonus;
    if ($points % 2 === 0){
        $total += 1;
        $totalBonus = $bonus + 1;
    }
    if ($points % 10 === 5){
        $total += 2;
        $totalBonus = $bonus + 2;
    }
    if ($points % 2 != 0 && $points % 10 != 5){
        $totalBonus = $bonus;
    }
}
elseif ($points > 100 && $points <=1000) {
    $bonus = $points * 0.20;
    $total = $points + $bonus;
    if ($points % 2 === 0){
        $total += 1;
        $totalBonus = $bonus + 1;
    }
    if ($points % 10 === 5){
        $total += 2;
        $totalBonus = $bonus + 2;
    }
     if ($points % 2 != 0 && $points % 10 != 5){
        $totalBonus = $bonus;
    }
}
else{
    $bonus = $points * 0.10;
    $total = $points + $bonus;
    if ($points % 2 === 0){
        $total += 1;
        $totalBonus = $bonus + 1;
    }
    if ($points % 10 === 5){
        $total += 2;
        $totalBonus = $bonus + 2;
    }
    if ($points % 2 != 0 && $points % 10 != 5){
        $totalBonus = $bonus;
    }
}



echo $totalBonus.PHP_EOL;
echo $total;
