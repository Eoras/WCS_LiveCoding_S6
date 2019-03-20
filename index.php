<?php
require './inc/_functions.php';

$total = 0;

for ($i = 0; $i < 5; $i++) {
    $total++;
} // $total = 5 now

/*
 * Using a function defined in the function file
 */
$total = increment($total, 6); // $total = 11

/*
 * Handling a string as a table
 */
$str = "Hello";
$result = "This is the letter " . $str[0]; // $result = This is the letter H
$result = "This is the letter " . $str[3]; // $result = This is the letter l

/*
 * A WHILE loop
 * $total can be used as a counter, watch out for infinite loops
 */
while ($total < 20) {
    $total++;
} // total = 20


$sessions = [
    'S1' => "Cool",
    'S2' => "Very cool",
    'S3' => "Very very cool",
    'S4' => "Very very very cool",
    'S5' => "Very very very very cool",
    'S6' => "Just coool :D",
];
foreach ($sessions as $sessionName => $rating) {
    echo $sessionName . " " . $rating . "<br>";
}

?>

<h1><a href="form.php">Accéder au formulaire</a></h1>
