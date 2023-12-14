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
    <h2 style="text-align: center;">Welcome to my contact page!</h2>

 

    <?php include('./includes/form.php');
    ?>

    </main>

    <aside>
    <h3 style="text-align: center;">I will get back to you <br>as soon as possible</h3>
    <img src="images/typing.jpg" alt="Hands typing" style="width:100%;">
</aside>

</div>
<!-- end wrapper -->
<?php
  include ('./includes/footer.php');
?>