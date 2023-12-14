<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

// Variable declarations
$first_name = $last_name = $email = $organization = $phone = $location = $events = $comments = $privacy = '';
$services = [];
$language = [];

// Initialize the error messages
$first_name_err = $last_name_err = $email_err = $services_err = $language_err = $organization_err = $phone_err = $location_err = $events_err = $comments_err = $privacy_err = '';

function my_services($servicesArray) {
    return !empty($servicesArray) ? implode(', ', $servicesArray) : '';
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Sanitize and validate inputs
    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $organization = filter_var($_POST['organization'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $location = filter_var($_POST['location'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $events = filter_var($_POST['events'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $comments = filter_var($_POST['comments'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $privacy = filter_var($_POST['privacy'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $services = $_POST['services'] ?? [];
    $language = $_POST['language'] ?? [];



    // Validation checks
    if(empty($first_name)) $first_name_err = 'Please fill in your first name';
    if(empty($last_name)) $last_name_err = 'Please fill in your last name';
    if(empty($email)) $email_err = 'Please fill in your email';
    if(empty($organization)) $organization_err = 'Please fill in your organization';
    if(empty($language)) $language_err = 'Please fill the languages you are requesting';
    if(empty($events)) $events_err = 'Please fill in your events';
    if(empty($comments)) $comments_err = 'Please tell us the details of your event. We value your input.';
    if($privacy != 'yes') $privacy_err = 'You must agree to our privacy policy and contract terms'; 
    if(empty($location)) $location_err = 'Please choose your region';
    if(empty($services)) $services_err = 'What... no services?';

    // Phone number validation
    if(empty($phone)) {
        $phone_err = 'Your phone number please!';
    } elseif (!preg_match('/^(\+?\d{1,2}\s?)?(\(?\d{3}\)?[\s.-]?)?\d{3}[\s.-]?\d{3,4}$/', $phone)) {
        $phone_err = 'Invalid format!';
    }

    // Check all fields are filled and send email
    if(!$first_name_err && !$last_name_err && !$email_err && !$services_err &&
       !$phone_err && !$location_err && !$events_err && !$comments_err && !$privacy_err) {
        
        $to = 'pablosep@msn.com,milenacw@live.com';
        $subject = 'Interpreter request on '.date('m/d/y, h:i A');
        $body = "This is a request for work. Please reply only if available and interested, directly to $first_name $last_name" . PHP_EOL . PHP_EOL .
                "Last Name: $last_name" . PHP_EOL .
                "First Name: $first_name" . PHP_EOL .
                "Organization: $organization" . PHP_EOL .
                "Email: $email" . PHP_EOL .
                "Phone: $phone" . PHP_EOL .
                "Language: " . my_services($language) . PHP_EOL .
                "Event: $events" . PHP_EOL .
                "Services: " . my_services($services) . PHP_EOL .
                "Location: $location" . PHP_EOL .
                "Comments: $comments";

        $headers = "From: noreply@interpreterscoalition.org";
        mail($to, $subject, $body, $headers);
        header('Location:thx.php');
        exit();
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
<input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name'])   ;?>"> 
<span><?php echo $first_name_err;?></span>

<label>Last Name</label>
<input type="text" name="last_name" value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name'])   ;?>"> 
<span><?php echo $last_name_err;?></span>

<label>Organization</label>
<input type="text" name="organization" value="<?php if (isset($_POST['organization'])) echo htmlspecialchars($_POST['organization'])   ;?>"> 
<span><?php echo $organization_err;?></span>

<label>Email</label>
<input type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email'])   ;?>"> 
<span><?php echo $email_err;?></span>

<label>Phone</label>
    <input type="tel" name="phone" placeholder="xxx-xxx-xxxx" value="<?php if (isset($_POST['phone'])) echo htmlspecialchars($_POST['phone']); ?>">
    <span><?php echo $phone_err;?></span>


<label>In what languages do you need interpreting? Please select all that apply.</label>

    <li><input type="checkbox" name="language[]" value="amharic" <?php if (isset($_POST['language']) && in_array('amharic', $_POST['language'])) echo 'checked="checked"'; ?>>Amharic</li>
    <li><input type="checkbox" name="language[]" value="arabic" <?php if (isset($_POST['language']) && in_array('arabic', $_POST['language'])) echo 'checked="checked"'; ?>>Arabic</li>
    <li><input type="checkbox" name="language[]" value="asl" <?php if (isset($_POST['language']) && in_array('asl', $_POST['language'])) echo 'checked="checked"'; ?>>American Sign Language (ASL)</li>
    <li><input type="checkbox" name="language[]" value="burmese" <?php if (isset($_POST['language']) && in_array('burmese', $_POST['language'])) echo 'checked="checked"'; ?>>Burmese</li>
    <li><input type="checkbox" name="language[]" value="cambodian" <?php if (isset($_POST['language']) && in_array('cambodian', $_POST['language'])) echo 'checked="checked"'; ?>>Cambodian (Khmer)</li>
    <li><input type="checkbox" name="language[]" value="cantonese" <?php if (isset($_POST['language']) && in_array('cantonese', $_POST['language'])) echo 'checked="checked"'; ?>>Cantonese Chinese</li>
    <li><input type="checkbox" name="language[]" value="french" <?php if (isset($_POST['language']) && in_array('french', $_POST['language'])) echo 'checked="checked"'; ?>>French</li>
    <li><input type="checkbox" name="language[]" value="hindi" <?php if (isset($_POST['language']) && in_array('hindi', $_POST['language'])) echo 'checked="checked"'; ?>>Hindi</li>
    <li><input type="checkbox" name="language[]" value="japanese" <?php if (isset($_POST['language']) && in_array('japanese', $_POST['language'])) echo 'checked="checked"'; ?>>Japanese</li>
    <li><input type="checkbox" name="language[]" value="korean" <?php if (isset($_POST['language']) && in_array('korean', $_POST['language'])) echo 'checked="checked"'; ?>>Korean</li>
    <li><input type="checkbox" name="language[]" value="kurdish" <?php if (isset($_POST['language']) && in_array('kurdish', $_POST['language'])) echo 'checked="checked"'; ?>>Kurdish</li>
    <li><input type="checkbox" name="language[]" value="lao" <?php if (isset($_POST['language']) && in_array('lao', $_POST['language'])) echo 'checked="checked"'; ?>>Lao</li>
    <li><input type="checkbox" name="language[]" value="mandarin" <?php if (isset($_POST['language']) and in_array('mandarin', $_POST['language'])) echo 'checked="checked"'; ?>>Mandarin Chinese</li>
    <li><input type="checkbox" name="language[]" value="marshallese" <?php if (isset($_POST['language']) && in_array('marshallese', $_POST['language'])) echo 'checked="checked"'; ?>>Marshallese</li>
    <li><input type="checkbox" name="language[]" value="nepali" <?php if (isset($_POST['language']) && in_array('nepali', $_POST['language'])) echo 'checked="checked"'; ?>>Nepali</li>
    <li><input type="checkbox" name="language[]" value="oromo" <?php if (isset($_POST['language']) && in_array('oromo', $_POST['language'])) echo 'checked="checked"'; ?>>Oromo</li>
    <li><input type="checkbox" name="language[]" value="pashto" <?php if (isset($_POST['language']) && in_array('pashto', $_POST['language'])) echo 'checked="checked"'; ?>>Pashto</li>
    <li><input type="checkbox" name="language[]" value="persian" <?php if (isset($_POST['language']) && in_array('persian', $_POST['language'])) echo 'checked="checked"'; ?>>Persian (Dari/Farsi/Tajiki)</li>
    <li><input type="checkbox" name="language[]" value="portuguese" <?php if (isset($_POST['language']) && in_array('portuguese', $_POST['language'])) echo 'checked="checked"'; ?>>Portuguese</li>
    <li><input type="checkbox" name="language[]" value="punjabi" <?php if (isset($_POST['language']) && in_array('punjabi', $_POST['language'])) echo 'checked="checked"'; ?>>Punjabi</li>
    <li><input type="checkbox" name="language[]" value="romanian" <?php if (isset($_POST['language']) && in_array('romanian', $_POST['language'])) echo 'checked="checked"'; ?>>Romanian</li>
    <li><input type="checkbox" name="language[]" value="russian" <?php if (isset($_POST['language']) && in_array('russian', $_POST['language'])) echo 'checked="checked"'; ?>>Russian</li>
    <li><input type="checkbox" name="language[]" value="samoan" <?php if (isset($_POST['language']) && in_array('samoan', $_POST['language'])) echo 'checked="checked"'; ?>>Samoan</li>
    <li><input type="checkbox" name="language[]" value="serbocroatian" <?php if (isset($_POST['language']) && in_array('serbocroatian', $_POST['language'])) echo 'checked="checked"'; ?>>Serbo-Croatian (Bosnian/Croatian/Serbian)</li>
    <li><input type="checkbox" name="language[]" value="somali" <?php if (isset($_POST['language']) && in_array('somali', $_POST['language'])) echo 'checked="checked"'; ?>>Somali</li>
    <li><input type="checkbox" name="language[]" value="spanish" <?php if (isset($_POST['language']) && in_array('spanish', $_POST['language'])) echo 'checked="checked"'; ?>>Spanish</li>
    <li><input type="checkbox" name="language[]" value="swahili" <?php if (isset($_POST['language']) && in_array('swahili', $_POST['language'])) echo 'checked="checked"'; ?>>Swahili</li>
    <li><input type="checkbox" name="language[]" value="tagalog" <?php if (isset($_POST['language']) && in_array('tagalog', $_POST['language'])) echo 'checked="checked"'; ?>>Tagalog</li>
    <li><input type="checkbox" name="language[]" value="thai" <?php if (isset($_POST['language']) && in_array('thai', $_POST['language'])) echo 'checked="checked"'; ?>>Thai</li>
    <li><input type="checkbox" name="language[]" value="tigrinya" <?php if (isset($_POST['language']) && in_array('tigrinya', $_POST['language'])) echo 'checked="checked"'; ?>>Tigrinya</li>
    <li><input type="checkbox" name="language[]" value="turkish" <?php if (isset($_POST['language']) && in_array('turkish', $_POST['language'])) echo 'checked="checked"'; ?>>Turkish</li>
    <li><input type="checkbox" name="language[]" value="ukrainian" <?php if (isset($_POST['language']) && in_array('ukrainian', $_POST['language'])) echo 'checked="checked"'; ?>>Ukrainian</li>
    <li><input type="checkbox" name="language[]" value="urdu" <?php if (isset($_POST['language']) && in_array('urdu', $_POST['language'])) echo 'checked="checked"'; ?>>Urdu</li>
    <li><input type="checkbox" name="language[]" value="vietnamese" <?php if (isset($_POST['language']) && in_array('vietnamese', $_POST['language'])) echo 'checked="checked"'; ?>>Vietnamese</li>
    <li><input type="checkbox" name="language[]" value="other" <?php if (isset($_POST['language']) && in_array('other', $_POST['language'])) echo 'checked="checked"'; ?>>OTHER, please write in the comments box below.</li>
</ul>



<!-- Here down are different optiosn for a request -->
<label>What type of event are you having?</label>
<ul>
    <li>
        <input type="radio" name="events" value="Conference" <?php if (isset($_POST['events']) && $_POST['events'] == 'Conference') echo 'checked="checked"'; ?>> Conference
    </li>
    <li>
        <input type="radio" name="events" value="Deposition" <?php if (isset($_POST['events']) && $_POST['events'] == 'Deposition') echo 'checked="checked"'; ?>> Deposition
    </li>
    <li>
        <input type="radio" name="events" value="Town-Hall" <?php if (isset($_POST['events']) && $_POST['events'] == 'Town-Hall') echo 'checked="checked"'; ?>> Non-profit
    </li>
    <li>
        <input type="radio" name="events" value="Workshop" <?php if (isset($_POST['events']) && $_POST['events'] == 'Workshop') echo 'checked="checked"'; ?>> Workshop
    </li>
    <li>
        <input type="radio" name="events" value="Translation" <?php if (isset($_POST['events']) && $_POST['events'] == 'Translation') echo 'checked="checked"'; ?>> Translation
    </li>
    <!-- Added options -->
    <li>
        <input type="radio" name="events" value="One-on-one" <?php if (isset($_POST['events']) && $_POST['events'] == 'One-on-one') echo 'checked="checked"'; ?>> One-on-one meeting, bilingual bidirectional, consecutive interpretation, 1 interpreter
    </li>
    <li>
        <input type="radio" name="events" value="Small-group-discussion" <?php if (isset($_POST['events']) && $_POST['events'] == 'Small-group-discussion') echo 'checked="checked"'; ?>> Small group discussion &lt;10 participants, bilingual bidirectional, consecutive interpretation, 1 interpreter
    </li>
    <li>
        <input type="radio" name="events" value="Presentation-monolingual-monogroup" <?php if (isset($_POST['events']) && $_POST['events'] == 'Presentation-monolingual-monogroup') echo 'checked="checked"'; ?>> Presentation in one language to a monolingual group, bilingual unidirectional, simultaneous interpretation, team of 2 interpreters
    </li>
    <li>
        <input type="radio" name="events" value="Presentation-monolingual-multigroup" <?php if (isset($_POST['events']) && $_POST['events'] == 'Presentation-monolingual-multigroup') echo 'checked="checked"'; ?>> Presentation in one language to a multilingual group, multilingual unidirectional, simultaneous interpretation
    </li>
    <li>
        <input type="radio" name="events" value="Presentation-bilingual-monogroup" <?php if (isset($_POST['events']) && $_POST['events'] == 'Presentation-bilingual-monogroup') echo 'checked="checked"'; ?>> Presentation in two languages to a monolingual group, bilingual unidirectional, simultaneous interpretation, team of 2 interpreters
    </li>
    <li>
        <input type="radio" name="events" value="Presentation-multilingual-multigroup" <?php if (isset($_POST['events']) && $_POST['events'] == 'Presentation-multilingual-multigroup') echo 'checked="checked"'; ?>> Presentation in multiple languages to a multilingual group, multilingual unidirectional, simultaneous interpretation, team of 2 interpreters per each language
    </li>
    <li>
        <input type="radio" name="events" value="Presentation-QA-bilingual" <?php if (isset($_POST['events']) && $_POST['events'] == 'Presentation-QA-bilingual') echo 'checked="checked"'; ?>> Presentation in one or two languages with Q&A or bilingual group discussion, bilingual bidirectional, simultaneous interpretation, team of 2 interpreters
    </li>
    <li>
        <input type="radio" name="events" value="Presentation-QA-multilingual" <?php if (isset($_POST['events']) && $_POST['events'] == 'Presentation-QA-multilingual') echo 'checked="checked"'; ?>> Presentation in multiple languages with Q&A to a multilingual group or multilingual group discussion, multilingual bidirectional, simultaneous interpretation, team of 2 interpreters per each language
    </li>
    <!-- Add any additional specific event options here -->
</ul>

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


<label>Location</label>
<select name="location">
  <option value="" <?php if (isset($_POST['location']) && $_POST['location'] == "") echo 'selected="selected"'; ?>>Select One !</option>

  <option value="remote" <?php if (isset($_POST['location']) && $_POST['location'] == "remote") echo 'selected="selected"'; ?>>Remote videoconference - Zoom</option>

    <option value="snohomish" <?php if (isset($_POST['location']) && $_POST['location'] == "snohomish") echo 'selected="selected"'; ?>>Snohomish County</option>


  <option value="king" <?php if (isset($_POST['location']) && $_POST['location'] == "king") echo 'selected="selected"'; ?>>King County</option>

  <option value="pierce" <?php if (isset($_POST['location']) && $_POST['location'] == "pierce") echo 'selected="selected"'; ?>>Pierce County</option>

  <option value="thurston" <?php if (isset($_POST['location']) && $_POST['location'] == "thurston") echo 'selected="selected"'; ?>>Thurston County</option>

  <option value="easternwa" <?php if (isset($_POST['location']) && $_POST['location'] == "easternwa") echo 'selected="selected"'; ?>>Eastern Washington</option>
</select>
<span><?php echo $location_err;?></span>


<label>Please tell us any additional details, location, number of people attending:</label>

<textarea name="comments"><?php if (isset($_POST['comments'])) echo htmlspecialchars($_POST['comments']); ?></textarea>
<span><?php echo $comments_err;?></span>

<label>Do you agree with our privacy policy and contract terms?</label>
<ul>
<li><input type="radio" name="privacy" value="yes" <?php if (isset($_POST['privacy']) && $_POST ['privacy'] == "yes") echo 'checked= "checked"';?>>Yes</li>

</ul>
<span><?php echo $privacy_err;?></span>
<input type="submit" value= "Send it">

<p><a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">Reset</a></p>


</fieldset>
</form>


</body>
</html>