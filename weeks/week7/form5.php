<?php

ob_start();

$first_name = '';
$last_name = '';
$email = '';
$services = '';
$phone = '';
$regions = '';
$events = '';
$comments = '';
$privacy = '';

// Initialize the error messages
$first_name_err = '';
$last_name_err = '';
$email_err = '';
$services_err = '';
$phone_err = '';
$regions_err = '';
$events_err = '';
$comments_err = '';
$privacy_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
// if input are empty, we will declare a statement else we will assign the $_POSTS to a variable
// $services = $_POST['services']

if(empty($_POST['services'])) {
// say something or do something
$services_err = 'What... no services?';
} else {
    $services = $_POST['services'];
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

if(empty($_POST['events'])) {
    $events_err = 'Please fill in your events';
    } else {
    $events = $_POST['events'];
}

if(empty($_POST['services'])) {
    $services_err = 'Please fill in your services';
    } else {
    $services = $_POST['services'];
}

// below is the old check for phone err message:
// if(empty($_POST['phone'])) {
//     $phone_err = 'Please fill in your phone number';
//     } else {
//     $phone = $_POST['phone'];
// }

// the code below checks for phone format:
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
function my_services($services) {
$my_return='';
if(!empty($_POST['services'])){
    $my_return = implode(',' , $_POST['services']);
}
return $my_return;
} //end my_services function

// Check that all fields are filled out before sending the email
if(isset($_POST['first_name'],
$_POST['last_name'],
$_POST['email'],
$_POST['events'],
$_POST['phone'],
$_POST['services'],
$_POST['regions'],
$_POST['comments'],
$_POST['privacy'])){

// email sending
$to = 'pablosep@msn.com'; 
$subject = 'Test email on '.date('m/d/y, h:i A');
$body = 'Last Name: ' . $last_name . PHP_EOL .
        'First Name: ' . $first_name . PHP_EOL .
        'Email: ' . $email . PHP_EOL .
        'events: ' . $events . PHP_EOL .
        'Phone: ' . $phone . PHP_EOL .
        'services: ' . my_services($services) . PHP_EOL .
        'Regions: ' . $regions . PHP_EOL .
        'Comments: ' . $comments . PHP_EOL;

$headers = "From: noreply@mystudentswa.com";



// we will be adding an if statement - that this email form will only work if all the fields are filled out!!!

if (!empty($first_name) &&
    !empty($last_name) &&
    !empty($email) &&
    !empty($services) && 
    !empty($phone) &&
    !empty($regions) &&
    !empty($events) &&
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
<legend>Please fill out this form to book an interpreter</legend>

<label>First Name</label>
<input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name'])   ;?>"> 
<span><?php echo $first_name_err;?></span>

<label>Last Name</label>
<input type="text" name="last_name" value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name'])   ;?>"> 
<span><?php echo $last_name_err;?></span>

<label>Email</label>
<input type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email'])   ;?>"> 
<span><?php echo $email_err;?></span>

<label>What type of event are you having?</label>
    <ul>
    <li>
        <input type="radio" name="events" value="Conference interpreting" <?php if (isset($_POST['events']) && $_POST['events'] == 'Conference interpreting') echo 'checked="checked"'; ?>> Conference interpreting
    </li>

    <li>
        <input type="radio" name="events" value="Translation" <?php if (isset($_POST['events']) && $_POST['events'] == 'Translation') echo 'checked="checked"'; ?>> Translation
    </li>

    <li>
        <input type="radio" name="events" value="Deposition - legal" <?php if (isset($_POST['events']) && $_POST['events'] == 'Deposition - legal') echo 'checked="checked"'; ?>> Deposition - legal
    </li>

    <li>
        <input type="radio" name="events" value="Non-profit" <?php if (isset($_POST['events']) && $_POST['events'] == 'Non-profit') echo 'checked="checked"'; ?>> Non-profit
    </li>

    <li>
        <input type="radio" name="events" value="Workshop" <?php if (isset($_POST['events']) && $_POST['events'] == 'Workshop') echo 'checked="checked"'; ?>> Workshop
    </li>
    </ul>

    <label>Phone</label>
    <input type="tel" name="phone" placeholder="xxx-xxx-xxxx" value="<?php if (isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']); ?>">
    <span><?php echo $phone_err;?></span>

<label>services</label>
<ul>
    <li> <input type="checkbox" name="services[]" value="simultaneous" <?php if (isset($_POST['services']) && in_array('simultaneous', $_POST['services'])) echo 'checked="checked"'; ?>>Simultaneous Interpretation</li>

    <li> <input type="checkbox" name="services[]" value="consecutive" <?php if (isset($_POST['services']) && in_array('consecutive', $_POST['services']))
 echo 'checked="checked"'; ?>>Consecutive Interpretation</li>

    <li> <input type="checkbox" name="services[]" value="document" <?php if (isset($_POST['services']) && in_array('document', $_POST['services'])) echo 'checked="checked"'; ?>>Document Translation</li>

    <li> <input type="checkbox" name="services[]" value="website" <?php if (isset($_POST['services']) && in_array('website', $_POST['services'])) echo 'checked="checked"'; ?>>Website Translation and Localization</li>

    <li> <input type="checkbox" name="services[]" value="voiceover" <?php if (isset($_POST['services']) && in_array('voiceover', $_POST['services'])) echo 'checked="checked"'; ?>>Video Voice-Over</li>
</ul>


<!-- this is where we write the error message when someone submits the form without clicking on any services: -->
<span><?php echo $services_err;?></span>


<label>Regions</label>
<select name="regions">
  <option value="" <?php if (isset($_POST['regions']) && $_POST['regions'] == "") echo 'selected="selected"'; ?>>Select One !</option>

  <option value="snohomish" <?php if (isset($_POST['regions']) && $_POST['regions'] == "snohomish") echo 'selected="selected"'; ?>>Snohomish County</option>

  <option value="king" <?php if (isset($_POST['regions']) && $_POST['regions'] == "king") echo 'selected="selected"'; ?>>King County</option>

  <option value="pierce" <?php if (isset($_POST['regions']) && $_POST['regions'] == "pierce") echo 'selected="selected"'; ?>>Pierce County</option>

  <option value="thurston" <?php if (isset($_POST['regions']) && $_POST['regions'] == "thurston") echo 'selected="selected"'; ?>>Thurston County</option>

  <option value="easternwa" <?php if (isset($_POST['regions']) && $_POST['regions'] == "easternwa") echo 'selected="selected"'; ?>>Eastern Washington</option>
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