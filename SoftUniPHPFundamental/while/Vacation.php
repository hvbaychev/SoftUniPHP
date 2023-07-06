<?php

$moneyHoliday = floatval(readline());
$moneyExist = floatval(readline());

$countDays = 0;
$countSpend = 0;

while (1) {
    $action = readline();
    $money = floatval(readline());
    $countDays++;

    if ($action === 'spend') {
        $countSpend++;
        $moneyExist -= $money;
        if ($moneyExist <= 0) {
            $moneyExist = 0;
        }
        
        if ($countSpend === 5) {
            echo "You can't save the money." . PHP_EOL;
            echo "{$countSpend}";
            break;
        }
    } 
    elseif ($action === 'save') {
        $moneyExist += $money;
        $countSpend = 0;
    }


    if ($moneyExist >= $moneyHoliday) {
        echo "You saved the money for {$countDays} days.";
        break;
    }
}
