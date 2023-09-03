<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontArticleController extends AbstractController
{
    #[Route('/front/article', name: 'app_front_article')]
    public function index(): Response
    {
        return $this->render('front_article/index.html.twig', [
            'controller_name' => 'FrontArticleController',
        ]);
    }
}
