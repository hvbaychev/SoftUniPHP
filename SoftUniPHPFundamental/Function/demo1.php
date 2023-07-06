<?php

$input = readline();

function  is_palindrome($a):bool{
    $revStr = strrev($a);
    if ($a === $revStr){
        return True;
    }
    return False;
}

if (is_palindrome($input)){
    echo 'is palindrome';
}
else{
    echo 'is not palindrome';
}