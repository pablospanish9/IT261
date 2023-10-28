<?php
// date function and if statement
echo date('Y');
echo '<br>';
echo date ('l,F j, Y h:i A');

echo '<br>';
date_default_timezone_set ('America/Los_Angeles');
echo date ('l,F j, Y h:i A');

echo '<br>';
$name = 'Pabs';
echo '<br>';
$our_time = date ('H:i A');
echo '<br>';
echo $our_time;
echo '<br>';
// the logic behind thi is , if the time is less or equal to 11, then it is morning.
// if the time is less or equal to 17, then it is afternoon
// the else is evening



if ($our_time <= 11) {
    echo '<h2 style=\'color: orange;\'>Good morning, ' . $name . '</h2>
    <img src ="../../images/sun.jpg" alt= "Sun" style="width:480px;">
    <p>It\'s time to get up</p>
    ';
} elseif ($our_time <= 17) {
    echo '<h2 style=\'color: green;\'>Good afternoon, ' . $name . '</h2>
    <img src ="../../images/afternoon.jpg" alt= "Afternoon" style="width:480px;">
    <p>It\'s a beautiful afternoon</p>
    ';
} else {
    echo '<h2 style=\'color: blue;\'>Good evening, ' . $name . '</h2>
    <img src ="../../images/evening.jpg" alt= "Evening" style="width:480px;">
    <p>It\'s time to relax</p>
    ';
}




