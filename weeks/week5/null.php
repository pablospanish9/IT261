<?php
echo '<h2>$a = 0; First Example of "a", ergo, it is False, a bolean concept, Not Null, Null represents a variable with no value</h2>';
$a = 0;
echo "a is " . is_null($a) . "<br>";

echo '<h2>$b = null; Second Example of "b", echoing "1" means that 1 equals TRUE, the bolean true is represented as 1.</h2>';
$b = null;
echo "b is " . is_null($b) . "<br>";

echo '<h2>$c = "null"; Third Example of "c", ergo, c IS NOT NULL because "null" is a string (quotes), and it has a value.</h2>';
$c = "null";
echo "c is " . is_null($c) . "<br>";

echo '<h2>$d = NULL; Fourth Example of "d", therefore, "d" is NULL, it has a value which is NULL, it is not 0, it is 1</h2>';
$d = NULL;
echo "d is " . is_null($d) . "<br>";
?>