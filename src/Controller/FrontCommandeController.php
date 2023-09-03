<?php

namespace App\Controller;


use App\Entity\Commande;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontCommandeController extends AbstractController
{
    #[Route('/front/commande', name: 'app_front_commande')]
    public function index(SessionInterface $session): Response
    {
        $panier = $session->get('panier', []);
        $commande = [];
                // $session->clear();

        // dd($panier);

        foreach($panier as $item => $id) {
            $commande[] = [
                'id' => $item,
                'quantity' => $id['quantity'],
                'nom' => $id['nom'],
            ];
        }
        dd($commande);



        return $this->render('front_commande/index.html.twig', [
            'controller_name' => 'FrontCommandeController',
        ]);
    }
}
