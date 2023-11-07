<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ContactRepository $repository): Response
    {
        $contacts = $repository->findBy([], ['lastname' => 'ASC', 'firstname' => 'ASC']);

        return $this->render('contact/index.html.twig', ['contacts' => $contacts]);
    }

    #[Route('/contact/{id}', name: 'app_contact_id')]
    public function show(Contact $contact): Response
    {
        return $this->render('contact/show.html.twig', ['contact' => $contact]);
    }
}
