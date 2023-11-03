<?php
//this is our first form.
// We will be using the $_GET global variable

// Our logic is: I will be asking for a name and email in my form
// If it is set, it is good.
// If it is not set, show me the form

if(isset($_GET['name'],
    $_GET['email'])) {
        $name = $_GET['name'];
        $email = $_GET['email'];
    } else {
        echo '
        <form action = "" method="get">
        <label>NAME</label>
        <input type="text" name="name">
        <label>EMAIL</label>
        <input type="email" name="email">
        <input type="submit" value="Confirm">



        </form>
        ';
    }
    
    