<?php

namespace MVC;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig extends Environment
{
    public function __construct()
    {
        // On indique que nos templates seront resources/views
        $loader = new FilesystemLoader(__DIR__ . '/../resources/views');

        // On fait appel au constructeur parent
        parent::__construct($loader);
    }
}
