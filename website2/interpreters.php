<?php

include('config.php');
include('./includes/header.php');
?>

<div class="interpreters-view-heading">
    <h2>Welcome to our interpreters Page</h2>
</div>
<main id="interpreters-main">

<?php
$sql = 'SELECT * FROM interpreters';

//now, we need to connect to the database

$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die(myError(__FILE__,__LINE__,mysqli_connect_error()));

$result = mysqli_query($iConn, $sql)
or die(myError(__FILE__,__LINE__,mysqli_error($iConn)));

// we have a row, which translates into an array
// if our result is greater than 0, we are happy

if(mysqli_num_rows($result) > 0) {
// we are going to add a while loop

while($row = mysqli_fetch_assoc($result)) {
    echo '
    <h2>'.$row['language'].' interpreter: '.$row['first_name'].' '.$row['last_name'].'</h2>
    <ul>
    <li>Email: '.$row['email'].'</li>
    <li>Telephone: '.$row['telephone'].'</li>
    <li>'.$row['cerdentials'].'</li>
    </ul>

<p>For more information about '.$row['first_name'].', click <a href="interpreters-view.php?id='.$row['interpreter_id'].'">here</a></p>';


} // end while loop



} else {
    echo 'Nobody home!!!';
} 

// below we release the server:
@mysqli_free_result($result);
@mysqli_close($iConn);

?>

</main>

<aside>

</aside>


<!-- end wrapper -->

<?php
include('./includes/footer.php');