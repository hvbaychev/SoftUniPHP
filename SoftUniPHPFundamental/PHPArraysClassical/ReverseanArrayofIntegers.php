<?php

/*
Write a program to read an array of integers, reverse it and print its elements.
The input consists of a number n (the number of elements) + n integers, 
each as a separate line. 
Print the output on a single line (space separated).
*/

$inputNumbers = intval(readline());
while ($inputNumbers > 0){
    $inputNumeric = readline();
    $arrayNumbers[] = $inputNumeric;
    $inputNumbers -= 1;
}
$countNumbers = count($arrayNumbers);
$newArr = [];

for ($i = $countNumbers-1; $i >= 0; $i--){
    $newArr[] = $arrayNumbers[$i];
}
$result =  implode(' ', $newArr);

echo $result;
