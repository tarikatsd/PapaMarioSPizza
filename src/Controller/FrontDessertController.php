<?php

namespace App\Controller;

use App\Repository\DessertRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontDessertController extends AbstractController
{
    #[Route('/dessert/panier', name: 'app_front_dessert_panier')]
    public function modifdessert(Request $request, dessertRepository $dessertRepository, SessionInterface $session): Response
    {
        $dessertId = $request->request->get("dessertId");
        $dessert = $dessertRepository->find($dessertId);

        // Faites ici ce que vous voulez pour ajouter la dessert au panier
        // Par exemple, vous pouvez ajouter des données au panier de la même manière que pour les pizzas

        // On récupère le panier en session
        $panier = $session->get("panier", []);

        // Ajoutez la dessert au panier (similaire à ce que vous avez fait pour les pizzas)
        $panier[$dessert->getId()] = [$dessert->getPrix(),"type" => "dessert"];



        // Mettez à jour le panier en session
        $session->set("panier", $panier);
        
            dd($panier);

        // Répondez par exemple avec un message JSON pour indiquer que la dessert a été ajoutée au panier
        return $this->json(['message' => 'Dessert ajoutée au panier']);
    }






    #[Route('/dessert', name: 'app_front_dessert')]
    public function index(DessertRepository $dessertRepository,ReseauSocialRepository $reseauSocialRepository): Response
    {
        return $this->render('front_dessert/index.html.twig', [
            'desserts' => $dessertRepository->findBy(["isActive"=>true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
