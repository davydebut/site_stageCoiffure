<?php

namespace App\Controller;

use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    #[Route('/utilisateur', name: 'app_utilisateur')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $utilisateur = $this->getUser();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateur = $form->getData();
            $entityManager->persist($utilisateur);
            $entityManager->flush();
            return $this->redirectToRoute('app_utilisateur');
        }
        return $this->renderForm('utilisateur/index.html.twig', [
            'utilisateurInfos' => $utilisateur,
            'formulaire' => $form,
        ]);

    }
}
