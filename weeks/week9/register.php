<?php
include('server.php');
// include talking to our server.php
// eventually we will be connecting to our header include
include ('./includes/header.php');
?>
<div id="wrapper-register">
<h1 class="center">Register Today!</h1>
<!-- Here, below, is the code to create a register page -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <!-- first name, last name, email, username, password 1, password 2 -->
<fieldset>
    <label>First name</label>
    <input type="text" name="first_name" value="<?php if (isset($_POST['first_name'])) echo htmlspecialchars($_POST['first_name']); ?>"> 

    <label>Last name</label>
    <input type="text" name="last_name" value="<?php if (isset($_POST['last_name'])) echo htmlspecialchars($_POST['last_name']); ?>"> 

    <label>Email</label>
    <input type="email" name="email" value="<?php if (isset($_POST['email'])) echo htmlspecialchars($_POST['email']); ?>"> 

    <label>Username</label>
    <input type="text" name="username" autocomplete="off" value="<?php if (isset($_POST['username'])) echo htmlspecialchars($_POST['username']); ?>">

    <label>Password</label>
    <input type="password" name="password1" autocomplete="off" value="<?php if (isset($_POST['password1'])) echo htmlspecialchars($_POST['password1']); ?>">

    <label>Confirm your password</label>
    <input type="password" name="password2" autocomplete="off" value="<?php if (isset($_POST['password2'])) echo htmlspecialchars($_POST['password2']); ?>">

    <button type="submit"  name="reg_user"  class="btn"> Register! </button>

    <button type="button" onclick="window.location.href='<?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ;?>'"> Reset </button>
</fieldset>
</form>
<p class="center">Already a member? <a href="login.php">Please login here!</a></p>

<?php
include('errors.php'); ?>
</div> 
<!-- end wrapper -->
<!-- non include footer to have separate css -->
<footer class="non-fixed">
    <ul>
        <li>Copyright &copy;
            2023</li>
        <li>All Rights Reserved</li>
        <li><a href="../../index.php">Web Design by Pablo</a></li>
        <li><a id="html-checker" href="#">HTML Validation</a></li>
        <li><a id="css-checker" href="#">CSS Validation</a></li>
        </ul>
        
        <script>
                document.getElementById("html-checker").setAttribute("href","https://validator.w3.org/nu/?doc=" + location.href);
                document.getElementById("css-checker").setAttribute("href","https://jigsaw.w3.org/css-validator/validator?uri=" + location.href);
        </script>

  </footer>
  
</body>

</html>