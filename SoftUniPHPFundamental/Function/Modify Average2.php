<?php

function addTill5($input) {
    $sum = 0;
    $average = 0;
    $digits = str_split($input, 1);
    $countDigits = count($digits);

    while ($average < 5) {
        foreach ($digits as $digit) {
            $sum += intval($digit);
        }

        $average = $sum / $countDigits;

        if ($average > 5) {
            return $input;
        } else {
            $input .= '9';
            $digits[] = '9';
            $countDigits++;
            $sum = 0;
        }
    }
}

$input = readline();
echo addTill5($input);
