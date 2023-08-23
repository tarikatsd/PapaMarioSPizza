<?php

namespace App\Controller;

use App\Repository\ExtraRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontExtraController extends AbstractController
{
    #[Route('/extra', name: 'app_front_extra')]
    public function index(ExtraRepository $extraRepository,ReseauSocialRepository $reseauSocialRepository): Response
    {
        return $this->render('front_extra/index.html.twig', [
            'extras' => $extraRepository->findBy(["isActive"=>true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
