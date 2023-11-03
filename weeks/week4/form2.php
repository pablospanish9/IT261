<?php
// logic - If I do not enter anything inside the input <fieldset,
// there will be a message.
// If a field is emplty, we need to do something - if else statement
// first_name, last_name, email, comments
// careful with braces

if (isset($_POST['first_name'],
 $_POST['last_name'],
  $_POST['email'], 
  $_POST['comments'])) {   // start of isset code
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $comments = $_POST['comments'];

    // Create another if statement - if fields are empty, 
    // echo please fill out the fields
    if (empty($_POST['first_name'] && 
    $_POST['last_name'] && 
    $_POST['email'] && 
    $_POST['comments'])) {
        echo 'Please fill out all of the fields';
    } // end of if fields are empty
    else {
        echo $first_name;
        echo '<br>';
        echo $last_name;
        echo '<br>';
        echo $email;
        echo '<br>';
        echo $comments;  
        echo '<br>';
    }
} // end isset
 else {
    echo '
    <form action ="" method="post">
    <label>First Name</label>
    <input type="text" name="first_name">

    <label>Last Name</label>  
    <input type="text" name="last_name">

    <label>Email</label>
    <input type="email" name="email">

    <label>Comments</label>
    <textarea name = "comments"></textarea>

    <input type="submit" value="Send it!">
    </form>
    <p><a href="">RESET</a></p>
    ';
}
?>
