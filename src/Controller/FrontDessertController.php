<?php

namespace App\Controller;

use App\Repository\DessertRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontDessertController extends AbstractController
{
    #[Route('/dessert', name: 'app_front_dessert')]
    public function index(DessertRepository $dessertRepository,ReseauSocialRepository $reseauSocialRepository): Response
    {
        return $this->render('front_dessert/index.html.twig', [
            'desserts' => $dessertRepository->findBy(["isActive"=>true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
