<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Travel Calculator</title>
<link href="css/styles.css" rel="stylesheet">
</head>
<body>
<h1>My Travel Calculator</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
<fieldset>

<label>Enter your name</label>
<input type="text" name="name" value="<?php if(isset($_POST['name'])) echo htmlspecialchars($_POST['name']);?>"> 

<label>How many miles are you driving?</label>
    <input type="number" name="miles" value="<?php if(isset($_POST['miles'])) echo htmlspecialchars($_POST['miles']);?>">

<label>How fast do you typically drive in miles per hour?</label>
<input type="number" name="speed" value="<?php if (isset($_POST['speed'])) echo htmlspecialchars($_POST['speed']);?>">

<label>How many hours per day do you plan on driving?</label>
<input type="number" name="hours" value="<?php if (isset($_POST['hours'])) echo htmlspecialchars($_POST['hours']);?>"> 

<label>Price of gas?</label>
<ul>
<li>
<input type="radio" name="gas_price" value="4.50" <?php if (isset($_POST['gas_price']) && $_POST['gas_price'] == '4.50') echo 'checked="checked"'; ?>>$4.50
</li>
<li>
<input type="radio" name="gas_price" value="5.00" <?php if (isset($_POST['gas_price']) && $_POST['gas_price'] == '5.00') echo 'checked="checked"'; ?>>$5.00
</li>
<li>
<input type="radio" name="gas_price" value="5.50" <?php if (isset($_POST['gas_price']) && $_POST['gas_price'] == '5.50') echo 'checked="checked"'; ?>>$5.50
</li>
<li>
<input type="radio" name="gas_price" value="5.50" <?php if (isset($_POST['gas_price']) && $_POST['gas_price'] == '6.00') echo 'checked="checked"'; ?>>$6.00

</li>
</ul>

<label>Fuel efficiency</label>
<select name="fuel_efficiency">
<option value="" <?php if (isset($_POST['fuel_efficiency']) && $_POST['fuel_efficiency'] == "") echo 'selected="selected"'; ?>>Select One!</option>
<option value="18" <?php if (isset($_POST['fuel_efficiency']) && $_POST['fuel_efficiency'] == "18") echo 'selected="selected"'; ?>>Terrible mileage @ 18 MPG</option>
<option value="22"<?php if (isset($_POST['fuel_efficiency']) && $_POST['fuel_efficiency'] == "22") echo 'selected="selected"'; ?>>Acceptable @ 22 MPG</option>
<option value="25" <?php if (isset($_POST['fuel_efficiency']) && $_POST['fuel_efficiency'] == "25") echo 'selected="selected"'; ?>>Average,  25 MPG</option>
<option value="30" <?php if (isset($_POST['fuel_efficiency']) && $_POST['fuel_efficiency'] == "30") echo 'selected="selected"'; ?>>Good @ 30 MPG</option>
<option value="35" <?php if (isset($_POST['fuel_efficiency']) && $_POST['fuel_efficiency'] == "35") echo 'selected="selected"'; ?>>Great @ 35 MPG, you are an ecological master!</option>
</select>

<input type="submit" value="Calculate">

<p><a href=""> Reset</a></p>

</fieldset>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(empty($_POST['name'])) {
       echo '<p class="error">Please fill out your name!</p>';
    }
    if(empty($_POST['miles'])) {
       echo '<p class="error">Please fill out your total driving miles!</p>';
    }
    if(empty($_POST['speed'])) {
       echo '<p class="error">Please fill out how fast you will be driving!</p>';
    }
    if(empty($_POST['hours'])) {
       echo '<p class="error">Please fill out how many hours per day you would like to drive!</p>';
    }
    if(empty($_POST['gas_price'])) {
       echo '<p class="error">Please select your cost of gas!</p>';
    }
    if(empty($_POST['fuel_efficiency'])) {
       echo '<p class="error">Please choose your car\'s fuel efficiency!</p>';
    }
    
    if (isset($_POST['name'], 
    $_POST['miles'], 
    $_POST['speed'], 
    $_POST['hours'], 
    $_POST['gas_price'], 
    $_POST['fuel_efficiency'])) {
        $name = $_POST['name'];
        $miles = floatval($_POST['miles']);
        $speed = floatval($_POST['speed']);
        $hours = floatval($_POST['hours']);
        $gas_price = floatval($_POST['gas_price']);
        $fuel_efficiency = floatval($_POST['fuel_efficiency']);
        
        if (!empty($name && $miles && $speed && $hours && $gas_price && $fuel_efficiency)) {
            $gallons_needed = $miles / $fuel_efficiency;
            $total_cost = $gallons_needed * $gas_price;
            $total_hours = $miles / $speed;
            $total_days = $total_hours / $hours;
            
            echo '<div class="box">
            <h2>Hello ' . htmlspecialchars($name) . '</h2>
            <p>You will be travelling a total of <b>' . number_format($total_hours, 2) . ' hours</b>, taking <b>' . number_format($total_days, 2) . ' days</b>.</p>
            <p>And you will be using <b>' . number_format($gallons_needed, 2) . ' gallons</b> of gas, costing you <b>$' . number_format($total_cost, 2) . '</b>.</p>
            </div>';
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
