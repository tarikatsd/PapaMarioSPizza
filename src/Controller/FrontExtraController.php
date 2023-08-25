<?php

namespace App\Controller;

use App\Repository\ExtraRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontExtraController extends AbstractController
{
    #[Route('/extra/panier', name: 'app_front_extra_panier')]
    public function modifextra(Request $request, extraRepository $extraRepository, SessionInterface $session): Response
    {
        $extraId = $request->request->get("extraId");
        $extra = $extraRepository->find($extraId);

        // Faites ici ce que vous voulez pour ajouter la extra au panier
        // Par exemple, vous pouvez ajouter des données au panier de la même manière que pour les pizzas

        // On récupère le panier en session
        $panier = $session->get("panier", []);

        // Ajoutez la extra au panier (similaire à ce que vous avez fait pour les pizzas)
        $panier[$extra->getId()] = [$extra->getPrix(),"type" => "extra"];



        // Mettez à jour le panier en session
        $session->set("panier", $panier);
        
            dd($panier);

        // Répondez par exemple avec un message JSON pour indiquer que la extra a été ajoutée au panier
        return $this->json(['message' => 'extra ajoutée au panier']);
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
