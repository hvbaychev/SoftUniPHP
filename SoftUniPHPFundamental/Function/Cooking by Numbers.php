<?php

$input = intval(readline());

function forMath($input){
    $command = readline();
    $array = explode(" ", $command);
    $lenght = count($array);
    $result = 0;
    $newResult = 0;
   
    
    for ($i = 0; $i < $lenght; $i++){
        if ($array[$i] === 'chop'){
            $result = $input / 2;
        }
        elseif ($array[$i] === 'dice'){
            $result = sqrt($input);
        }
        elseif ($array[$i] === 'spice'){
            $result = $input + 1;
        }
        elseif ($array[$i] === 'bake'){
            $result = $input * 3;
        }
        elseif ($array[$i] === 'fillet'){
            $result = $input * 0.80;
        }
        
        $input = $result;
        echo $result.PHP_EOL;
    }
}


echo forMath($input);
