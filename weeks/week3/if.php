<?php
// if statements
// if else statemet
// if elseif statement

$temp = 65;
if ($temp <=60) {
    echo 'It is a semi-warm day!';
}
else {
    echo 'It may be getting warmer';
}
echo '<br>';
$new_temp = 99;
if ($new_temp <= 60) {
echo 'Not a very warm day!';
} elseif ($new_temp <= 70) {
    echo 'It\'s getting warmer';
} elseif ($new_temp <= 80) {
    echo 'We might be going to the beach!';    
} else {
    echo 'We will definitely go to the beach!';
}

echo '<h2> This exercise will be about a salary, a bonus and sales!</h2>';
// a salary of 95000 - annual
// sales need to be above 100000, you will start making bouns!!!
//1000000 = 5%
//1200000 = 10%
//1400000 = 15%
//1500000 = 20%

$salary = 95000;
$sales = 99999;
// if sales is equal or less than 99999, then you do not receive any bonus
// if sales is equal or less than 119999, then you will receive 5%
// if sales is equal or less than 139999, then you will receive 10%
// if sales is equal or less than 149999, then you will receive 15%

$salary = 95000;
$sales = 105000;

if ($sales <= 99999) {
    echo "You did not make your bonus.";
} elseif ($sales <= 119999) {
    $salary *= 1.05;
    echo $salary;
} elseif ($sales <= 139999) {
    $salary *= 1.10;
    echo $salary;
} elseif ($sales <= 149999) {
    $salary *= 1.15;
    echo $salary;
} else {
    $salary *= 1.20;
    echo "You will receive a 20% bonus.";
}











?>