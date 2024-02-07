<?php

// Front controller (toutes les requêtes passent par ici)

// Connexion pour MySQL avec Laragon
$pdo = new PDO('mysql:host=localhost;dbname=mvc', 'root', '');

//Requête pour exécuter la PDO
$query = $pdo->query('SELECT * FROM users');

// Autoloader de Composer
require_once __DIR__ . '/../vendor/autoload.php';

// On récupère une instance de la classe App
$app = MVC\App::getInstance();
// Servira à ajouter mes services au conteneur
$app->boot();

// On récupère l'instance du service router
$router = $app->make('router');
// On appelle sa méthode dispatch() pour trouver la route correspondant à la requête de notre visiteur
$response = $router->dispatch();

// On envoie la réponse à notre visiteur (https://symfony.com/doc/current/components/http_foundation.html#sending-the-response)
$response->send();
