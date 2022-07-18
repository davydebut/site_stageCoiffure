<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'LEA.C COIFFURE STUDIO',
            'title' => 'LEA.C COIFFURE STUDIO',
            'message' => 'BIENVENUE À
            LEA COIFFURE STUDIO
            le meilleur endroit pour une nouvelle coiffure raffraichissante !',
        ]);
    }
}
