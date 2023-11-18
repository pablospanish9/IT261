<?php    
define('THIS_PAGE', basename($_SERVER['PHP_SELF'])); 

switch (THIS_PAGE) {
    case 'index.php':
        $title = 'Home page of our Website Project';
        $body = 'Home';
        break;

    case 'about.php':
        $title = 'About page of our Website Project';
        $body = 'about inner';
        break;

    case 'daily.php':
        $title = 'Daily page of our Website Project';
        $body = 'daily inner';
        break;

    case 'project.php':
        $title = 'Project page of our Website Project';
        $body = 'project inner';
        break;

    case 'contact.php':
        $title = 'Contact page of our Website Project';
        $body = 'contact inner';
        break;

    case 'gallery.php':
        $title = 'Gallery page of our Website Project';
        $body = 'gallery inner';
        break;
}
// our navigation array

// // below is the code given at the beginning of quarter
// $nav = array (
//     'index.php' => 'Home',
//     'about.php' => 'About',
//     'daily.php' => 'Daily',
//     'project.php' => 'Project',
//     'contact.php' => 'Contact',
//     'gallery.php' => 'Gallery'
// );

// here is a newer version of this section
$nav['index.php'] = 'Home';
$nav['about.php'] = 'About';
$nav['daily.php'] = 'Daily'; 
$nav['project.php'] = 'Project'; 
$nav['contact.php'] = 'Contact'; 
$nav['gallery.php'] = 'Gallery'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,
     initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="css/styles.css" 
    type="text/css" rel="stylesheet">
</head>
<body class ="<?php echo $body; ?>">
  <header>
<div class="inner-header">
    <a href="index.php">
        <img id="logo" src="images/php_logo.png" alt="logo">
    </a>
<!-- Navigation
    <nav>
        <ul>
           <li><a href="">Home</a></li>
           <li><a href="">About</a></li>
           <li><a href="">Daily</a></li>
           <li><a href="">Project</a></li>
           <li><a href="">Contact</a></li>
           <li><a href="">Gallery</a></li>
        </ul>
  </nav> -->

  <nav>
<ul>
  <?php              
  foreach ($nav as $key => $value) {
    if (THIS_PAGE == $key) {
        echo '<li><a style="color:red;" 
        href="'.$key.'">'.$value.'</a></li>'; 
    } else {
        echo '<li><a style="color:green;"
         href="'.$key.'">'.$value.'</a></li>'; 
    }
}  // end for each
  ; ?>
  </ul>
</nav>

</div>
<!-- end inner header -->
  </header> 