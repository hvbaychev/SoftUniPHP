<?php

$arr = explode(' ',readline());
$n = count($arr);
$found = false;

for ($i = 1; $i < $n - 1; $i++) {
    for ($j = $i + 1; $j < $n; $j++) {
        for ($k = 0; $k < $i; $k++) {
            if ($arr[$k] + $arr[$i] == $arr[$j]) {
                echo $arr[$k] . ' + ' . $arr[$i] . ' == ' . $arr[$j] . PHP_EOL;
                $found = true;
            }
        }
    }
}

if (!$found) {
    echo 'No' . PHP_EOL;
}


