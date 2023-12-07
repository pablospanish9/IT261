<!-- Code by Ch does not work -->

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

$first_name = '';
$last_name = '';
$email = '';
$language = [];
$organization  = '';
$services = [];
$phone = '';
$location = '';
$events = '';
$comments = '';
$privacy = '';

// Initialize the error messages
$first_name_err = '';
$last_name_err = '';
$email_err = '';
$services_err = '';
$language_err = '';
$organization_err  = '';
$phone_err = '';
$location_err = '';
$events_err = '';
$comments_err = '';
$privacy_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $organization = $_POST['organization'] ?? '';
    $language = $_POST['language'] ?? [];
    $services = $_POST['services'] ?? [];
    $phone = $_POST['phone'] ?? '';
    $location = $_POST['location'] ?? '';
    $events = $_POST['events'] ?? '';
    $comments = $_POST['comments'] ?? '';
    $privacy = $_POST['privacy'] ?? '';

    $first_name_err = empty($first_name) ? 'Please fill in your first name' : '';
    $last_name_err = empty($last_name) ? 'Please fill in your last name' : '';
    $email_err = empty($email) ? 'Please fill in your email' : '';
    $organization_err = empty($organization) ? 'Please fill in your organization' : '';
    $language_err = empty($language) ? 'Please fill the languages you are requesting' : '';
    $services_err = empty($services) ? 'What... no services?' : '';
    $phone_err = empty($phone) ? 'Your phone number please!' : (!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone) ? 'Invalid format!' : '');
    $location_err = empty($location) ? 'Please choose your region' : '';
    $events_err = empty($events) ? 'Please fill in your events' : '';
    $comments_err = empty($comments) ? 'Please tell us the details of your event. We value your input.' : '';
    $privacy_err = (!isset($privacy) || $privacy != 'yes') ? 'You must agree to our privacy policy' : '';

    function my_services($services) {
        return implode(',', $services);
    }

    if ($first_name && $last_name && $email && $organization && !empty($language) && !empty($services) && $phone && $location && $events && $comments && $privacy && preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)) {
        $to = 'pablosep@msn.com'; 
        $subject = 'Test email on '.date('m/d/y, h:i A');
        $body = 'Last Name: ' . $last_name . PHP_EOL .
                'First Name: ' . $first_name . PHP_EOL .
                'Organization: ' . $organization . PHP_EOL .
                'Email: ' . $email . PHP_EOL .
                'Phone: ' . $phone . PHP_EOL .
                'Language: ' . implode(', ', $language) . PHP_EOL .
                'Event: ' . $events . PHP_EOL .
                'Services: ' . my_services($services) . PHP_EOL .
                'Location: ' . $location . PHP_EOL .
                'Comments: ' . $comments . PHP_EOL;

        $headers = "From: noreply@interpreterscoalition.org";
        mail($to, $subject, $body, $headers);
        header('Location:thx.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interpreter request form</title>
    <link href="../week6/css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
<h1>This is the interpreter request form</h1>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
    <fieldset>
        <legend>Please fill out this form to book an interpreter</legend>

        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
        <span><?php echo $first_name_err; ?></span>

        <label>Last Name</label>
        <input type="text" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>">
        <span><?php echo $last_name_err; ?></span>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
        <span><?php echo $email_err; ?></span>

        <label>Organization</label>
        <input type="text" name="organization" value="<?php echo htmlspecialchars($organization); ?>">
        <span><?php echo $organization_err; ?></span>

        <label>Phone</label>
        <input type="tel" name="phone" placeholder="xxx-xxx-xxxx" value="<?php echo htmlspecialchars($phone); ?>">
        <span><?php echo $phone_err; ?></span>

        <label>In what languages do you need interpreting? Please select all that apply.</label>
        <ul>
            <li><input type="checkbox" name="language[]" value="spanish" <?php if (in_array('spanish', $language)) echo 'checked="checked"'; ?>>Spanish</li>
            <li><input type="checkbox" name="language[]" value="russian" <?php if (in_array('russian', $language)) echo 'checked="checked"'; ?>>Russian</li>
            <!-- Add other language options similarly -->
        </ul>
        <span><?php echo $language_err; ?></span>

        <label>What type of event are you having?</label>
        <ul>
            <li><input type="radio" name="events" value="Conference" <?php if ($events == 'Conference') echo 'checked="checked"'; ?>>Conference</li>
            <li><input type="radio" name="events" value="Deposition" <?php if ($events == 'Deposition') echo 'checked="checked"'; ?>>Deposition</li>
            <!-- Add other event options similarly -->
        </ul>
        <span><?php echo $events_err; ?></span>

        <label>Services</label>
        <ul>
            <li><input type="checkbox" name="services[]" value="simultaneous" <?php if (in_array('simultaneous', $services)) echo 'checked="checked"'; ?>>Simultaneous Interpretation</li>
            <!-- Add other service options similarly -->
        </ul>
        <span><?php echo $services_err; ?></span>

        <label>Location</label>
        <select name="location">
            <option value="remote" <?php if ($location == "remote") echo 'selected="selected"'; ?>>Remote videoconference - Zoom</option>
            <!-- Add other location options similarly -->
        </select>
        <span><?php echo $location_err; ?></span>

        <label>Comments</label>
        <textarea name="comments"><?php echo htmlspecialchars($comments); ?></textarea>
        <span><?php echo $comments_err; ?></span>

        <label>Privacy</label>
        <ul>
            <li><input type="radio" name="privacy" value="yes" <?php if ($privacy == "yes") echo 'checked="checked"'; ?>>Yes</li>
        </ul>
        <span><?php echo $privacy_err; ?></span>

        <input type="submit" value="Send it">
        <p><a href="">Reset</a></p>
    </fieldset>
</form>
</body>
</html>
