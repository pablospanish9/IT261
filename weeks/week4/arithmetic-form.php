<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arithmetic Form</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>Our Arithmetic Form</h1>
<form action="" method="post">
    <fieldset>
        <label>Name</label>
        <input type="text" name="name"> 

        <label>Phone</label>
        <input type="tel" name="phone">

        <label>How many Lattes?</label>
        <input type="number" name="lattes">

        <label>Capucinos?</label>
        <input type="number" name="capucinos">

        <label>How many Americanos?</label>
        <input type="number" name="americanos">

        <!-- <label>Comments</label>
        <textarea name="comments"></textarea> -->

        <label>Special Requests?</label>
        <textarea name="special_requests"></textarea> <!-- Changed name attribute -->
        
        <input type="submit" value="Send my order">
</fieldset>
</form>
<p><a href=""> Reset!</a></p>
<?php
// name, phone, lattes, capucinos, americanos, special requests


date_default_timezone_set('America/Los_Angeles');
$our_time = date('H:i');

if (isset($_POST['name'], 
$_POST['phone'], 
$_POST['lattes'], 
$_POST['capucinos'], 
$_POST['americanos'], 
$_POST['special_requests'])) {  // start of isset code
// if statement to check fields that are empty:    
if (empty($_POST['name']) && 
empty($_POST['phone']) && 
empty($_POST['lattes']) && 
empty($_POST['capucinos']) && 
empty($_POST['americanos']) && 
empty($_POST['special_requests'])) {
    echo '<p class="error">Please fill out all 
    of the fields!</p>';
} // end nested if empty code 
else {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $lattes = $_POST['lattes'];
    $capucinos = $_POST['capucinos'];
    $americanos = $_POST['americanos'];
    $special = $_POST['special_requests'];
    $total = $lattes + $capucinos + $americanos;

// if and elseif statement regarding out time

    if ($our_time <= '11') {
        $our_time = "Good Morning";
    } elseif ($our_time <= '17') {  

        $our_time = "Good Afternoon";
    } else {
        $our_time = "Good Evening";
    }

echo '<div class="box">
        <h2>Hello, ' . $our_time . ' ' . $name . '!</h2>
        <p>We have confirmed your order to this <b>number</b> '
         . $phone .' totaling '.$total.' beverages,
          and you have ordered the following</p>
        <ul>
            <li>' . $lattes . ' lattes</li> <!-- Corrected variable name -->
            <li>' . $capucinos . ' capucinos</li>
            <li>' . $americanos . ' americanos</li>
        </ul>
        <p>And this is your special <b>request</b>: '.$special.'</p>
        <p>Thank you for choosing our establishment</p>
    </div>
    ';
} // end else

} // end curly bracket of the isset
?>
</body>
</html>
