<?php

use HelloWorld\SayHello;
use WCS\App\Entity\Person;

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../src/conf/connect.php';

echo SayHello::world();

$paul = new Person("Paul", "DOS", "monmail@live.fr");
var_dump($paul);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>Form</title>
</head>
<body>

    <div class="container mt-4">