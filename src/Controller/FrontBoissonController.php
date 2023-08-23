<?php

namespace App\Controller;

use App\Repository\BoissonRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontBoissonController extends AbstractController
{
    #[Route('/boisson', name: 'app_front_boisson')]
    public function index(BoissonRepository $boissonRepository,ReseauSocialRepository $reseauSocialRepository): Response
    {
        return $this->render('front_boisson/index.html.twig', [
            'boissons' => $boissonRepository->findBy(["IsActive"=>true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
