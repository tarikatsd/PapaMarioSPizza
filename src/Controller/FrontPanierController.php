<?php

namespace App\Controller;

use App\Repository\BoissonRepository;
use App\Repository\PizzaRepository;
use App\Repository\CanetteRepository;
use App\Repository\DessertRepository;
use App\Repository\ExtraRepository;
use App\Repository\IngredientRepository;
use App\Repository\PromoRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Translation\Extractor\ExtractorInterface;

class FrontPanierController extends AbstractController
{
    #[Route('/panier', name: 'app_front_panier')]
    public function index(
        SessionInterface $sessionInterface,
        PizzaRepository $pizzaRepository,
        IngredientRepository $ingredientRepository,
        CanetteRepository $canetteRepository,
        ReseauSocialRepository $reseauSocialRepository,
        DessertRepository $dessertRepository,
        BoissonRepository $boissonRepository,
        PromoRepository $promoRepository,
        ExtraRepository $extraRepository,
        
    ): Response {

        // $sessionInterface->clear();
        $panier = $sessionInterface->get("panier", []);
        $pizzas = [];
        $canettes = [];
        $desserts = [];
        $boissons = [];
        $extras = [];
        $promos = [];
        $prixTotal = 0;

        // dd($panier);
        foreach ($panier as $key => $item) {
            $lastKey = $item['type'];
            if ($lastKey === "pizza") {

            $pizza = $pizzaRepository->find($key);
            $ingredientsAdded = [];
            $ingredientsRemoved = [];
    
            foreach ($item['ingredientsAdded'] as $ingredientId) {
                $ingredientAdded = $ingredientRepository->find($ingredientId);
                array_push($ingredientsAdded, $ingredientAdded);
            }
    
            // Vérification si $item['ingredientsRemoved'] n'est pas null
            if (isset($item['ingredientsRemoved']) && is_array($item['ingredientsRemoved'])) {
                foreach ($item['ingredientsRemoved'] as $ingredientId) {
                    $ingredientRemoved = $ingredientRepository->find($ingredientId);
                    array_push($ingredientsRemoved, $ingredientRemoved);
                }
            }
    
            array_push($pizzas, [
                'type' => 'pizza',
                'pizza' => $pizza,
                'totalPrice' => $item['totalPrice'],
                'quantity' => $item['quantity'],
                'ingredientsAdded' => $ingredientsAdded,
                'ingredientsRemoved' => $ingredientsRemoved,
            ]);
            } elseif ($lastKey === "canette") {
                $canette = $canetteRepository->find($key);
                array_push($canettes, [
                    'canette' => $canette,
                    'quantity' => $item['quantity'],
                    'totalPrice' => $canette->getPrix() * $item['quantity'],
                ]);
            } elseif ($lastKey === "dessert") {
                $dessert = $dessertRepository->find($key);
                array_push($desserts, [
                    'dessert' => $dessert,
                    'quantity' => $item['quantity'],
                    'totalPrice' => $dessert->getPrix() * $item['quantity'],
                ]);
            } elseif ($lastKey === "boisson") {
                $boisson = $boissonRepository->find($key);
                array_push($boissons, [
                    'boisson' => $boisson,
                    'quantity' => $item['quantity'],
                    'totalPrice' => $boisson->getPrix() * $item['quantity'],
                ]);
            } elseif ($lastKey === "extra") {
                $extra = $extraRepository->find($key);
                array_push($extras, [
                    'extra' => $extra,
                    'quantity' => $item['quantity'],
                    'totalPrice' => $extra->getPrix() * $item['quantity'],
                ]);
            } elseif ($lastKey === "promo") {
                $promo = $promoRepository->find($key);
                array_push($promos, [
                    'promo' => $promo,
                    'quantity' => $item['quantity'],
                ]);
            } 
            $prixTotal = $pizza->getPrix() * $item['quantity'] += $prixTotal;
        }

        return $this->render('front_panier/index.html.twig', [
            'reseauSocials' => $reseauSocialRepository->findAll(),
            'pizzas' => $pizzas,
            'canettes' => $canettes,
            'desserts' => $desserts,
            'boissons' => $boissons,
            'extras' => $extras,
            'promos' => $promos,
            // 'total' => $sessionInterface->get('total'),
            'panier' => $panier,
        ]);
    }
}
