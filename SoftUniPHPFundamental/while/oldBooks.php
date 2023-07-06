<?php

$nameOfBook = readline();
$capacity = intval(readline());
$findBook = readline();
$countBook = 0;
$diff = 0;
while ($nameOfBook != $findBook) {
    if ($countBook > $capacity) {
        echo "The book you search is not here!".PHP_EOL;
        $diff = $countBook - 1;
        echo "You checked {$diff} books.";
        exit;
    }

    $findBook = readline();
    $countBook++;
}

echo "You checked {$countBook} books and found it.";  