<?php


$facebook = 150;
$instagram = 100;
$reddit = 50;

$openTabs = intval(readline());
$salary = intval(readline());

for ($i = 0; $i <= $openTabs; $i++){
    $web = readline();
    if ($web === 'Facebook'){
        $salary -= $facebook;
    }
    elseif ($web === 'Instagram') {
        $salary -= $instagram;
    }
    elseif ($web === 'Reddit') {
        $salary -= $reddit;
    }
    
    if ($salary <= 0){
        echo "You have lost your salary.";
        exit;
    }
}

echo $salary;
