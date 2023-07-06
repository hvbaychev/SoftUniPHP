<?php


$totalSteps = 0;
$totalStepsIfFinish = 0;

while (1){
    $steps = readline();
    
    
    if ($steps == "Going home" ){
        $steps = intval(readline());
        $totalStepsIfFinish = $steps + $totalSteps;
        if ($totalStepsIfFinish >= 10000){
            echo "Goal reached! Good job!";
            break;
        }
        else{
            $diff = 10000 - $totalStepsIfFinish;
            echo "{$diff} more steps to reach goal.";
            break;
        }
    }
        
   $totalSteps += $steps;    
    
   
            
    if ($totalSteps >= 10000){
        echo "Goal reached! Good job!";
        break;
    }
    
  
}