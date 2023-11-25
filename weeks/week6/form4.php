<?php
// this code do not use. Different approach. Only for reference is here:
ob_start();

$first_name = '';
$last_name = '';
$email = '';
$phone = '';
$comments = '';
$privacy = '';

$private = '';
$court = '';
$non_profit = '';
$translation_services = [];
$region = '';

// Initialize the error messages
$first_name_err = '';
$last_name_err = '';
$email_err = '';
$phone_err = '';
$comments_err = '';
$privacy_err = '';
$translation_services_err = '';
$region_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $comments = $_POST['comments'] ?? '';
    $privacy = $_POST['privacy'] ?? '';

    $private = $_POST['private'] ?? '';
    $court = $_POST['court'] ?? '';
    $non_profit = $_POST['non_profit'] ?? '';
    $translation_services = $_POST['translation_services'] ?? [];
    $region = $_POST['region'] ?? '';

    // ... Add validation checks and error messages as needed
    // For example:
    if(empty($private) && empty($court) && empty($non_profit)) {
        // Error message for translation type
    }
    if(empty($translation_services)) {
        $translation_services_err = 'Please select at least one translation service.';
    }
    if(empty($region)) { 
        $region_err = 'Please choose your region';
    }

    // Check that all fields are filled out before sending the email
    if (!empty($first_name) && !empty($last_name) && !empty($email) && 
        !empty($phone) && !empty($comments) && !empty($privacy) && 
        (!empty($private) || !empty($court) || !empty($non_profit)) &&
        !empty($translation_services) && !empty($region)) {

        // email sending
        $to = 'szemeo@mystudentswa.com, pablosep@msn.com'; 
        $subject = 'Test email on '.date('m/d/y, h:i A');
        $body = 'Last Name: ' . $last_name . PHP_EOL .
                'First Name: ' . $first_name . PHP_EOL .
                'Email: ' . $email . PHP_EOL .
                'Phone: ' . $phone . PHP_EOL .
                'Translation Type: ' . implode(', ', array_filter([$private, $court, $non_profit])) . PHP_EOL .
                'Translation Services: ' . implode(', ', $translation_services) . PHP_EOL .
                'Region: ' . $region . PHP_EOL .
                'Comments: ' . $comments . PHP_EOL;

        $headers = "From: noreply@mystudentswa.com";

        mail($to, $subject, $body, $headers);
        header('Location:thx.php');
    }
    // we must upload the form to a server to receive an email.
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our second form in Week 6!</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1>Second Form in week 6</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

<fieldset>
<legend>Contact Pablo</legend>

<label>First Name</label>
<input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name']); ?>"> 
<span><?php echo $first_name_err;?></span>

<label>Last Name</label>
<input type="text" name="last_name" value="<?php if(isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name']); ?>"> 
<span><?php echo $last_name_err;?></span>

<label>Email</label>
<input type="email" name="email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"> 
<span><?php echo $email_err;?></span>

<label>Phone</label>
<input type="tel" name="phone" value="<?php if(isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']); ?>">
<span><?php echo $phone_err;?></span>

<!-- Translation Type Radio Buttons -->
<label>Translation Type</label>
<ul>
    <li><input type="radio" name="translation_type" value="private" <?php if(isset($_POST['translation_type']) && $_POST['translation_type'] == 'private') echo 'checked="checked"'; ?>>Private</li>
    <li><input type="radio" name="translation_type" value="court" <?php if(isset($_POST['translation_type']) && $_POST['translation_type'] == 'court') echo 'checked="checked"'; ?>>Court</li>
    <li><input type="radio" name="translation_type" value="non_profit" <?php if(isset($_POST['translation_type']) && $_POST['translation_type'] == 'non_profit') echo 'checked="checked"'; ?>>Non-Profit</li>
</ul>

<!-- Translation Services Checkboxes -->
<label>Translation Services</label>
<ul>
    <li><input type="checkbox" name="translation_services[]" value="simultaneous" <?php if(in_array('simultaneous', $translation_services)) echo 'checked="checked"'; ?>>Simultaneous</li>
    <li><input type="checkbox" name="translation_services[]" value="consecutive" <?php if(in_array('consecutive', $translation_services)) echo 'checked="checked"'; ?>>Consecutive</li>
    <li><input type="checkbox" name="translation_services[]" value="sight" <?php if(in_array('sight', $translation_services)) echo 'checked="checked"'; ?>>Sight Translation</li>
    <li><input type="checkbox" name="translation_services[]" value="conference" <?php if(in_array('conference', $translation_services)) echo 'checked="checked"'; ?>>Conference</li>
    <li><input type="checkbox" name="translation_services[]" value="class" <?php if(in_array('class', $translation_services)) echo 'checked="checked"'; ?>>Class</li>
    <li><input type="checkbox" name="translation_services[]" value="voice_over" <?php if(in_array('voice_over', $translation_services)) echo 'checked="checked"'; ?>>Voice Over</li>
</ul>

<!-- Region Dropdown -->
<label>Region</label>
<select name="region">
    <option value="">Select One</option>
    <option value="snohomish" <?php if($region == 'snohomish') echo 'selected="selected"'; ?>>Snohomish County</option>
    <option value="king" <?php if($region == 'king') echo 'selected="selected"'; ?>>King County</option>
    <option value="skagit" <?php if($region == 'skagit') echo 'selected="selected"'; ?>>Skagit County</option>
    <option value="pierce" <?php if($region == 'pierce') echo 'selected="selected"'; ?>>Pierce County</option>
    <option value="eastern_wa" <?php if($region == 'eastern_wa') echo 'selected="selected"'; ?>>Eastern Washington</option>
</select>
<span><?php echo $region_err;?></span>

<label>Comments</label>
<textarea name="comments"><?php if(isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']); ?></textarea>
<span><?php echo $comments_err;?></span>

<label>Privacy</label>
<ul>
    <li><input type="radio" name="privacy" value="yes" <?php if(isset($_POST['privacy']) && $_POST['privacy'] == 'yes') echo 'checked="checked"'; ?>>Yes</li>
</ul>
<span><?php echo $privacy_err;?></span>

<input type="submit" value="Send it">
<p><a href="">Reset</a></p>
</fieldset>
</form>

</body>
</html>
