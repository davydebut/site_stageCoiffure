<?php

namespace App\Controller;

use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurController extends AbstractController
{
    #[Route('/utilisateur', name: 'app_utilisateur')]
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher ): Response
    {
        $utilisateur = $this->getUser();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        //$password = $form->getData()->getPassword();
        //dump($password);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateur = $form->getData();
            $password = $form->getData()->getPassword();
            dd($password);
            if($form->getData('password') != null){ // si le champ contient 60 caractères alors le mot de passe ne change pas
                $utilisateur->setPassword(
                    $userPasswordHasher->hashPassword(
                        $this->getUser(),
                        $form->get('password')->getData()
                    )
                );
            }else{
                $utilisateur->setPassword($password);
            }
            $entityManager->persist($utilisateur);
            $entityManager->flush();
            $this->addFlash('success', 'Vos informations ont été modifiées avec succès');
            return $this->redirectToRoute('app_utilisateur');
        }
        return $this->renderForm('utilisateur/index.html.twig', [
            'utilisateurInfos' => $utilisateur,
            'formulaire' => $form,
        ]);

    }
}
