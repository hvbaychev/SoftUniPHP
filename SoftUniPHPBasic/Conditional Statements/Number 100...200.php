<?php

$n = intval(readline());

if ($n < 100){
    echo 'Less than 100';
}
elseif ($n >= 100 && $n <= 200) {
    echo 'Between 100 and 200';
}
else{
    echo 'Greater than 200';
}