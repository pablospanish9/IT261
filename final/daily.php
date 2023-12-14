<?php   

  include ('./includes/header.php');
   ?>
   
<div id="wrapper">
<!-- 
    <div id="hero">
        <img src="images/twelve.jpg" alt="Twelve is greater than 3">
    </div> -->
    <!-- end hero -->

    <main style="background-color: <?php echo $color; ?>; padding: 20px;">
        <h2>What do interpreters do?</h2>
        <p>Interpreters are versatile professionals, adept in a range of language services beyond traditional interpreting. With a deep understanding of linguistic nuances and cultural contexts, we offer tailored solutions to bridge communication gaps in various sectors. Our goal is to provide adaptable and accommodating services, ensuring seamless language support tailored to your specific needs. Each day, we explore different services.
        </p>
        <?php echo $movie; ?>
        <?php echo '<p>' . $content . '</p>'; ?>

        <ul style="list-style-type: none;">
        <li><a href="?today=Sunday">Interpretation</a></li>
        <li><a href="?today=Monday">Translation</a></li>
        <li><a href="?today=Tuesday">Voiceover</a></li>
        <li><a href="?today=Wednesday">Website Localization</a></li>
        <li><a href="?today=Thursday">Transcription</a></li>
        <li><a href="?today=Friday">Subtitling</a></li>
        <li><a href="?today=Saturday">Consulting and training</a></li>
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