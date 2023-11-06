<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency 2</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>Currency 2 form with drop down (Select and option)</h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <fieldset>
        <label>NAME</label>
        <input type="text" name="name"> 

        <label>EMAIL</label>
        <input type="email" name="email">

        <label>How much money do you have?</label>
        <input type="number" name="amount">
       <!-- Time for our radio button that has an 
       additional attribute of VALUE  -->
        <label>Choose your currency?</label>
        <ul>
        <li><input type="radio" name="currency" 
        value ="0.017">Rubles</li>
        <li><input type="radio" name="currency" 
        value ="0.76">Canadian Dollars</li>
        <li><input type="radio" name="currency" 
        value ="1.15">Pounds</li>
        <li><input type="radio" name="currency" 
        value ="1.00">Euros</li>
        <li><input type="radio" name="currency" 
        value ="0.0074">Yen</li>
       </ul>

    <label>Choose your banking institution</label>
    <select name="bank">
    <option value="" NULL>Select One!</option>
    <option value="chase">Chase</option>
    <option value="boa">Bank of America</option>
    <option value="banner">Banner Bank</option>
    <option value="wells">Wells Fargo</option>
    <option value="becu">Boeing Credit Union</option>


    </select>
        <input type="submit" value="Convert it ">

        <p><a href=""> Reset it!</a></p>
</fieldset>
</form>
<?php
// we will start with the server request method
//then, we will ask ourselves if any fields are empty
// if fields not empty, we will check if they are set

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if(empty($_POST['name'])) {
       echo '<p class="error">Please fill out your name!</p>' ;
    }

    if(empty($_POST['email'])) {
        echo '<p class="error">Please fill out your email!</p>' ;
     }

     if(empty($_POST['amount'])) {
        echo '<p class="error">Please fill out your amount!</p>' ;
     }

     if(empty($_POST['currency'])) {
        echo '<p class="error">Please check your currency!</p>' ;
     }

     if(empty($_POST['name'])) {
        echo '<p class="error">Please choose your banking institution!</p>' ;
     }
    if ($_POST['bank'] == NULL) {
    echo '<p class="error">Please choose your banking institution!</p>';
    }

    if (isset($_POST['name'], 
    $_POST['email'], 
    $_POST['amount'], 
    $_POST['currency'],
    $_POST['bank'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $amount = $_POST['amount'];
        $currency = $_POST['currency'];
        $bank = $_POST['bank'];
        $dollars = $amount * $currency;

        echo '<div class="box">
        <h2>Hello '.$name.'</h2>
        <p>You now have <b> $'.floor($dollars).' American dollars </b>and we will be emailing you at <b>'.$email.'</b> with your information, as well as depositing your funds at <b>'.$bank.' bank!</b></p>
        </div>';
    }
}
?>
</body>
</html>
