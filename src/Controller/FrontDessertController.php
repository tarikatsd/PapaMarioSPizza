<?php

namespace App\Controller;

use App\Repository\DessertRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontDessertController extends AbstractController
{
    #[Route('/dessert/panier', name: 'app_front_dessert_panier')]
    public function modifdessert(Request $request, dessertRepository $dessertRepository, SessionInterface $session): Response
    {
        $dessertId = $request->request->get("dessertId");
        $quantity = $request->request->get("quantity");
        $dessert = $dessertRepository->find($dessertId);

        $uniqueIdentifier = $dessert->getId() . '_' . str_replace(' ', '', $dessert->getNom());
        
        $panier = $session->get("panier", []);
        
        if (isset($panier[$uniqueIdentifier])) {
            $panier[$uniqueIdentifier]["quantity"] += $quantity;
            $panier[$uniqueIdentifier]["totalPrice"] = $dessert->getPrix();
        } else {
            $panier[$uniqueIdentifier] = [
                "quantity" => $quantity,
                "type" => "dessert",
                "nom" => $dessert->getNom(),
                "totalPrice" => $dessert->getPrix()
            ];
        }
        // dd($panier);
        $session->set("panier", $panier);
        return new JsonResponse(['success' => true]);
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
