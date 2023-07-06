<?php

$n = intval(readline());
$maxNum = -1000000;
$sumNumber = 0;
for ($i = 0; $i < $n; $i++){
    $num = intval(readline());
    if ($num > $maxNum){
        $maxNum = $num; 
    }
    $sumNumber += $num;
}  
if ($maxNum === $sumNumber - $maxNum) {
    $sumOther = $sumNumber - $maxNum;
    echo 'Yes';
    echo "Sum = $sumOther";
}
else{
    $sumOther = $sumNumber - $maxNum;
    echo 'No';
    echo "Diff = " . abs($maxNum - $sumOther);
}

