<!-- heredoc exercise -->
<!DOCTYPE html>
<html>
<head>
    <title>Heredoc exercise</title>
    <style>
        body {
            background-color: beige; 
            margin: 60px;
            font-family: Verdana, sans-serif;
            font-size: 18px; 
        }
    </style>
</head>
<body>

        <?php
        $book = "The Handmaid's Tale";
        $author = "Margaret Atwood";

        $favorite = <<<FAV
        One of my favorite books is $book, written by $author, 
        and is presently a miniseries on HULU. Hulu's viewing audience is
        extremely excited about the miniseries and looks forward to the 5th
        season of the award-winning "$book!"
        <br><br>
        Elizabeth Moss' rendition of June is right on! I liked the show's first two seasons!
        FAV;

        echo $favorite;
        ?>

</body>
</html>






