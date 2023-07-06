<?php

$input = readline();
$newInput = strrev($input);

function  is_palindrome($a , $b):bool{
    if ($a === $b){
        return True;
    }
    return False;
}

if (is_palindrome($input, $newInput)){
    echo 'is palindrome';
}
else{
    echo 'is not palindrome';
}