<?php

namespace App\Controller;

use App\Entity\Client;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(ManagerRegistry $doctrine, Request $request, EntityManagerInterface $entityManager, ReservationRepository $reservationRepository): Response
    {
        $reservations = $reservationRepository->findAll();
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        $proList = $doctrine->getRepository(Client::class)->findBy([
            'isPro' => true
        ]);
        $user = $this->getUser();
        if ($form->isSubmitted() && $form->isValid()) {
            foreach ($reservations as $r => $v) {
               $data = $form->get('heure_de_rendez_vous')->getData();
                $pro = $form->get('pro')->getData();
                if ($data == $v->getHeureDeRendezVous() && $pro == $v->getPro()) { // 18 == 18 && 1 == 1
                    $this->addFlash('danger', 'Ce créneau est déjà pris');
                    return $this->redirectToRoute('app_reservation');
                }
            }
            $reservation->setIdClient($user);
            $reservation->setStatus('En cours');
            $entityManager->persist($reservation);
            $entityManager->flush();
            $this->addFlash('success', 'Votre réservation a bien été prise en compte');
            return $this->redirectToRoute('app_utilisateur');
        }
        // dump($proList);
        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView(),
            'reservation' => $reservation,
            'reservations' => $reservations,
        ]);
    }
}
