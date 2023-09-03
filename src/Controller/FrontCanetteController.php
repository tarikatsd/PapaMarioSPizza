<?php

namespace App\Controller;

use App\Repository\CanetteRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontCanetteController extends AbstractController
{
    #[Route('/canette/panier', name: 'app_front_canette_panier')]
    public function modifcanette(Request $request, canetteRepository $canetteRepository, SessionInterface $session): JsonResponse
    {
        $canetteId = $request->request->get("canetteId");
        $quantity = $request->request->get("quantity");
        $canette = $canetteRepository->find($canetteId);
        
        // Créer un identifiant unique en combinant l'ID et le nom de la canette
        $uniqueIdentifier = $canette->getId() . '_' . str_replace(' ', '', $canette->getNom());
        
        // On récupère le panier en session
        $panier = $session->get("panier", []);
        
        // Vérifier si la canette existe déjà dans le panier
        if (isset($panier[$uniqueIdentifier])) {
            // Mise à jour de la quantité de la canette existante
            $panier[$uniqueIdentifier]["quantity"] += $quantity;
            // Mise à jour du prix total pour la canette
            $panier[$uniqueIdentifier]["totalPrice"] = $canette->getPrix() * $panier[$uniqueIdentifier]["quantity"];
        } else {
            // Ajout de la canette au panier
            $panier[$uniqueIdentifier] = [
                "quantity" => $quantity,
                "totalPrice" => $canette->getPrix(), // Calcul du prix total initial
                "nom" => $canette->getNom(),
                "type" => "canette",
            ];
        }
        
        // Mettez à jour le panier en session
        $session->set("panier", $panier);
        
        // dd($panier);
        // Répondez par un message JSON pour indiquer le succès
        return new JsonResponse(['success' => true]);

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
