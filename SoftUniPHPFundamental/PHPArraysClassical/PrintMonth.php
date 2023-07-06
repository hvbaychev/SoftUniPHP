<?php

$inputMonth = intval(readline());


$months = ["January", "February", "March", "April", "May", "June",  
"July", "August", "September", "October", "November", "December"];

$countMonth = count($months);

if ($inputMonth > 12){
    echo "Invalid Month!" ;
}
else{
    echo $months[$inputMonth-1]; 
}
