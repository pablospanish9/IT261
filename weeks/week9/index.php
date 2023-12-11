<?php 
// this is our index.php page which in the big picture represents the home page of a website,and the only way to view is to register and login

session_start();
include('config.php');

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

include('./includes/header.php');
?>

<header>
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
<?php endif; 

if(isset($_SESSION['username'])) : ?>
    <div class="welcome-logout">
        <h3> Hello <?php echo $_SESSION['username']; ?></h3>
        <a href="index.php?logout=1">Logout</a>
    </div>
    <!-- end welcome-logout -->
<?php endif; ?>
</header>

<!-- my wrapper starts here -->
<body class="register-page">
<div id="wrapper-register">
    <h1>Welcome to the home page of our website!!!</h1>
</div> 
<!-- end div id wrapper -->

<?php include('./includes/footer.php'); ?>
</body>