<?php

namespace App\Controller;

use App\Repository\CanetteRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontCanetteController extends AbstractController
{
    #[Route('/front/canette', name: 'app_front_canette')]
    public function index(CanetteRepository $canetteRepository,ReseauSocialRepository $reseauSocialRepository): Response
    {
        return $this->render('front_canette/index.html.twig', [
            'canettes' => $canetteRepository->findBy(["isActive"=>true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
