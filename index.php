<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyPortal page</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    
<h1><a href="index.php">Pablo's Portal Page</a></h1>
<h2>The navigation below represents our Big Assignments.</h2>

<div id="wrapper">
    <nav>
        <ul>
            <li><a href="./website/daily.php">Switch</a></li>
            <li><a href="">Troubleshoot</a></li>
            <li><a href="">Calculator</a></li>
            <li><a href="">Email</a></li>
            <li><a href="">Database</a></li>
            <li><a href="">Gallery</a></li>

        </ul>
    </nav>

    <main>
    <h2>About Pablo</h2>
    <img class="pic" src="images/pablo_face.jpg" alt="Face">
    <p>
Hello there. Here I am again, slowly learning how to make websites. I am continuing where I left off last year, after a few other tech classes in between. I have been taking one class a quarter since the winter of 2000. The more I learn, the more I realize how little I know, and if I do not practice, I begin to forget what I have learned. Since I am learning slowly, it is taking me a long time to learn. My goal is to learn enough web development to make a working website for myself and my business ideas. I could also make websites for other people as a freelancer, and that would only be an addition to what I am already doing for work as a translator/interpreter. At this stage, I am learning web development mostly as a side activity. When I first started, I thought I could change careers and only do web development. Now, I am thinking about integrating this knowledge with my experience in the translation industry. For example, I can offer website translation and localization services, working directly with the code of a website. I also enjoy learning ASL language and working out at the gym.</p>

        <img class="pic" src="images/mamps_page.JPG" alt="mamps screenshot">

    </main>

    <aside>
        <h2>Weekly Class Exercises</h2>
        <h3>Week2</h3>
        <ol>
            <li><a href="weeks/week2/var.php">var.php</a></li>
            <li><a href="weeks/week2/vars2.php">Vars2.php</a></li>
            <li><a href="weeks/week2/currency-logic.php">Currency-logic</a></li>
            <li><a href="weeks/week2/currency.php">currency.php</a></li>
            <li><a href="weeks/week2/heredoc.php">heredoc.php</a></li>
        </ol>

        <h3>Week3</h3>
        <ol>
            <li><a href="weeks/week3/if.php">if.php</a></li>
            <li><a href="weeks/week3/date.php">date.php</a></li>
            <li><a href="weeks/week3/for-each.php">for-each.php</a></li>
            <li><a href="weeks/week3/for-loop.php">for-loop.php</a></li>
            <li><a href="weeks/week3/switch.php">switch.php</a></li>
            <li><a href="weeks/week3/index.php">index.php</a></li>
            <li><a href="weeks/week3/about.php">about.php</a></li>
        </ol>

        <h3>Week 4</h3>
        <ol>
            <li><a href="weeks/week4/form-get.php">form-get.php</a></li>
            <li><a href="weeks/week4/form1.php">form1.php</a></li>
            <li><a href="weeks/week4/form2.php">form2.php</a></li>
            <li><a href="weeks/week4/form3.php">form3.php</a></li>
            <li><a href="weeks/week4/arithmetic-form.php">arithmetic-form.php</a></li>
            <li><a href="weeks/week4/celcius.php">celcius.php</a></li>
            <li><a href="weeks/week4/adder.php">adder.php</a></li>
        </ol>

        <h3>Week 5</h3>
        <ol>
            <li><a href="weeks/week5/currency1.php">currency1.php</a></li>
            <li><a href="weeks/week5/currency2.php">currency2.php</a></li>
            <li><a href="weeks/week5/currency3.php">currency3.php</a></li>
            <li><a href="weeks/week5/currency4.php">currency4.php</a></li>
            <li><a href="weeks/week5/null.php">null.php</a></li>
         </ol>

         <h3>Week 6</h3>
         <ol>
        <li><a href="weeks/week6/form.php" target="_blank">form.php</a></li>
        <li><a href="weeks/week6/form2.php" target="_blank">form2.php</a></li>
        <li><a href="weeks/week6/functions.php" target="_blank">functions.php</a></li>
        <li><a href="weeks/week6/thx.php" target="_blank">thx.php</a></li>
        </ol>

        <h3>Week 7</h3>
         <ol>
        <li><a href="weeks/week7/form3.php" target="_blank">form3.php</a></li>
        <li><a href="weeks/week7/form5.php" target="_blank">form5.php</a></li>
        <li><a href="weeks/week7/pictures.php" target="_blank">pictures.php</a></li>
        <li><a href="weeks/week7/rand.php" target="_blank">rand.php</a></li>
        <li><a href="weeks/week7/strings.php" target="_blank">strings.php</a></li>
        </ol>

        <h3>Week 8</h3>
         <ol>
        <!-- <li><a href="weeks/week8/config.php" target="_blank">config.php</a></li>
        <li><a href="weeks/week8/credentials.php" target="_blank">credentials.php</a></li> -->
        <li><a href="weeks/week8/people.php" target="_blank">people.php</a></li>
        <li><a href="weeks/week8/people-view.php" target="_blank">people-view.php</a></li>
        </ol>

    </aside>
</div>
<!-- close wrapper -->

<footer>
    <ul>
        <li>Copyright &copy;
            2023</li>
        <li>All Rights Reserved</li>
        <li><a href="../index.php">Web Design by Pablo</a></li>
        <li><a id="html-checker" href="#">HTML Validation</a></li>
        <li><a id="css-checker" href="#">CSS Validation</a></li>
        </ul>
        
        <script>
                document.getElementById("html-checker").setAttribute("href","https://validator.w3.org/nu/?doc=" + location.href);
                document.getElementById("css-checker").setAttribute("href","https://jigsaw.w3.org/css-validator/validator?uri=" + location.href);
        </script>

  </footer>
</body>
</html>

