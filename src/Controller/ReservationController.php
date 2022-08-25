<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Reservation;
use App\Form\ReservationType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager): Response
    {

        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        $proList = $doctrine->getRepository(Client::class)->findBy([
            'isPro' => true
        ]);
        $user = $this->getUser();
        if ($form->isSubmitted() && $form->isValid()) {
            $reservation->setIdClient($user);
            // dd($reservation);
            $entityManager->persist($reservation);
            $entityManager->flush();
            return $this->redirectToRoute('app_utilisateur');
        }
        // dump($proList);
        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView(),
            'reservation' => $reservation
        ]);
    }
}
