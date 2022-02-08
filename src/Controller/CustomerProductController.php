<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerProductController extends AbstractController
{
    #[Route('/customer/category/{id}', name: 'customer_category')]
    public function index($id, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->find($id);

        if(!$category)
        {
            return $this->redirectToRoute("home");
        }

        return $this->render('customer_product/category.html.twig', [
            'category' => $category
        ]);
    }
}
