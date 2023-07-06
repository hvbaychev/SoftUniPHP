<?php


$word = 'apple';

$counts = array_count_values(str_split(strtolower($word)));



foreach ($counts as $letter => $times) {
    echo "{$letter} -> {$times}\n";
}
