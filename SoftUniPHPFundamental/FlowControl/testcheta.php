<?php

$greeting = readline();
$firstName = readline();
$lastName = readline();

switch ($greeting) {
    case 'Mr':
        echo "Welcome $greeting. $firstName $lastName";
        break;
    case 'Ms':
        echo "Welcome $greeting. $firstName $lastName";
        break;
    case 'Junior':
        echo "Welcome $greeting. $firstName $lastName";
        break;
    default:
        echo 'Invalid Input';
        break;
}