<?php

$input = intval(readline());

$operations = [
    'chop' => function($num) { return $num / 2; },
    'dice' => function($num) { return sqrt($num); },
    'spice' => function($num) { return $num + 1; },
    'bake' => function($num) { return $num * 3; },
    'fillet' => function($num) { return $num * 0.80; }
];

function forMath($input, $operations) {
    $commands = explode(" ", readline());
    
    foreach($commands as $command) {
        $operation = $operations[$command];
        $input = $operation($input);
        echo $input . PHP_EOL;
    }
}

forMath($input, $operations); 