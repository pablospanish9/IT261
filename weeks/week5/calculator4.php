<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Travel Calculator</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body>
    <h1>My Travel Calculator</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <fieldset>
            <label>Enter your name</label>
            <input type="text" name="name" value="<?php if (isset($_POST['name'])) echo htmlspecialchars($_POST['name']); ?>"> 

            <label>How many miles are you driving?</label>
            <input type="number" name="miles" value="<?php if (isset($_POST['miles'])) echo htmlspecialchars($_POST['miles']); ?>"> 

            <input type="submit" value="Calculate">
        </fieldset>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (empty($_POST['name'])) {
            echo '<p class="error">Please enter your name.</p>';
        }

        if (empty($_POST['miles'])) {
            echo '<p class="error">Please specify the number of miles you are driving.</p>';
        }

        if (isset($_POST['name'], $_POST['miles'])) {
            $name = $_POST['name'];
            $miles = floatval($_POST['miles']);

            if (!empty($name) && !empty($miles)) {
                // The next part of the code for calculations and output would go here.
            }
        }
    }
    ?>
</body>
</html>

?>
<!-- Here is the validation code borrowed from footer: -->
    <footer>
        <ul>
            <li>Copyright &copy; 2023</li>
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
