<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $email = (new Email())
                ->from($data['EmailAddress'])
                ->to('davylea.c@gmail.com')
                ->subject('Message de ' . $data['FirstName'])
                ->text($data['YourMessage'])
                ->html('<p>' . $data['YourMessage'] . '</p>');

            $mailer->send($email);
        }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'LEA.C COIFFURE STUDIO',
            'title' => 'BIENVENUE À',
            'description' => 'LEA.C COIFFURE STUDIO',
            'message' => 'le meilleur endroit pour une nouvelle',
            'suite' => 'coiffure raffraichissante !',
            'contact' => $form->createView(),
        ]);
    }
}
