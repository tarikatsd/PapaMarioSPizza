<?php

namespace App\Controller;

use App\Entity\Boisson;
use App\Repository\BoissonRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontBoissonController extends AbstractController
{
    #[Route('/boisson/panier', name: 'app_front_boisson_panier')]
    public function modifBoisson(Request $request, BoissonRepository $boissonRepository, SessionInterface $session): Response
    {
        $boissonId = $request->request->get("boissonId");
        $quantity = $request->request->get("quantity");
        $boisson = $boissonRepository->find($boissonId);
        
        // Créer un identifiant unique en combinant l'ID et le nom de la boisson
        $uniqueIdentifier = $boisson->getId() . '_' . str_replace(' ', '', $boisson->getNom());
        
        // On récupère le panier en session
        $panier = $session->get("panier", []);
        
        // Vérifier si la boisson existe déjà dans le panier
        if (isset($panier[$uniqueIdentifier])) {
            // Mise à jour de la quantité de la boisson existante
            $panier[$uniqueIdentifier]["quantity"] += $quantity;
            // Mise à jour du prix total pour la boisson
            $panier[$uniqueIdentifier]["totalPrice"] = $boisson->getPrix() * $panier[$uniqueIdentifier]["quantity"];
        } else {
            // Ajout de la boisson au panier
            $panier[$uniqueIdentifier] = [
                "quantity" => $quantity,
                "type" => "boisson",
                "totalPrice" => $boisson->getPrix() * $quantity // Calcul du prix total initial
            ];
        }
        
        // Mettez à jour le panier en session
        $session->set("panier", $panier);
        
        
        // Répondez par un message JSON pour indiquer le succès
        return new JsonResponse(['success' => true]);

    }
    #[Route('/boisson', name: 'app_front_boisson')]
    public function index(BoissonRepository $boissonRepository, ReseauSocialRepository $reseauSocialRepository): Response
    {

        return $this->render('front_boisson/index.html.twig', [
            'boissons' => $boissonRepository->findBy(["IsActive" => true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }

}
