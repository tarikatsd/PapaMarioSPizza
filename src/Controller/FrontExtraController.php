<?php

namespace App\Controller;

use App\Repository\ExtraRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontExtraController extends AbstractController
{
    #[Route('/extra/panier', name: 'app_front_extra_panier')]
    public function modifextra(Request $request, extraRepository $extraRepository, SessionInterface $session): Response
    {
        $extraId = $request->request->get("extraId");
        $quantity = $request->request->get("quantity");
        $extra = $extraRepository->find($extraId);
        
        // Créer un identifiant unique en combinant l'ID et le nom de la extra
        $uniqueIdentifier = $extra->getId() . '_' . str_replace(' ', '', $extra->getNom());
        
        // On récupère le panier en session
        $panier = $session->get("panier", []);
        
        // Vérifier si la extra existe déjà dans le panier
        if (isset($panier[$uniqueIdentifier])) {
            // Mise à jour de la quantité de la extra existante
            $panier[$uniqueIdentifier]["quantity"] += $quantity;
            // Mise à jour du prix total pour la extra
            $panier[$uniqueIdentifier]["totalPrice"] = $extra->getPrix() * $panier[$uniqueIdentifier]["quantity"];
        } else {
            // Ajout de la extra au panier
            $panier[$uniqueIdentifier] = [
                "quantity" => $quantity,
                "type" => "extra",
                "nom" => $extra->getNom(),
                "totalPrice" => $extra->getPrix()
            ];
        }
        
        // Mettez à jour le panier en session
        $session->set("panier", $panier);
        
        
        // Répondez par un message JSON pour indiquer le succès
        return new JsonResponse(['success' => true]);

    }

    #[Route('/extra', name: 'app_front_extra')]
    public function index(ExtraRepository $extraRepository,ReseauSocialRepository $reseauSocialRepository): Response
    {
        return $this->render('front_extra/index.html.twig', [
            'extras' => $extraRepository->findBy(["isActive"=>true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
