<?php

$timezone = new DateTimeZone('Europe/Sofia');
$begin = new DateTime('First day of this month', $timezone);
$end = new DateTime('Last day of this month', $timezone);

while ($begin <= $end){
    if ($begin->format('D') == 'Sat'){
        echo $begin->format('jS. F. Y') . "<br>";
        $begin->modify('+7 day');
    }
    else{
        $begin->modify('+1 day');
        }
}