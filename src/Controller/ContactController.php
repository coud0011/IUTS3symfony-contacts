<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ContactRepository $repository, Request $request): Response
    {
        $page = $request->query->get('search', 1);
        $page = null === $page ? '' : $page;
        $contacts = $repository->search($page);

        return $this->render('contact/index.html.twig', ['contacts' => $contacts, 'search' => '' == $page ? 'Search' : $page]);
    }

    #[Route('/contact/{id}', name: 'app_contact_id')]
    public function show(Contact $contact): Response
    {
        return $this->render('contact/show.html.twig', ['contact' => $contact, 'search' => 'Search']);
    }
}
