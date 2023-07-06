<?php
function generate_month_calendar($date) {

    $first_day = date('w', strtotime($date.'-01'));
    $last_day = date('t', strtotime($date));
    $week_days = array('П', 'В', 'С', 'Ч', 'П', 'С', 'Н');
    $month_name = date('F Y', strtotime($date));
    setlocale(LC_TIME, 'bg_BG.utf8');
    $month_name = ucfirst(strftime('%B %Y', strtotime($date)));
    
  
    echo "<h2>" . $month_name . "</h2>";
    

    echo "<table>";
    echo "<tr>";
    foreach ($week_days as $day) {
        echo "<th>" . $day . "</th>";
    }
    echo "</tr>";
    
 
    $day = 1;
    echo "<tr>";
    for ($i = 0; $i < $first_day; $i++) {
        echo "<td></td>";
    }
    while ($day <= $last_day) {
        for ($i = $first_day; $i < 7 && $day <= $last_day; $i++) {
            echo "<td>" . $day . "</td>";
            $day++;
        }
        if ($day <= $last_day) {
            echo "</tr><tr>";
        }
        $first_day = 0;
    }

    while ($i < 7) {
        echo "<td></td>";
        $i++;
    }
    echo "</tr>";
    echo "</table>";
}


generate_month_calendar('2023-03-01');
?>
