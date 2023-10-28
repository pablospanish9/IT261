<?php
// this file will demonstrate loops and in addition to placing
// your php inside your HTML 
//The for loop loops trhoug a block of code a specified numnber
//  of times
//for  (init counter; test counter;increment ounter) {code to be 
//    executed for each iteration;}
// celcius and fahrenheit
// $far = ($celcius * 9/5) + 32;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Celcius Table</title>
    <style>
        * {
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
       /* Add a bit of color to the page  */
        body {
            background-color: beige;  
            }
        #wrapper {
            width:500px;
            margin:30px auto;
        }
        table {
            width: 450px;
            margin: 20px  auto;
            border: 4px solid orange; 
            border-collapse: collapse; 
            background-color: white; 
        }

        th, td {
            border: 3px solid lightblue; 
            border-collapse: collapse;
            padding: 5px 30px;
        }

        h1, h2, h3 {
            text-align: center;
            margin: 10px 0;
            color: blue;
        }
    </style>
</head>
<body>
    <div id="wrapper">

        <h1>My Celcius / Farenheit Table, increment by 3</h1>
        <table>
            <tr>
                <th>Celcius</th>
                <th>Farenheit</th>
            </tr>
            <?php 
            for ($cel = 0; $cel <= 100; $cel += 3) {
                $far = floor(($cel * 9/5) + 32);
                echo '<tr>';
                echo '<td> '.$cel.' degrees</td>';
                echo '<td> '.$far.' degrees</td>';
                echo '</tr>';
            }
            ?>
        </table>
        <h1>My Kilometer / Mileage Table!</h1>
        <table>
            <tr>
                <th>Kilometers</th>
                <th>Miles</th>
            </tr>
            <?php
            for ($km = 0; $km <= 100; $km += 5) {
                $miles = $km * 0.621371;
                echo '<tr>';
                echo '<td> ' . $km . ' km</td>';
                echo '<td> ' . round($miles, 1) . ' miles</td>';  
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</body>
</html>