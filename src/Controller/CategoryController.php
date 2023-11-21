<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
    #[Route('/category', name: 'app_category')]
    public function index(CategoryRepository $repository, Request $request): Response
    {
        $search = $request->query->get('search', '');
        $categories = $repository->search($search);

        return $this->render('category/index.html.twig', ['categories' => $categories, 'search' => '' == $search ? 'Search' : $search]);
    }

    #[Route('/category/{id}', name: 'app_category_id')]
    public function show(Category $category): Response
    {
        return $this->render('category/show.html.twig', ['category' => $category, 'search' => 'Search']);
    }
}
