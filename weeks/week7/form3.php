<?php

ob_start();

$first_name = '';
$last_name = '';
$email = '';
$wines = '';
$phone = '';
$regions = '';
$gender = '';
$comments = '';
$privacy = '';

// Initialize the error messages
$first_name_err = '';
$last_name_err = '';
$email_err = '';
$wines_err = '';
$phone_err = '';
$regions_err = '';
$gender_err = '';
$comments_err = '';
$privacy_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
// if input are empty, we will declare a statement else we will assign the $_POSTS to a variable
// $wines = $_POST['wines']

if(empty($_POST['wines'])) {
// say something or do something
$wines_err = 'What... no wines?';
} else {
    $wines = $_POST['wines'];
}

if(empty($_POST['first_name'])) {
    // say something or do something
    $first_name_err = 'Please fill in your first name';
    } else {
    $first_name = $_POST['first_name'];
}

if(empty($_POST['last_name'])) {
    $last_name_err = 'Please fill in your last name';
    } else {
    $last_name = $_POST['last_name'];
}

if(empty($_POST['email'])) {
    $email_err = 'Please fill in your email';
    } else {
    $email = $_POST['email'];
}

if(empty($_POST['gender'])) {
    $gender_err = 'Please fill in your gender';
    } else {
    $gender = $_POST['gender'];
}

if(empty($_POST['wines'])) {
    $wines_err = 'Please fill in your wines';
    } else {
    $wines = $_POST['wines'];
}

// if(empty($_POST['phone'])) {
//     $phone_err = 'Please fill in your phone number';
//     } else {
//     $phone = $_POST['phone'];
// }

if(empty($_POST['phone'])) { // if empty, type in your number
    $phone_err = 'Your phone number please!';
    } elseif(array_key_exists('phone', $_POST)){
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
    { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
    $phone_err = 'Invalid format!';
    } else{
    $phone = $_POST['phone'];
    } // end else
    } // end main if


if(empty($_POST['comments'])) {
    $comments_err = 'We value your input';
    } else {
    $comments = $_POST['comments'];
}



if(!isset($_POST['privacy']) || $_POST['privacy'] != 'yes') {
    $privacy_err = 'You must agree to our privacy policy'; 
} else {
    $privacy = $_POST['privacy'];
}

if(empty($_POST['regions']))  { 
    $regions_err = 'Please choose your region';
} else {
    $regions = $_POST['regions'];
}


// function
function my_wines($wines) {
$my_return='';
if(!empty($_POST['wines'])){
    $my_return = implode(',' , $_POST['wines']);
}
return $my_return;
} //end my_wines function

// Check that all fields are filled out before sending the email
if(isset($_POST['first_name'],
$_POST['last_name'],
$_POST['email'],
$_POST['gender'],
$_POST['phone'],
$_POST['wines'],
$_POST['regions'],
$_POST['comments'],
$_POST['privacy'])){

// email sending
$to = 'szemeo@mystudentswa.com, pablosep@msn.com'; 
$subject = 'Test email on '.date('m/d/y, h:i A');
$body = 'Last Name: ' . $last_name . PHP_EOL .
        'First Name: ' . $first_name . PHP_EOL .
        'Email: ' . $email . PHP_EOL .
        'Gender: ' . $gender . PHP_EOL .
        'Phone: ' . $phone . PHP_EOL .
        'Wines: ' . my_wines($wines) . PHP_EOL .
        'Regions: ' . $regions . PHP_EOL .
        'Comments: ' . $comments . PHP_EOL;

$headers = "From: noreply@mystudentswa.com";



// we will be adding an if statement - that this email form will only work if all the fields are filled out!!!

if (!empty($first_name) &&
    !empty($last_name) &&
    !empty($email) &&
    !empty($wines) && 
    !empty($phone) &&
    !empty($regions) &&
    !empty($gender) &&
    !empty($comments) &&
    !empty($privacy) &&
    preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))  {

        mail($to, $subject, $body, $headers);
        header('Location:thx.php');
    }
// we must upload the form to a server to receive an email.

} // end isset

} //CLOSING SERVER REQUEST METHOD



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 3 in week 7 - Phone Validation!</title>
    <link href="../week6/css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1>Form 3 in week 7 - Phone Validation!</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

<fieldset>
<legend>Contact Pablo</legend>

<label>First Name</label>
<input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name'])   ;?>"> 
<span><?php echo $first_name_err;?></span>

<label>Last Name</label>
<input type="text" name="last_name" value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name'])   ;?>"> 
<span><?php echo $last_name_err;?></span>

<label>Email</label>
<input type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email'])   ;?>"> 
<span><?php echo $email_err;?></span>

<label>Gender</label>
    <ul>
    <li>
        <input type="radio" name="gender" value="female" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'female') echo 'checked="checked"'; ?>>Female
    </li>

    <li>
        <input type="radio" name="gender" value="male" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'male') echo 'checked="checked"'; ?>>Male
    </li>

    <li>
        <input type="radio" name="gender" value="neither" <?php if (isset($_POST['gender']) && $_POST['gender'] == 'neither') echo 'checked="checked"'; ?>>Neither
    </li>
    </ul>

    <label>Phone</label>
    <input type="tel" name="phone" placeholder="xxx-xxx-xxxx" value="<?php if (isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']); ?>">
    <span><?php echo $phone_err;?></span>

    <label>Wines</label>
 <ul>
    <li> <input type="checkbox" name="wines[]" value="cab" <?php if (isset($_POST['wines']) && in_array('cab', $wines))echo 'checked="checked"'; ?>>Cabernet</li>

    <li> <input type="checkbox" name="wines[]" value="merlot" <?php if (isset($_POST['wines']) && in_array('merlot', $wines))echo 'checked="checked"'; ?>>Merlot</li>

    <li> <input type="checkbox" name="wines[]" value="syrah" <?php if (isset($_POST['wines']) && in_array('syrah', $wines))echo 'checked="checked"'; ?>>Syrah</li>

    <li> <input type="checkbox" name="wines[]" value="malbec" <?php if (isset($_POST['wines']) && in_array('malbec', $wines))echo 'checked="checked"'; ?>>Malbec</li>

    <li> <input type="checkbox" name="wines[]" value="red" <?php if (isset($_POST['wines']) && in_array('red', $wines))echo 'checked="checked"'; ?>>Red Blend</li>

</ul>

<!-- this is where we write the error message when someone submits the form without clicking on any wines: -->
<span><?php echo $wines_err;?></span>


<label>Regions</label>
<select name="regions">
  <option value="" <?php if (isset($_POST['regions']) && is_null($_POST['regions'])) echo 'selected="unselected"'; ?>>Select One !</option>

  <option value="nw" <?php if (isset($_POST['regions']) && $_POST['regions'] == "nw") echo 'selected="selected"'; ?>>Northwest</option>

  <option value="sw" <?php if (isset($_POST['regions']) && $_POST['regions'] == "sw") echo 'selected="selected"'; ?>>Southwest</option>

  <option value="mw" <?php if (isset($_POST['regions']) && $_POST['regions'] == "mw") echo 'selected="selected"'; ?>>Midwest</option>

  <option value="ne" <?php if (isset($_POST['regions']) && $_POST['regions'] == "ne") echo 'selected="selected"'; ?>>Northeast</option>

<option value="se" <?php if (isset($_POST['regions']) && $_POST['regions'] == "se") echo 'selected="selected"'; ?>>Southeast</option>
</select>
<span><?php echo $regions_err;?></span>

<label>Comments</label>

<textarea name="comments"><?php if (isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']); ?></textarea>
<span><?php echo $comments_err;?></span>

<label>Privacy</label>
<ul>
<li><input type="radio" name="privacy" value="yes" <?php if (isset($_POST['privacy']) && $_POST ['privacy'] == "yes") echo 'checked= "checked"';?>>Yes</li>

</ul>
<span><?php echo $privacy_err;?></span>
<input type="submit" value= "Send it">

<p><a href="">Reset</a></p>

</fieldset>
</form>


</body>
</html>