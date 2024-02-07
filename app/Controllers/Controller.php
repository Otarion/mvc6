<?php

namespace App\Controllers;

use MVC\Twig;
use Symfony\Component\HttpFoundation\Response;

class Controller
{
    public function __construct(
        protected Response $response,
        protected Twig $twig
    ) {}

    protected function view(string $template, array $data = []): Response
    {
        // On met le contenu de notre réponse ...
        return $this->response->setContent(
            // Qui sera la vue générée par Twig
            $this->twig->render($template, $data)
        );
    }
}
