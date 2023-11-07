<!-- Starting Point: Here is the flawed "code"! -->


<!-- added missing php closing tag -->
<!DOCTYPE html> "
<html>
<!--  added missing Doctype and html open tag in correct location -->
<head>
<title>My Adder Assignment</title>
<!-- /* I added style that I copied directly from the working adder.php sample */ -->
<style>
    p {
        color:red;
        text-align: center;
    }
    h1 {
        color:green;
    }
    h2 {
        font-size:1.5em;
        text-align: center;
    }
    form {
        width:350px;
        margin:5px auto;
        border:1px solid red;
        padding:15px;
    }
    
    h1 {
        text-align: center;
    }
    
    
/* <!--  Here there was an extra closing style tag. I don't know if 
I added it when copying it from the adder form --> */
</style>
</head>
<body>
<h1>Adder.php</h1> 
<form action="" method="post"> 
    <!-- //Here there was an extra \ backlash at the <\form tag 
and added the post method, and there was an extra / at the opening <label> below,
    and the num1 was incorrectly spelled Num1. Oh,
and I added an extra space after the word number, for better spacing, similar to sample-->
Enter the first number: <label><input type="text" name="num1"><br> 
</label>Enter the second number: <input type="text" name="num2"><br>
<input type="submit" value="Add Em!!">
</form> 
<!-- A " double quotation mark was missing at the end after the value. -->
<?php     //adder-wrong.php

if (isset($_POST['num1'], $_POST['num2'])){
    $num1 = floatval($_POST['num1']); // added floatval so that only a number and not a string is passed as a number.
    $num2 = floatval($_POST['num2']);
$myTotal = $num1 + $num2; // Changed -= to = and corrected $Num2 to $num2 
echo '<h2>You added '. $num1 .' and '. $num2 . '</h2>'; // Changed ".." for '..', added missing ' on .$num2, and erased not needed "'
// echo ' <p> and the answer is <br>
// the style was outside the <p> tag, and again the '..' concatenation had " instead of '
echo '<p style="color:red;"> and the answer is <br>
'. $myTotal .'!</p>';
echo '<p><a href="">Reset page</a></p>'; // Added missing semicolon and closing 'p' tag
}
// <html> this <html> tag is in the wrong place before the head and style.
?> 
 
</body>
</html>

<!-- I did not initially read the instructions carefully and I documented the code as I added 
comments, into the code. I compiled all the comments here and as a result, all the line numbers are 
now different and kept shifting from the original flawed code. 


added missing php closing tag - Line 7
added missing Doctype and html open tag in correct location - Line 8-9
I added style that I copied directly from the working adder.php sample - Line 13
Here there was an extra closing style tag. 
I don't know if I added it when copying it from the adder form - Line 27
Here there was an extra \ backlash at the <\form tag and added the post method, 
and there was an extra / at the opening <label> below, and the num1 was 
    incorrectly spelled Num1. Oh, and I added an extra space after the word number,
     for better spacing, similar to sample - Line 36
A " double quotation mark was missing at the end after the value. - Line 47
Changed -= to = and corrected $Num2 to $num2 - Line 60
Changed ".." for '..', added missing ' on .$num2, and erased not needed "'" - Line 61
the style was outside the <p> tag, and again the '..' concatenation had " instead of ' - Line 62
Added missing semicolon and closing 'p' tag - Line 65
<html> this <html> tag is in the wrong place before the head and style. - Line 68 -->

<!-- Do you want to know something funny? For the entire 
duration of working on this code, until the very end, I do not know why—maybe 
I had a brain moment—I had no idea what the word "Adder" meant, 
and I did not compute that "Adder" meant that it was an "adding" machine. 
The entire time, I read adder and thought it was some sort of name for something. Adder.  -->