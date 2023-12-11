<?php
// this is my server page that will communicate with the database
// our session - this is where we will start our session. A session is a way to store information
// we would like the information that is inputted via our registration form to land in our database!!!

session_start();
include('config.php');
// here we will eventually have a header include
// include('./includes/header.php');

$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

// // Initialize errors array
$errors = [];

// we will be asking if reg_user is set
// also using a new function which removes extra characters mysqli_real_escape_string

if(isset($_POST['reg_user'])) {
 $first_name = mysqli_real_escape_string($iConn, $_POST['first_name']);    
 $last_name = mysqli_real_escape_string($iConn, $_POST['last_name']);
 $email = mysqli_real_escape_string($iConn, $_POST['email']);
 $username = mysqli_real_escape_string($iConn, $_POST['username']);
 $password1 = mysqli_real_escape_string($iConn, $_POST['password1']);
 $password2 = mysqli_real_escape_string($iConn, $_POST['password2']);
    

    // message to display to the end user if they are not inputting information:
    // if empty - we are going to say something
    // introducing a new function - array_push();

    if(empty($first_name)) {
        array_push($errors, 'First name is required');
    }

    if(empty($last_name)) {
        array_push($errors, 'Last name is required');
    }

    if(empty($email)) {
        array_push($errors, 'Email is required');
    }

    if(empty($username)) {
        array_push($errors, 'Username is required');
    }

    if(empty($password1)) {
        array_push($errors, 'Password is required');
    }

    // logic - we will not ask if password 2 is empty, our question is:
    // does password1 = password2

    if($password1 !== $password2) {
        array_push($errors, 'Passwords do not match!');
    }
    
    // we now have to select from the table where username = username and password =password And limit 1

    $user_check_query = "SELECT * FROM users WHERE username = '$username' OR email = '$email' LIMIT 1";

    $result = mysqli_query($iConn, $user_check_query)
    or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

    $rows = mysqli_fetch_assoc($result);

    //we can only have one unique email, or one unique username
    // if there is a username in our database, the end user cannot user that username
    // if there is already an email in our database, the end user cannot user that email

    if ($rows) {
        if ($rows['username'] == $username){
            array_push($errors, 'Username already exists!');
        }

        if ($rows['email'] == $email){
            array_push($errors, 'Email already exists!');
        }
    } // end big if statements

    // if there are NO errors, life is good

    if(count($errors) == 0) {
        $password = md5($password1);
        // insert information into database
        $query = "INSERT INTO users (first_name, last_name, email, username, password) VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";
        mysqli_query($iConn, $query);

        $_SESSION['username'] = $username;
        $_SESSION['success'] = 'You have successfully registered!';

        header('Location: login.php');
        exit();

    } // end if errors

} // close if isset reg_user


if(isset($_POST['login_user'])) {
    // our login page will only have two input fields
    // one for username and one for password
    $username = mysqli_real_escape_string($iConn, $_POST['username']);    
    $password = mysqli_real_escape_string($iConn, $_POST['password']);  

    if(empty($username)) {
        array_push($errors, 'Username is required');
    }
    
    if(empty($password)) {
        array_push($errors, 'Password is required');
    }
    // we are counting our errors, and if we have no errors - we will continue the same way

    if(count($errors) == 0) {
   $password = md5($password);

// we are going to query our users table to make sure that our username and password match

$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

$results = mysqli_query($iConn, $query);

if (mysqli_num_rows($results) == 1) {
$_SESSION['username'] = $username;
$_SESSION['success'] = $success;

// if the above is successful, we will be directed to the index.php!!

header('Location:index.php');
} else {

    array_push($errors, 'Wrong username/password combination!');
}


    } // end count errors

} // close if isset login_user
?>
