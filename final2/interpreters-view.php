<?php
// do not call out the header include yet!! 
// the following information is above the Doctype
include('config.php');

ini_set('display_errors', 1);
error_reporting(E_ALL);
// is Get set???

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
} else {
    header ('Location: interpreters.php');
}

$sql = 'SELECT * FROM interpreters WHERE interpreter_id = '.$id;

$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn, $sql)
or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

  $first_name = stripcslashes($row['first_name']);     
  $last_name = stripcslashes($row['last_name']); 
  $email = stripcslashes($row['email']);
  $telephone = stripcslashes($row['telephone']);  
  $language = stripcslashes($row['language']); 
  $credentials = stripcslashes($row['credentials']); 
  $details = stripcslashes($row['details']); 
  // will I add a column?
 $feedback = '';


    } // close while loop
} else {

$feedback = 'Houston, we have a problem';
}

include('./includes/header.php');
?>

<div class="interpreters-view-heading">
    <h1>Welcome to our interpreters View Page</h1>
</div>

<div class="interpreters-view-wrapper">
<main class="interpreters-view-main">

<h2>Introducing: <?php echo $first_name;?></h2>
<ul>
<?php
echo '
<li><b>First Name: </b>'.$first_name.'</li>
<li><b>Last Name: </b>'.$last_name.'</li>
<li><b>Language: </b>'.$language.'</li>
<li><b>credentials: </b>'.$credentials.'</li>
<li><b>Email: </b>'.$email.'</li>
<li><b>telephone: </b>'.$telephone.'</li>


';
?>
</ul>
<br>
<p><?php echo $details;?></p>
<p>Return to our <a href="interpreters.php">interpreters page!</a></p>



</main>

<aside class="interpreters-view-aside">
<div class="interpreters-view-aside-content">
<figure>
<img src="./images/interpreters<?php echo $id;?>.jpg" alt="<?php $first_name?>">
</figure>

<?php
echo '
<h3>'.$first_name.' '.$last_name.'</h3>
<h4 style="font-style: italic;">'.$language.' interpreter</h4>
';
?>
</div>
</aside>
</div>

<!-- end div interpreters-view-wrapper -->

<?php

@mysqli_free_result($result);
@mysqli_close($iConn);

include('./includes/footer.php');