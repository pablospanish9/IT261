<?php
include('server.php');
// include talking to our server.php
// eventually we will be connecting to our header include
// include ('./includes/header.php');
?>
<!-- Here, below, is the code to create a register page -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <!-- first name, last name, email, username, password 1, password 2 -->

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

    <button type="button" onclick="window.location.href='<? echo htmlspecialchars($_SERVER['PHP_SELF'])  ;?>'"> Reset </button>
</form>

<?php
include('errors.php'); ?>

<!-- this snipet is to clear the password filled in by Chrome on my form:-->

<script>
    window.onload = function() {
        document.getElementById('username').value = '';
        document.getElementById('password1').value = '';
        document.getElementById('password2').value = '';
    };
</script>