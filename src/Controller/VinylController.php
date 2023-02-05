<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;


class VinylController {

    #[Route('/')]
    public function homepage(): Response {
        return  new Response('Title: PB n Jams');
    }

    #[Route('/browse/{thisCanBeAnything}')]
    public function browse(string $thisCanBeAnything = null): Response {
        if ($thisCanBeAnything) {
            $title = 'Genre: ' . u(str_replace('-', ' ', $thisCanBeAnything))->title(true);
        } else {
            $title = 'All Genres';
        }
        return new Response($title);
    }
}
