<?php

$n = 10;
$html = "<u1>";

for ($i = 0; $i < 10; $i++){
    if ($i % 2 == 0){
        $color = 'green';
    }
    else{
        $color = 'blue';
    }
    $html .= "  <li><span style =\"color:$color\">$i</span></li>";
}
$html .= "<\u1>";

echo $html;