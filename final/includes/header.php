<?php 
// this is our index.php page which in the big picture represents the home page of a website,and the only way to view is to register and login
session_start();
include_once('config.php');
// Logic: if the username has NOT been set, you will not see the index.php file but will be directed back to the login page.
if(!isset($_SESSION['username'])) {
    header('Location:login.php');
    exit; // Ensure script termination after redirection
}
if(isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('Location:login.php');
    exit; // Ensure script termination after redirection
}
?>
<!-- Here is the end of the session checks, below is the 
Beginning of the header for pages -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
     initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <!-- <link href="css/stylesgallery.css" 
    type="text/css" rel="stylesheet"> -->
    
    <link href="css/styles2.css" 
    type="text/css" rel="stylesheet">

    <!-- <link href="../weeks/week6/css/styles.css" type="text/css" rel="stylesheet">

 -->

  </head>
<body class ="<?php echo $body; ?>">
  <header>
<div class="inner-header">
    <a href="index.php">
        <img id="logo" src="images/php_logo.png" alt="logo">
    </a>

  <nav>
<ul>
  <?php  
  echo make_links($nav);
?>
  </ul>
</nav>
<?php
if(isset($_SESSION['username'])) : ?>
    <div class="welcome-logout">
        <h3> Hello <?php echo $_SESSION['username']; ?></h3>
        <a href="index.php?logout=1">Logout</a>
    </div>
    <!-- end welcome-logout -->
<?php endif; ?>
</div>

<?php 
// if our Session for the username is successful, we will display a message
if(isset($_SESSION['success'])): ?>
    <div class="success">
        <h3>
            <?php echo $_SESSION['success'];
            unset($_SESSION['success']);
            ?>
        </h3>
    </div>
<?php endif; ?>

<!-- end inner header -->
  </header> 