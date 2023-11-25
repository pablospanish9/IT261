<?php  

ob_start();

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

        case 'thx.php':
            $title = 'Thank you';
            $body = 'Thanks inner';
            break;
}
// our navigation array

// // below is the code given at the beginning of quarter
$nav = array (
    'index.php' => 'Home',
    'about.php' => 'About',
    'daily.php' => 'Daily',
    'project.php' => 'Project',
    'contact.php' => 'Contact',
    'gallery.php' => 'Gallery'
);

// here is a newer version of this section
// $nav['index.php'] = 'Home';
// $nav['about.php'] = 'About';
// $nav['daily.php'] = 'Daily'; 
// $nav['project.php'] = 'Project'; 
// $nav['contact.php'] = 'Contact'; 
// $nav['gallery.php'] = 'Gallery'; 

// here is the beginning of the make_links function from the functions page:
function make_links($nav) {
    $myreturn = '';
    foreach ($nav as $key => $value) {
        if (THIS_PAGE == $key) {
            $myreturn .= '<li><a class="current" href="'.$key.'">'.$value.'</a></li>';
        } else {
            $myreturn .= '<li><a href="'.$key.'">'.$value.'</a></li>';
        }
    } // end foreach function
    return $myreturn;

    // Call the function and echo its result to display the navigation   
        
    } // end make_links function



// this is the beginning of the switch for homework 3
  if (isset($_GET['today'])) {
      $today = $_GET['today'];
  } else {
      $today = date('l');
  }
// rotating content:
  switch($today) {
    case 'Monday':
        $movie = '<h2>Monday is Blade Runner Day</h2>';
        $pic = 'blade.jpg';
        $alt = 'Blade Runner Movie';
        $color = '#f2d0e8'; 
        $content = 'Blade Runner explores themes of 
        humanity through the eyes of Rick Deckard, 
        a retired police officer tasked with hunting
         synthetic beings known as replicants.
          This cyberpunk classic delves deep into
           existential questions. Somehow I enjoy dystopian
           movies. And it is good to start the week on Monday with a dystopian movie. ';
        break;
    case 'Tuesday':
        $movie = '<h2>Tuesday is Dune Day</h2>';
        $pic = 'dune.jpg';
        $alt = 'Dune Movie';
        $color = '#c8ded1'; 
        $content = 'Dune takes you into a future where 
        interstellar travel and complex political machinations
         reign. At the heart is the desert planet of Arrakis, 
         the only source of the invaluable spice Melange. I truly
         enjoyed this movie and I wanted to watch more of this
         in a series.';
        break;
    case 'Wednesday':
        $movie = '<h2>Wednesday is Everything Everywhere All At Once Day</h2>';
        $pic = 'everywhere.jpg';
        $alt = 'Everything Everywhere All At Once Movie';
        $color = '#f0adc0'; 
        $content = 'Everything Everywhere All At Once is 
        an intriguing science fiction drama that plays with 
        the multiverse theory. It explores personal and cosmic 
        issues through its complex but relatable characters. 
        The movie is absurd but I enjoyed the possibilities';
        break;
    case 'Thursday':
        $movie = '<h2>Thursday is Guardians of the Galaxy Day</h2>';
        $pic = 'guardians.jpg';
        $alt = 'Guardians of the Galaxy Movie';
        $color = '#ded5a9'; 
        $content = 'Guardians of the Galaxy mixes humor 
        with action, following a group of intergalactic 
        misfits who band together to protect a powerful orb. 
        The film is both a visual spectacle and a story of 
        friendship. I had to watch the entire series twice. It
        is very well made and the effects are VideoGame like.';
        break;
    case 'Friday':
        $movie = '<h2>Friday is Riddick Day</h2>';
        $pic = 'riddick.jpg';
        $alt = 'Riddick Movie';
        $color = '#b8c0cc'; 
        $content = 'Riddick offers a gritty take on the
         survival genre, starring Vin Diesel as the
          antihero stranded on a hostile planet.
           The movie balances action and suspense.
           I could not believe how someone could be so 
           rugged under such harsh conditions and still survive';
        break;
    case 'Saturday':
        $movie = '<h2>Saturday is Star Wars Day</h2>';
        $pic = 'starwars.jpg';
        $alt = 'Star Wars Movie';
        $color = '#cce0db'; 
        $content = 'Star Wars is more than just a movie; it is a 
        cultural phenomenon that has captured the hearts 
        of generations. The epic saga of good versus 
        evil in a galaxy far, far away makes for compelling
         viewing. It is hard to follow the entire story but 
         I enjoyed it at a simpler level, and I discover new things
         about the movie every time I watch it again.';
        break;
    case 'Sunday':
        $movie = '<h2>Sunday is Star Trek Day</h2>';
        $pic = 'startrek.jpg';
        $alt = 'Star Trek Movie';
        $color = '#dbd0f2'; 
        $content = 'Star Trek focuses on the voyages of the 
        starship USS Enterprise. More than just a space 
        adventure, the series also tackles ethical and 
        social issues, making it a thought-provoking watch 
        for a Sunday. Star Trek was the series that got me
        used to watching and enjoying science fiction movies.';
        break;
  }

// my form's PHP



// Start of code to call hero pictures for index page

$photos [0] = 'fishes';
$photos [1] = 'flowers';
$photos [2] = 'lake';
$photos [3] = 'sunset';
$photos [4] = 'zion';

// the code below calls a random image:
// $i = rand(0, 4);
// $selected_image = ''.$photos[$i].'.jpg';
// echo '<img src="./images/'.$selected_image.'" alt="'.$photos[$i].'">';

// echo '<h2>We are going create a function</h2>';

function random_images($photos){
$my_return = '';
$i = rand(0, 4);
$selected_image = ''.$photos[$i].'.jpg';
$my_return = '<img src="./images/'.$selected_image.'" alt="'.$photos[$i].'">';
return $my_return;
}// end function
// the code below calls the random images:
// echo random_images($photos);



// the code below is the php that corresponds to the Contact page, taken from the Form 5 week 7 page:

// <?php

ob_start();

$first_name = '';
$last_name = '';
$email = '';
$services = '';
$phone = '';
$regions = '';
$events = '';
$comments = '';
$privacy = '';

// Initialize the error messages
$first_name_err = '';
$last_name_err = '';
$email_err = '';
$services_err = '';
$phone_err = '';
$regions_err = '';
$events_err = '';
$comments_err = '';
$privacy_err = '';

if($_SERVER['REQUEST_METHOD'] == "POST") {
// if input are empty, we will declare a statement else we will assign the $_POSTS to a variable
// $services = $_POST['services']

if(empty($_POST['services'])) {
// say something or do something
$services_err = 'What... no services?';
} else {
    $services = $_POST['services'];
}

if(empty($_POST['first_name'])) {
    // say something or do something
    $first_name_err = 'Please fill in your first name';
    } else {
    $first_name = $_POST['first_name'];
}

if(empty($_POST['last_name'])) {
    $last_name_err = 'Please fill in your last name';
    } else {
    $last_name = $_POST['last_name'];
}

if(empty($_POST['email'])) {
    $email_err = 'Please fill in your email';
    } else {
    $email = $_POST['email'];
}

if(empty($_POST['events'])) {
    $events_err = 'Please fill in your events';
    } else {
    $events = $_POST['events'];
}

if(empty($_POST['services'])) {
    $services_err = 'Please fill in your services';
    } else {
    $services = $_POST['services'];
}

// below is the old check for phone err message:
// if(empty($_POST['phone'])) {
//     $phone_err = 'Please fill in your phone number';
//     } else {
//     $phone = $_POST['phone'];
// }

// the code below checks for phone format:
if(empty($_POST['phone'])) { // if empty, type in your number
    $phone_err = 'Your phone number please!';
    } elseif(array_key_exists('phone', $_POST)){
    if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))
    { // if you are not typing the requested format of xxx-xxx-xxxx, display Invalid format
    $phone_err = 'Invalid format!';
    } else{
    $phone = $_POST['phone'];
    } // end else
    } // end main if


if(empty($_POST['comments'])) {
    $comments_err = 'We value your input';
    } else {
    $comments = $_POST['comments'];
}



if(!isset($_POST['privacy']) || $_POST['privacy'] != 'yes') {
    $privacy_err = 'You must agree to our privacy policy'; 
} else {
    $privacy = $_POST['privacy'];
}

if(empty($_POST['regions']))  { 
    $regions_err = 'Please choose your region';
} else {
    $regions = $_POST['regions'];
}


// function
function my_services($services) {
$my_return='';
if(!empty($_POST['services'])){
    $my_return = implode(',' , $_POST['services']);
}
return $my_return;
} //end my_services function

// Check that all fields are filled out before sending the email
if(isset($_POST['first_name'],
$_POST['last_name'],
$_POST['email'],
$_POST['events'],
$_POST['phone'],
$_POST['services'],
$_POST['regions'],
$_POST['comments'],
$_POST['privacy'])){

// email sending
$to = 'szemeo@mystudentswa.com, pablosep@msn.com'; 
$subject = 'Test email on '.date('m/d/y, h:i A');
$body = 'Last Name: ' . $last_name . PHP_EOL .
        'First Name: ' . $first_name . PHP_EOL .
        'Email: ' . $email . PHP_EOL .
        'events: ' . $events . PHP_EOL .
        'Phone: ' . $phone . PHP_EOL .
        'services: ' . my_services($services) . PHP_EOL .
        'Regions: ' . $regions . PHP_EOL .
        'Comments: ' . $comments . PHP_EOL;

$headers = "From: noreply@mystudentswa.com";



// we will be adding an if statement - that this email form will only work if all the fields are filled out!!!

if (!empty($first_name) &&
    !empty($last_name) &&
    !empty($email) &&
    !empty($services) && 
    !empty($phone) &&
    !empty($regions) &&
    !empty($events) &&
    !empty($comments) &&
    !empty($privacy) &&
    preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $_POST['phone']))  {

        mail($to, $subject, $body, $headers);
        header('Location:thx.php');
    }
// we must upload the form to a server to receive an email.

} // end isset

} //CLOSING SERVER REQUEST METHOD



