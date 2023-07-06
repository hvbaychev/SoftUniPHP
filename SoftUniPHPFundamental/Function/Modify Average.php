<?php

function addTill5($input){
    $sum = 0;
    $average = 0;
    
    while ($average <= 5){
    $newArr = array_map('intval', str_split($input));
    $countArr = count($newArr);
        foreach ($newArr as $value){
            $sum += $value;
        }   
    
        $average = $sum / $countArr;
    
        if ($average >= 5){
            return $input;
        }
        else{
            $input .= '9';
            $sum = 0;
        }
    }
}
$input = intval(readline());
echo addTill5($input);