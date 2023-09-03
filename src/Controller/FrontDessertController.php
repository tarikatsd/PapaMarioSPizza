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
        
        // Créer un identifiant unique en combinant l'ID et le nom de la dessert
        $uniqueIdentifier = $dessert->getId() . '_' . str_replace(' ', '', $dessert->getNom());
        
        // On récupère le panier en session
        $panier = $session->get("panier", []);
        
        // Vérifier si la dessert existe déjà dans le panier
        if (isset($panier[$uniqueIdentifier])) {
            // Mise à jour de la quantité de la dessert existante
            $panier[$uniqueIdentifier]["quantity"] += $quantity;
            // Mise à jour du prix total pour la dessert
            $panier[$uniqueIdentifier]["totalPrice"] = $dessert->getPrix() * $panier[$uniqueIdentifier]["quantity"];
        } else {
            // Ajout de la dessert au panier
            $panier[$uniqueIdentifier] = [
                "quantity" => $quantity,
                "type" => "dessert",
                "nom" => $dessert->getNom(),
                "totalPrice" => $dessert->getPrix()  // Calcul du prix total initial
            ];
        }
        
        // Mettez à jour le panier en session
        $session->set("panier", $panier);
        
        
        // Répondez par un message JSON pour indiquer le succès
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
