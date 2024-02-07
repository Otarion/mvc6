<?php

namespace App\Controllers;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use MVC\User;

class HelloController extends Controller
{
    public function index(): Response
    {
        return $this->response->setContent('Hello world');
    }

    public function hello(int $id): Response
    {
        try {
            $user = User::findOrFail($id); // Trouve l'utilisateur par son id ou lance une exception
            return $this->view('hello.html', ['name' => $user->name]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            throw new HttpException(404, 'Utilisateur introuvable');
        }
    }
}
