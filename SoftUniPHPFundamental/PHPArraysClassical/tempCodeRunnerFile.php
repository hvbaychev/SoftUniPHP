<?php

/*
Write a program to read an array of integers, reverse it and print its elements.
The input consists of a number n (the number of elements) + n integers, 
each as a separate line. 
Print the output on a single line (space separated).
*/

$inputNumbers = intval(readline());
$inputNumeric = explode(' ', readline());
$countNumbers = count($inputNumeric);
$newArr = [];

for ($i = $countNumbers-1; $i >= 0; $i--){
    $newArr[] = $inputNumeric[$i];
}
$result =  implode(' ', $newArr);

echo $result;