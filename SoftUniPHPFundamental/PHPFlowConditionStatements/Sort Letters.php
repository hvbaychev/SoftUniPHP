<?php

$word = 'annaba nanais achampion formakeinpanc kaces';
$word = preg_replace("/[^A-Za-z]/", "", $word);

$counts = array_count_values(str_split(strtolower($word)));

function cmp($a, $b) {
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? 1 : -1;
}

uasort($counts, 'cmp');

foreach ($counts as $letter => $times) {
    echo "{$letter} -> {$times}\n";
}
