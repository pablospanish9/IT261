<?

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
    $dollars = $amount * $currency;

    if (!empty($name && $email && $amount && $currency) && ($bank != NULL)) {

    // Check if dollars are more than or equal to 1000 for a happy video
    if ($dollars >= 1000) {
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/HAPPY_VIDEO_ID?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    } elseif ($dollars < 999) {
        echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/OTHER_VIDEO_ID?autoplay=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    }

    echo '<div class="box">
    <h2>Hello '.$name.'</h2>
    <p>You now have <b>$' . number_format($dollars, 2) . ' American dollars</b> and we will be emailing you at <b>' . $email . '</b> with your information, as well as depositing your funds at <b>' . $bank . ' bank!</b></p>
    </div>';
    
    // ... [additional code]
