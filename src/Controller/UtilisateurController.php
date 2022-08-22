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
    public function index(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $userPasswordHasher): Response
    {
        $events = [];
        $rdvs = [];
        foreach ($events as $event) {
            $rdvs[] = [
                'id' => $event->getId(),
                'title' => $event->getTitle(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'description' => $event->getDescription(),
                'allDay' => $event->isAllDay(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
            ];
        }
        $data = json_encode($rdvs);
        dump($data);
        $utilisateur = $this->getUser();
        // dd($utilisateur);
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        // dd($form);
        //$password = $form->getData()->getPassword();
        //dump($password);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $utilisateur = $form->getData();
            $password = $form->getData()->getPassword();
            // dd(strlen($password));
            // dd($form->getData('password'));
            $modifiedPassword = $form->get('password')->getData();
            if ($modifiedPassword != null) {
                $utilisateur->setPassword(
                    $userPasswordHasher->hashPassword(
                        $this->getUser(),
                        $form->get('password')->getData()
                    )
                );
            } else {
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
            'data' => $data,
        ]);
    }
}
