<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency 4 Extra Credit</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>Currency 4 - with videos - Extra Credit </h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <fieldset>
        <label>NAME</label>
        <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']);?>"> 

        <label>EMAIL</label>
        <input type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']);?>">

        <label>How much money do you have?</label>
        <input type="number" name="amount"  value="<?php if (isset($_POST['amount']))
        echo htmlspecialchars($_POST['amount']);?>"> 

       <!-- Time for our radio button that has an 
       additional attribute of VALUE  -->
        <label>Choose your currency?</label>
        <ul>
    <li>
        <input type="radio" name="currency" value="0.017" <?php if (isset($_POST['currency']) && $_POST['currency'] == '0.017') echo 'checked="checked"'; ?>>Rubles
    </li>
    <li>
        <input type="radio" name="currency" value="0.76" <?php if (isset($_POST['currency']) && $_POST['currency'] == '0.76') echo 'checked="checked"'; ?>>Canadian Dollars
    </li>
    <li>
        <input type="radio" name="currency" value="1.15" <?php if (isset($_POST['currency']) && $_POST['currency'] == '1.15') echo 'checked="checked"'; ?>>Pounds
    </li>
    <li>
        <input type="radio" name="currency" value="1.00" <?php if (isset($_POST['currency']) && $_POST['currency'] == '1.00') echo 'checked="checked"'; ?>>Euros
    </li>
    <li>
        <input type="radio" name="currency" value="0.0074" <?php if (isset($_POST['currency']) && $_POST['currency'] == '0.0074') echo 'checked="checked"'; ?>>Yen
    </li>
</ul>

<label>Choose your banking institution</label>
<select name="bank">
    <option value="" <?php if (isset($_POST['bank']) && $_POST['bank'] == "") echo 'selected="selected"'; ?>>Select One!</option>
    <option value="chase" <?php if (isset($_POST['bank']) && $_POST['bank'] == "chase") echo 'selected="selected"'; ?>>Chase</option>
    <option value="boa" <?php if (isset($_POST['bank']) && $_POST['bank'] == "boa") echo 'selected="selected"'; ?>>Bank of America</option>
    <option value="banner" <?php if (isset($_POST['bank']) && $_POST['bank'] == "banner") echo 'selected="selected"'; ?>>Banner Bank</option>
    <option value="wells" <?php if (isset($_POST['bank']) && $_POST['bank'] == "wells") echo 'selected="selected"'; ?>>Wells Fargo</option>
    <option value="becu" <?php if (isset($_POST['bank']) && $_POST['bank'] == "becu") echo 'selected="selected"'; ?>>Boeing Credit Union</option>
</select>


        <input type="submit" value="Convert it ">

        <p><a href=""> Reset it!</a></p>
</fieldset>
</form>
<?php
// we will start with the server request method
//then, we will ask ourselves if any fields are empty
// if fields not empty, we will check if they are set
// the below if statement checks whether the server request method is POST, meaning that the form has been submitted:
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

     if(empty($_POST['bank'])) {
        echo '<p class="error">Please choose your banking institution!</p>' ;
     }


    if (isset($_POST['name'], 
    $_POST['email'], 
    $_POST['amount'], 
    $_POST['currency'],
    $_POST['bank'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $amount = floatval($_POST['amount']);
        $currency = floatval($_POST['currency']);
        $bank = $_POST['bank'];
        $dollars = $amount * $currency;

        // if (!empty($name && $email && $amount && $currency && $bank)) {

        if (!empty($name && $email && $amount && $currency) && ($bank != NULL)) {

        echo '<div class="box">
        <h2>Hello '.$name.'</h2>
        <p>You now have <b>$' . number_format($dollars, 2) . ' American dollars</b> and we will be emailing you at <b>' . $email . '</b> with your information, as well as depositing your funds at <b>' . $bank . ' bank!</b></p>
        </div>';
        
//  videos
if ($dollars > 1000) {
    echo '<h2>I am REALLY happy because I now have $' . number_format( $dollars, 2 ) . ' dollars.</h2>';
    echo '<div style="text-align: center; margin-top: 20px; margin-bottom: 30px;"><iframe width="560" height="315" src="https://www.youtube.com/embed/O5APc0z49wg?si=tJUv81Epj5qvJJG3&amp;clip=UgkxwrHBGha9Bt2msxQE-K352g1I6y3bGWle&amp;clipt=EJ2cAhj98AU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> </div>';
} else {
    echo '<h2>I am unhappy because I now have $' . number_format( $dollars, 2 ) . ' dollars.</h2>';
    echo '<div style="text-align: center; margin-top: 20px; margin-bottom: 30px;"> <iframe width="560" height="315" src="https://www.youtube.com/embed/CC7OrEx5H4U?si=WAi0IgMQg_MGlDXh&amp;clip=Ugkxx5Mgnwu_Z6jQsjHNtb3ZM_ZTnG4zq3DM&amp;clipt=EOSNBBid4gc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> </div>';
}


} // closing if check not empty fields
} // closing if check for the POST request 
} // closes the outermost if check for the POST
?>
<!-- Here is the validation code borrowed from footer: -->
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
