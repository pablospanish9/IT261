<?php              
  include ('./includes/header.php');



  if (isset($_GET['today'])) {
      $today = $_GET['today'];
  } else {
      $today = date('l');
  }

  switch($today) {
    case 'Monday':
        $movie = '<h2>Monday is Blade Runner Day</h2>';
        $pic = 'blade.jpg';
        $alt = 'Blade Runner Movie';
        $content = 'Blade Runner explores themes of humanity through the eyes of Rick Deckard, a retired police officer tasked with hunting synthetic beings known as replicants. This cyberpunk classic delves deep into existential questions.';
        break;
    case 'Tuesday':
        $movie = '<h2>Tuesday is Dune Day</h2>';
        $pic = 'dune.jpg';
        $alt = 'Dune Movie';
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
        $content = 'Star Trek focuses on the voyages of the 
        starship USS Enterprise. More than just a space 
        adventure, the series also tackles ethical and 
        social issues, making it a thought-provoking watch 
        for a Sunday. Star Trek was the series that got me
        used to watching and enjoying science fiction movies.';
        break;
  }
?>
<div id="wrapper">
<!-- 
    <div id="hero">
        <img src="images/twelve.jpg" alt="Twelve is greater than 3">
    </div> -->
    <!-- end hero -->

    <main>
        <h1>Welcome to my daily page!</h1>
        <p>I have a relaxing habit of watching a movie at night, usually 
          science fiction movie. I do not have the time or patience
          to watch the entire movie, as I get sleepy and I go to sleep.
          And I turn off the movie after about 45 minutes to 1 hour. So, it takes
          me about 2 to 3 days to watch a movie. Sometimes I get a 2nd 
          movie started and I continue the next day. This works better for
          me than watching an entire movie for 2 or more hours non-stop.
        </p>
        <?php echo $movie; ?>
        <?php echo '<p>' . $content . '</p>'; ?>

        <ul>
        <li><a href="?today=Sunday">Sunday</a></li>
        <li><a href="?today=Monday">Monday</a></li>
        <li><a href="?today=Tuesday">Tuesday</a></li>
        <li><a href="?today=Wednesday">Wednesday</a></li>
        <li><a href="?today=Thursday">Thursday</a></li>
        <li><a href="?today=Friday">Friday</a></li>
        <li><a href="?today=Saturday">Saturday</a></li>
    </ul>
    </main>

    <aside>
        <img src="./images/<?php echo $pic; ?>" alt="<?php echo $alt; ?>">
    </aside>

</div>
<!-- end wrapper -->
<?php
  include ('./includes/footer.php');
?>