<?php

use \App\Controller\HomeController;

require __DIR__ . '/../vendor/autoload.php';

if($_GET && $_GET['r'] && !empty($_GET['r'])) {
    if($_GET['r'] === "home") {

        $controller = new HomeController();
        echo $controller->showHomePage();

    } else {
        header("Location: ?r=home");
        exit();
    }
} else {
    header("Location: ?r=home");
    exit();
}
