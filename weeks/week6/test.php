<?php

// ... [previous code]

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
    // ... [previous checks]

    // Check if first name is empty
    if(empty($_POST['first_name'])) {
        $first_name_err = 'Please fill in your first name'; // Error message added
    } else {
        $first_name = $_POST['first_name'];
    }

    // Check if last name is empty
    if(empty($_POST['last_name'])) {
        $last_name_err = 'Please fill in your last name'; // Error message added
    } else {
        $last_name = $_POST['last_name'];
    }

    // Check if email is empty
    if(empty($_POST['email'])) {
        $email_err = 'Please fill in your email'; // Error message added
    } else {
        $email = $_POST['email'];
    }

    // Check if gender is empty
    if(empty($_POST['gender'])) {
        $gender_err = 'Please select your gender'; // Error message modified to 'select'
    } else {
        $gender = $_POST['gender'];
    }

    // Check if phone is empty
    if(empty($_POST['phone'])) {
        $phone_err = 'Please fill in your phone number'; // Error message added
    } else {
        $phone = $_POST['phone'];
    }

    // Check if wines is empty - Note that wines is an array
    if(empty($_POST['wines'])) {
        $wines_err = 'Please select your wine(s)'; // Error message modified to 'select'
    } else {
        $wines = $_POST['wines'];
    }

    // Check if comments is empty
    if(empty($_POST['comments'])) {
        $comments_err = 'Please enter your comments'; // Error message added
    } else {
        $comments = $_POST['comments'];
    }

    // Check if privacy is agreed upon
    if(!isset($_POST['privacy']) || $_POST['privacy'] != 'yes') {
        $privacy_err = 'You must agree to our privacy policy'; // Error message added
    } else {
        $privacy = $_POST['privacy'];
    }

    // Check if regions is selected
    if($_POST['regions'] == "") {
        $regions_err = 'Please choose your region'; // Error message modified to 'choose'
    } else {
        $regions = $_POST['regions'];
    }

    // ... [my_wines function]

    // Check that all fields are filled out before sending the email
    if(empty($first_name_err) &&
       empty($last_name_err) &&
       empty($email_err) &&
       empty($wines_err) &&
       empty($phone_err) &&
       empty($regions_err) &&
       empty($gender_err) &&
       empty($comments_err) &&
       empty($privacy_err)) {

        // All fields are filled out, send the email
        if(mail($to, $subject, $body, $headers)) {
            header('Location: thx.php');
            exit; // Make sure no further code is executed after redirection
        } else {
            // Handle case where email could not be sent
            echo 'Email could not be sent.';
        }
    }

    // ... [rest of the code]

} // End of request method check
?>
