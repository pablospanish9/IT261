<?php


// $variable = 'This is our variable';
// if (isset($variable)) {
//     echo 'Variable has been set';
// } else
// echo 'Variable has not been set!';

// echo '<br>';

// if (isset($_GET['today'])) {
//     echo 'Today has been set';
// } else
// echo 'NOT!!!';

if (isset($_GET['today'])) {
    $today = $_GET['today'];
} else {
    $today = date('l');
}

switch($today) {
    case 'Monday':
        $coffee = '<h2>Monday is our Americano Day</h2>';
        $pic = 'americano.jpg';
        $alt = 'A classic Americano';
        $content = 'The <strong>Americano</strong> offers 
        a well-balanced flavor, making it the perfect start 
        for a busy Monday. Comprised of espresso and hot water,
         it\'s a simple yet invigorating coffee experience.';
        break;
    case 'Tuesday':
        $coffee = '<h2>Tuesday is our Cappuccino Day</h2>';
        $pic = 'cap.jpg';
        $alt = 'A frothy Cappuccino';
        $content = 'A <strong>Cappuccino</strong> is 
        perfect for those who want a strong coffee with
         a creamy texture. The espresso is perfectly 
         balanced by steamed milk and froth, making it a 
         comforting Tuesday choice.';
        break;
    case 'Wednesday':
        $coffee = '<h2>Wednesday is our Frappuccino Day</h2>';
        $pic = 'frap.jpg';
        $alt = 'A chilled Frappuccino';
        $content = 'A <strong>Frappuccino</strong> is 
        your mid-week sweet escape. Blended with ice, 
        it\'s a cooling drink that combines coffee, milk,
         and various flavors. Perfect for sipping on a Wednesday
          afternoon.';
        break;
    case 'Thursday':
        $coffee = '<h2>Thursday is our Macchiato Day</h2>';
        $pic = 'macchiato.jpg';
        $alt = 'An elegant Macchiato';
        $content = 'On Thursdays, we offer the
         <strong>Macchiato</strong>, an espresso-based drink 
         with just a small amount of milk. This drink highlights 
         the rich espresso flavors, making it an excellent 
         choice for coffee enthusiasts.';
        break;
    case 'Friday':
        $coffee = '<h2>Friday is our Pumpkin Latte Day</h2>';
        $pic = 'pumpkin.jpg';
        $alt = 'A delicious Pumpkin Latte';
        $content = '<strong>Pumpkin Latte</strong> is a 
        fall favorite that combines espresso with pumpkin 
        spice flavors. Made with a mix of traditional autumn 
        spice flavors like cinnamon, nutmeg, and cloves, 
        the Pumpkin Latte is the quintessential drink to enjoy while the leaves are falling.';
        break;
    case 'Saturday':
        $coffee = '<h2>Saturday is our Green Tea Day</h2>';
        $pic = 'green-tea.jpg';
        $alt = 'Refreshing Green Tea';
        $content = '<strong>Green Tea</strong> is an excellent 
        choice for a relaxing Saturday. Packed with antioxidants,
         it offers a mild caffeine kick, making it a smart and healthy option.';
        break;
    case 'Sunday':
        $coffee = '<h2>Sunday is our Regular Coffee Day</h2>';
        $pic = 'coffee.png';
        $alt = 'Classic Regular Coffee';
        $content = 'On Sundays, we go back to basics with our 
        <strong>Regular Coffee</strong>. It\'s a straightforward, 
        unadulterated cup of coffee that offers a clean, 
        crisp finish.';
        break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch Classwork Exercise</title>
    <style>
        * {
            padding:0;
            margin:0;
            box-sizing:border-box;
        }
        body {
            background-color: #e6f7ff;
        }
        #wrapper {
            width: 940px;
            margin:20px auto;
            padding: 20px;
        }

        #wrapper img {
             width: 400px;
                height: auto;
        }
        h1, h2, img, p {
            margin-bottom: 15px;    
        }

    </style>
</head>
<body>

<div id="wrapper">
    <h1>My Wonderful Switch Classwork Exercise</h1>
    <?php echo $coffee; ?>
    <br>
    <img src="./images/<?php echo $pic; ?>" alt="<?php echo $alt; ?>">
    <br>
    <?php echo '<p>' . $content . '</p>'; ?>
    <h2>Check out our Daily Specials</h2>
    <ul>
        <li><a href="switch.php?today=Sunday">Sunday</a></li>
        <li><a href="switch.php?today=Monday">Monday</a></li>
        <li><a href="switch.php?today=Tuesday">Tuesday</a></li>
        <li><a href="switch.php?today=Wednesday">Wednesday</a></li>
        <li><a href="switch.php?today=Thursday">Thursday</a></li>
        <li><a href="switch.php?today=Friday">Friday</a></li>
        <li><a href="switch.php?today=Saturday">Saturday</a></li>
    </ul>
</div>
</body>
</html>