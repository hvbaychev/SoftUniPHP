<?php

$numberBadResult = intval(readline());
$countBadResult = 0;
$sum = 0;
$lastCase = null;
$count = 0;
$command = readline();
$result = intval(readline());
while ($command != "Enough") {
    if ($result <= 4) {
        $countBadResult++;
        }if ($countBadResult >= $numberBadResult) {
            echo "You need a break, {$countBadResult} poor grades.";
            exit;
        }
    
    $sum += $result;
    $command = readline();
    $result = intval(readline());
    $count++;
    if ($command != "Enough"){
        $lastCase = $command;
    }
}

$average = $sum / $count;
$final = number_format($average, 2, '.', '');
echo "Average score: {$final}".PHP_EOL;
echo "Number of problems: {$count}".PHP_EOL;
echo "Last problem: {$lastCase}";