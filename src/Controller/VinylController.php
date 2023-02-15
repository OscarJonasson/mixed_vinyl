<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;


class VinylController extends AbstractController {

    #[Route('/')]
    public function homepage(): Response {
        $tracks = [
            ['song' => 'track1', 'artist' => 'Me'],
            ['song' => 'track2', 'artist' => 'Yo'],
            ['song' => 'track3', 'artist' => 'Us'],
            ['song' => 'track4', 'artist' => 'Them'],
            ['song' => 'track5', 'artist' => 'Who']
        ];

        return  $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks
        ]);
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
