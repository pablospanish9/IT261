<?php   
  include('config.php');
  include ('./includes/header.php');
   ?>
   
<div id="wrapper">
<!-- 
    <div id="hero">
        <img src="images/twelve.jpg" alt="Twelve is greater than 3">
    </div> -->
    <!-- end hero -->

    <main style="background-color: <?php echo $color; ?>; padding: 20px;">
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

        <ul style="list-style-type: none;">
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