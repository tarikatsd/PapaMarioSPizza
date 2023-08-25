<?php

namespace App\Controller;

use App\Repository\CanetteRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontCanetteController extends AbstractController
{
    #[Route('/canette/panier', name: 'app_front_canette_panier')]
    public function modifcanette(Request $request, canetteRepository $canetteRepository, SessionInterface $session): Response
    {
        $canetteId = $request->request->get("canetteId");
        $canette = $canetteRepository->find($canetteId);

        // Faites ici ce que vous voulez pour ajouter la canette au panier
        // Par exemple, vous pouvez ajouter des données au panier de la même manière que pour les pizzas

        // On récupère le panier en session
        $panier = $session->get("panier", []);

        // Ajoutez la canette au panier (similaire à ce que vous avez fait pour les pizzas)
        $panier[$canette->getId()] = [$canette->getPrix(),"type" => "canette"];

        // Mettez à jour le panier en session
        $session->set("panier", $panier);
        
            dd($panier);

        // Répondez par exemple avec un message JSON pour indiquer que la canette a été ajoutée au panier
        return $this->json(['message' => 'Canette ajoutée au panier']);
    }


    
    #[Route('/front/canette', name: 'app_front_canette')]
    public function index(CanetteRepository $canetteRepository,ReseauSocialRepository $reseauSocialRepository): Response
    {
        return $this->render('front_canette/index.html.twig', [
            'canettes' => $canetteRepository->findBy(["isActive"=>true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
