<?php

require_once "private.php";

$pdo = new PDO("mysql:host=localhost;dbname=WCSLC", $bddUser, $bddPassword, [
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
