<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(ContactRepository $repository, Request $request): Response
    {
        $search = $request->query->get('search', '');
        $contacts = $repository->search($search);

        return $this->render('contact/index.html.twig', ['contacts' => $contacts, 'search' => '' == $search ? 'Search' : $search]);
    }

    #[Route('/contact/{id}', name: 'app_contact_id', requirements: ['id' => '\d+'])]
    public function show(#[MapEntity(expr: 'repository.findWithCategory(id)')] Contact $contact): Response
    {
        return $this->render('contact/show.html.twig', ['contact' => $contact]);
    }
}
