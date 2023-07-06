<?php

$numNum = intval(readline());
$count  = 1;
$arrNum = [];

while ($numNum >= $count){
    $count++;
    $number = intval(readline());
    $arrNum[] += $number;
    $res = min($arrNum);
}

echo $res;