<?php

$speed = floatval(readline());
$place = readline();

function speedAndPlace($speed, $place){
    if ($place === 'motorway'){
        $limit = 130;
    }
    elseif ($place === 'interstate'){
        $limit = 90;
    }
    elseif ($place === 'city'){
        $limit = 50; 
    }
    elseif ($place === 'residential'){
        $limit = 20;
    }
 
    
    $diff = $speed - $limit;
    if (($diff > 0 && $diff <= 20)){
        return 'speeding';
    }
    elseif ($diff > 20 && $diff <= 40){
        return 'excessive speeding';
    }
    elseif ($diff <= 0){
        return 'good driver';
    }
    else{
        return 'reckless driving';
    }
    
    
}


    echo speedAndPlace($speed, $place);