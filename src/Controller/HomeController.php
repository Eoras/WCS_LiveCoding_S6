<?php

namespace App\Controller;

use App\Entity\Person;
use Twig\Loader\FilesystemLoader as FilesystemLoaderAlias;
use Twig\Environment as Environment;

class HomeController
{

    public function showHomePage()
    {
        $loader = new FilesystemLoaderAlias(__DIR__ . '/../View');
        $twig = new Environment($loader, []);

        $paul = new Person("Paul", "Dos sAntos", "email@outlook.fr");


        return $twig->render('Home/home.html.twig', [
            'person' => $paul,
            'titrePage' => "Home",
            'autre' => "toto"
        ]);

    }
}