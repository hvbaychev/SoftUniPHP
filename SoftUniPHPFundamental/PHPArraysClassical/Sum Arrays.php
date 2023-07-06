<?php

$inputOne = explode(' ', readline());
$inputTwo = explode(' ', readline());

$lenOne = count($inputOne);
$lenTwo = count($inputTwo);

if ($lenOne > $lenTwo) {
    $diff = $lenOne - $lenTwo;
    for ($i = 0; $i < $diff; ++$i) {
        $inputTwo[] = $inputTwo[$i % $lenTwo];
    }
} elseif ($lenOne < $lenTwo) {
    $diff = $lenTwo - $lenOne;
    for ($i = 0; $i < $diff; ++$i) {
        $inputOne[] = $inputOne[$i % $lenOne];
    }
}

$sum = array_map(function ($a, $b) {
    return $a + $b;
}, $inputOne, $inputTwo);


foreach ($sum as $value) {
    echo $value . ' ';
}