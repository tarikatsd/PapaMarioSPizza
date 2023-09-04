<?php

namespace App\Controller;

use App\Repository\ExtraRepository;
use App\Repository\PizzaRepository;
use App\Repository\PromoRepository;
use App\Repository\BoissonRepository;
use App\Repository\CanetteRepository;
use App\Repository\DessertRepository;
use App\Repository\IngredientRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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


        foreach ($pizzas as $key => $item) {
            $uniqueKey = $item["uniqueKey"];
            $pizza = $pizzaRepository->find($key);
        }
        
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
                'uniqueKey' => $item['uniqueKey'],
            ]);
            } elseif ($lastKey === "canette") {
                $canette = $canetteRepository->find($key);
                array_push($canettes, [
                    'canette' => $canette,
                    'quantity' => $item['quantity'],
                    'totalPrice' => $canette->getPrix(),
                ]);
            } elseif ($lastKey === "dessert") {
                $dessert = $dessertRepository->find($key);
                array_push($desserts, [
                    'dessert' => $dessert,
                    'quantity' => $item['quantity'],
                    'totalPrice' => $dessert->getPrix(),
                ]);
            } elseif ($lastKey === "boisson") {
                $boisson = $boissonRepository->find($key);
                array_push($boissons, [
                    'boisson' => $boisson,
                    'quantity' => $item['quantity'],
                    'totalPrice' => $boisson->getPrix(),
                ]);
            } elseif ($lastKey === "extra") {
                $extra = $extraRepository->find($key);
                array_push($extras, [
                    'extra' => $extra,
                    'quantity' => $item['quantity'],
                    'totalPrice' => $extra->getPrix(),
                ]);
            } elseif ($lastKey === "promo") {
                $promo = $promoRepository->find($key);
                array_push($promos, [
                    'promo' => $promo,
                    'quantity' => $item['quantity'],
                ]);
            } 
        }
        

        
        return $this->render('front_panier/index.html.twig', [
            'reseauSocials' => $reseauSocialRepository->findAll(),
            'pizzas' => $pizzas,
            'canettes' => $canettes,
            'desserts' => $desserts,
            'boissons' => $boissons,
            'extras' => $extras,
            'promos' => $promos,
            'panier' => $panier,
        ]);

    }
    #[Route('/update/panier', name: 'app_front_update_panier')]
    public function updateCart(Request $request, SessionInterface $sessionInterface,): Response
    {
                // Récupérez les données de la requête
                $itemId = $request->request->get("itemId");
                $newQuantity = $request->request->get("newQuantity");
                // Mettez à jour la session du panier en conséquence
                $panier = $this->get('session')->get('panier', []);
                
                // dd($itemId, $newQuantity);
                if (isset($panier[$itemId])) {
                    $panier[$itemId]['quantity'] = $newQuantity;
                    // Mettez à jour d'autres données du panier si nécessaire
                }
                // si la quantite est de 0, on supprime l'item du panier
                if ($newQuantity == 0) {
                    unset($panier[$itemId]);
                }
                $this->get('session')->set('panier', $panier);
                // dd($panier);
                // Répondez avec une réponse JSON pour indiquer le succès
                return new JsonResponse(['success' => true]);
            }
}