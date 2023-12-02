<?php

include('config.php');
include('./includes/header.php');
?>

    <table>
    <?php foreach ($people as $name => $image) : ?>
        <tr>
            <td><img src="images/<?php echo substr($image, 0, 5); ?>.jpg" alt="<?php echo str_replace('_', ' ', $name); ?>"></td>
            <td><?php echo str_replace('_', ' ', $name); ?></td>
            <td><?php echo substr($image, 6); ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
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