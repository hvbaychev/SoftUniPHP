<?php

$n = 8;
$html = '<div class="chessboard">';

for ($i = 0; $i < $n; $i++) {
    if ($i % 2 == 0) {
        $color = 'black';
    } else {
        $color = 'white';
    }
    $html .= "<div class='row'>";
    for ($j = 0; $j < $n; $j++) {
        if ($color == "black") {
            $color = 'white'; 
        else {
            $color = 'black';
            }
        }
        $html .= "<span style='color':$color'>$i</span>";
    }
    $html .= '</div>';
}
$html .= '</div>';
echo $html;
