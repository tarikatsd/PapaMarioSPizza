<?php

namespace App\Controller;

use App\Repository\HomeRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    #[Route('/', name: 'app_home2')]    

    public function index(HomeRepository $homeRepository,ReseauSocialRepository $reseauSocialRepository): Response
    {
        $home = $homeRepository->findOneBy(["isActive"=>true]);

        
        return $this->render('home/index.html.twig', [
            'home' => $home,

            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
