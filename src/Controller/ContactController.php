<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
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

    #[Route('/contact/create', name: 'app_contact_create')]
    public function create(): Response
    {
        return $this->render('contact/create.html.twig', ['contact' => $contact]);
    }

    #[Route('/contact/{id}/delete', name: 'app_contact_delete', requirements: ['id' => '\d+'])]
    public function delete(#[MapEntity(expr: 'repository.findWithCategory(id)')] Contact $contact): Response
    {
        return $this->render('contact/delete.html.twig', ['contact' => $contact]);
    }

    #[Route('/contact/{id}/update', name: 'app_contact_update', requirements: ['id' => '\d+'])]
    public function update(#[MapEntity(expr: 'repository.findWithCategory(id)')] Contact $contact): Response
    {
        $form = $this->createForm(ContactType::class, $contact);

        return $this->render('contact/update.html.twig', ['form' => $form, 'contact' => $contact]);
    }
}
