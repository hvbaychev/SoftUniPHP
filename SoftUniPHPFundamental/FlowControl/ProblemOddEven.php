<?php

$num = 5.5;
$rem = fmod($num, 2);

if ($rem == 0){
    echo 'Even';
}
elseif ($rem == round($rem)){
    echo 'Odd';
}
else{
    echo 'Invalid';
}
