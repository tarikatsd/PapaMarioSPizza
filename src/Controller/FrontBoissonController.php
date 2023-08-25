<?php

namespace App\Controller;

use App\Entity\Boisson;
use App\Repository\BoissonRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontBoissonController extends AbstractController
{
    #[Route('/boisson/panier', name: 'app_front_boisson_panier')]
    public function modifBoisson(Request $request, BoissonRepository $boissonRepository, SessionInterface $session): Response
    {
        $boissonId = $request->request->get("boissonId");
        $boisson = $boissonRepository->find($boissonId);

        // Faites ici ce que vous voulez pour ajouter la boisson au panier
        // Par exemple, vous pouvez ajouter des données au panier de la même manière que pour les pizzas

        // On récupère le panier en session
        $panier = $session->get("panier", []);

        // Ajoutez la boisson au panier (similaire à ce que vous avez fait pour les pizzas)
        $panier[$boisson->getId()] = [$boisson->getPrix(),"type" => "boisson"];



        // Mettez à jour le panier en session
        $session->set("panier", $panier);
        
            // dd($panier);

        // Répondez par exemple avec un message JSON pour indiquer que la boisson a été ajoutée au panier
        return $this->json(['message' => 'Boisson ajoutée au panier']);
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
