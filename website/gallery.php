<?php
$people['Ludwig_Beethoven'] = 'beeth_Deaf composer and pianist from Germany.';
$people['Wolfgang_Mozart'] = 'mozar_Classical composer from Austria.';
$people['Ella_Fitzgerald'] = 'fitzg_Jazz singer from USA.';
$people['Miles_Davis'] = 'davis_Jazz trumpeter from IL, USA.';
$people['Madonna_Ciccone'] = 'madon_Pop singer and actress from MI, USA';
$people['Freddie_Mercury'] = 'mercu_Lead vocalist of music group Queen from UK.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery of Images</title>
    
<style>
  body {
        background-color: #cedff0; 
        text-align: center; 
        margin: 0;
        padding: 0;
    }
    table {
        border: 2px solid red;
        border-collapse:collapse;
        margin: 0 auto; 
        background-color:#e7e8dc;
    }

    td {
        border: 2px solid red;
        padding: 10px;
    }

    td img {
        max-width: 180px;
        height: auto;
        margin: 3px 8px; 
        display: block; 
    }

    footer {
    height: 100px;
    line-height: 60px;
    background: #ddd;
    clear: both;
}

footer ul {
    display: flex;
    justify-content: center;
    list-style-type: none;   
}

footer li {
    justify-content: center;
    margin: 0 15px;
}
</style>
</head>
<body>
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