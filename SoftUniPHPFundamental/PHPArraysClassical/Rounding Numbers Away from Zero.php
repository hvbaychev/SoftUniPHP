<?php

$input = readline();
$arrInput = explode(' ', $input);

foreach ($arrInput as $value){
    echo  $value . " => " . round($value, 0, PHP_ROUND_HALF_UP).PHP_EOL;
}