<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Travel Calculator</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>My Travel Calculator</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <fieldset>
            <label>Enter your name</label>
            <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']);?>"> 

            <label>How many miles are you driving?</label>
            <input type="number" name="miles" value="<?php if (isset($_POST['miles'])) echo htmlspecialchars($_POST['miles']);?>">

            <label>How fast do you typically drive?</label>
            <input type="number" name="speed" value="<?php if (isset($_POST['speed'])) echo htmlspecialchars($_POST['speed']);?>">

            <label>How many hours per day do you plan on driving?</label>
            <input type="number" name="hours" value="<?php if (isset($_POST['hours'])) echo htmlspecialchars($_POST['hours']);?>">

            <input type="submit" value="Calculate">
            <p><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"> Reset it!</a></p>
        </fieldset>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if(empty($_POST['name'])) {
            echo '<p class="error">Please fill out your name!</p>';
        }

        if(empty($_POST['miles'])) {
            echo '<p class="error">Please fill out how many miles you are driving!</p>';
        }

        if(empty($_POST['speed'])) {
            echo '<p class="error">Please fill out your typical driving speed!</p>';
        }

        if(empty($_POST['hours'])) {
            echo '<p class="error">Please fill out how many hours per day you plan on driving!</p>';
        }

        if (isset($_POST['name'], $_POST['miles'], $_POST['speed'], $_POST['hours'])) {
            $name = $_POST['name'];
            $miles = floatval($_POST['miles']);
            $speed = floatval($_POST['speed']);
            $hours = floatval($_POST['hours']);
            
            if (!empty($name) && $miles > 0 && $speed > 0 && $hours > 0) {
                $total_hours = $miles / $speed;
                $days = $total_hours / $hours;
                echo '<div class="box">';
                echo '<h2>Hello, '.$name.'</h2>';
                echo '<p>You will be driving a total of <b>'.$miles.' miles</b>. ';
                echo 'At a speed of <b>'.$speed.' miles per hour</b>, and driving <b>'.$hours.' hours per day</b>, ';
                echo 'it will take you <b>'.ceil($days).' days</b> to reach your destination.</p>';
                echo '</div>';
            }
        }
    }
    ?>
    <footer>
        <ul>
            <li>Copyright &copy; 2023</li>
            <li>All Rights Reserved</li>
            <li><a href="../index.php">Web Design by Pablo</a></li>
            <li><a id="html-checker" href="#">HTML Validation</a></li>
            <li><a id="css-checker" href="#">CSS Validation</a></li>
        </ul>
        
        <script>
            document.getElementById("html-checker").setAttribute("href","https://validator.w3.org/nu/?doc=" + location.href);
            document.getElementById("css-checker").setAttribute("href","https://jigsaw.w3.org/css-validator/validator?uri=" + location.href);
        </script>
    </footer>
</body>
</html>
