<?php

$income = floatval(readline());
$average = floatval(readline());
$minSalary = floatval(readline());

$step = 0;

if ($income <= $minSalary && $average >= 4.5 && $average < 5.50){
    $step = $minSalary * 0.35;
    $result = floor($step);
    echo "You get a Social scholarship {$result} BGN";
}
elseif ($income <= $minSalary && $average >= 5.50){
    $step = $minSalary * 0.35;
    if ($average >= 5.50)
        $goodResultStep = $average * 25;
    if ($step > $goodResultStep){
        $result = floor($step);
        echo "You get a Social scholarship {$result } BGN";
    }
    elseif($step < $goodResultStep){
        $result = floor($goodResultStep);
        echo "You get a scholarship for excellent results {$result} BGN";
    }
    elseif ($step === $goodResultStep) {
        $result = floor($goodResultStep);
        echo "You get a scholarship for excellent results {$result} BGN";
}
}
elseif ($income > $minSalary && $average >= 4.5 && $average <5.50){
    echo "You cannot get a scholarship!";
}
