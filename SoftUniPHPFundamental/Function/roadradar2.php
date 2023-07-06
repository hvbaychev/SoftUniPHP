<?php

$speed = floatval(readline());
$place = readline();

function speedAndPlace($speed, $place){
    $limits = [
        'motorway' => 130,
        'interstate' => 90,
        'city' => 50,
        'residential' => 20
    ];
    
    if (!array_key_exists($place, $limits)) {
        return 'Invalid place';
    }
    
    $limit = $limits[$place];
    $diff = $speed - $limit;
    
    if ($diff > 0 && $diff <= 20) {
        return 'speeding';
    }
    elseif ($diff > 20 && $diff <= 40) {
        return 'excessive speeding';
    }
    elseif ($diff <= 0) {
        return 'good driver';
    }
    else {
        return 'reckless driving';
    }   
}

echo speedAndPlace($speed, $place);
