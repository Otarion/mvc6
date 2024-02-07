<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response; // Importe la classe Response de Symfony
use Symfony\Component\HttpKernel\Exception\HttpException; // Importe la classe HttpException de Symfony
use MVC\User; // Importe la classe User du namespace MVC

class HelloController extends Controller // Déclare la classe HelloController qui étend la classe Controller
{
    // Définit une méthode index qui retourne une instance de Response
    public function index(): Response
    {
        return $this->response->setContent('Hello world'); // Retourne une réponse "Hello world"
    }

    // Définit une méthode hello qui prend un entier $id comme paramètre et retourne une instance de Response
    public function hello(int $id): Response
    {
        try {
            $user = User::findOrFail($id); // Trouve l'utilisateur par son id ou lance une exception si non trouvé
            return $this->view('hello.html', ['name' => $user->name]); // Retourne une vue avec le nom de l'utilisateur
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) { // Capture une exception si l'utilisateur n'est pas trouvé
            throw new HttpException(404, 'Utilisateur introuvable'); // Lance une exception HTTP 404 avec le message 'Utilisateur introuvable'
        }
    }
}