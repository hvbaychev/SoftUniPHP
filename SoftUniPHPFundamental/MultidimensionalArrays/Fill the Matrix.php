<?php

$N = 5; // Replace with your desired value of N

$matrixPatternA = array_fill(0, $N, array_fill(0, $N, 0));
$num = 1;
$rowStart = 0;
$rowEnd = $N - 1;
$colStart = 0;
$colEnd = $N - 1;

while ($num <= $N * $N) {
    // Fill the top row
    for ($i = $colStart; $i <= $colEnd; $i++) {
        $matrixPatternA[$rowStart][$i] = $num;
        $num++;
    }
    $rowStart++;

    // Fill the right column
    for ($i = $rowStart; $i <= $rowEnd; $i++) {
        $matrixPatternA[$i][$colEnd] = $num;
        $num++;
    }
    $colEnd--;

    // Fill the bottom row
    for ($i = $colEnd; $i >= $colStart; $i--) {
        $matrixPatternA[$rowEnd][$i] = $num;
        $num++;
    }
    $rowEnd--;

    // Fill the left column
    for ($i = $rowEnd; $i >= $rowStart; $i--) {
        $matrixPatternA[$i][$colStart] = $num;
        $num++;
    }
    $colStart++;
}

// Display the filled matrix
echo "Matrix Pattern A:\n";
for ($i = 0; $i < $N; $i++) {
    for ($j = 0; $j < $N; $j++) {
        echo $matrixPatternA[$i][$j] . "\t";
    }
    echo "\n";
}
