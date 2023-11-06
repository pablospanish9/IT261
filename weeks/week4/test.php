<?php

if (isset($_POST['name'], 
$_POST['email'], 
$_POST['amount'], 
$_POST['currency'],
$_POST['bank'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $amount = floatval($_POST['amount']);
    $currency = floatval($_POST['currency']);
    $bank = $_POST['bank'];
    $total = $amount * $currency;

    if (!empty($name) && !empty($email) && !empty($amount) && !empty($currency) && !empty($bank)) {

    echo '<div class="box">
    <h2>Hello '.$name.'</h2>
    <p>You now have <b>$' . number_format($total, 2) . ' American dollars</b> and we will be emailing you at <b>' . $email . '</b> with your information, as well as depositing your funds at <b>' . $bank . ' bank!</b></p>';

    // Determine which video to display based on the amount
    if ($total >= 1000) {
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/O5APc0z49wg?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    } elseif ($total < 999) {
        // Place the other video's embed code here
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/OTHER_VIDEO_ID?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }

    echo '</div>'; // Close the box div
    }
}

// ... [rest of the PHP code]
?>
