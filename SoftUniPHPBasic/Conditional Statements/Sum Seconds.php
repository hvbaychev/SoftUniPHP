<?php

$first = intval(readline());
$sec = intval(readline());
$third = intval(readline());

$total = $first + $sec + $third;

$min = (int) ($total / 60);
$sec = (int) ($total % 60);

if ($sec < 10){
    echo "$min:0$sec";
}
else{
    echo "$min:$sec";
}
