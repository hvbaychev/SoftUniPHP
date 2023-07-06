<?php

$name = readline();
$count = 1;
$avEvaluation = 0;
$sum = 0;

while ($count <= 12){
    $evaluation = floatval(readline());
    if ($evaluation >= 4){
        $sum += $evaluation;
        $count++;
    }
}   
$avEvaluation = $sum / 12;
$res = number_format($avEvaluation, 2);
echo "$name graduated. Average grade: {$res}";

