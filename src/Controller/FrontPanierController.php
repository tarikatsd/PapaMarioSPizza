<?php

namespace App\Controller;

use App\Repository\ExtraRepository;
use App\Repository\PizzaRepository;
use App\Repository\BoissonRepository;
use App\Repository\CanetteRepository;
use App\Repository\DessertRepository;
use App\Repository\IngredientRepository;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontPanierController extends AbstractController
{
//     #[Route('/panier', name: 'app_front_panier')]
//     public function index(SessionInterface $sessionInterface, ReseauSocialRepository $reseauSocialRepository, PizzaRepository $pizzaRepository, IngredientRepository $ingredientRepository): Response
//     {
//         $sessionInterface->clear();
//         $panier = $sessionInterface->get("panier", []);
//         // dd($panier);
//         // if($panier[count($panier)-1] == "pizza"){
//         //     array_pop($panier);
//         // }
//         $pizzas = [];
//         foreach($panier as $key => $value){
//             // dump("coucou");
//             $pizza = $pizzaRepository->find($key);
//             // $tab est un tableua qui contient en 0 la pizza en 1 le prix total, en 2 tous les ingredients en 3 les ingrédients plus 
//             // dd($value[1]);
//             $ingrediantBaseTab = [];
//             // On passe en revue tous les ingrédient et pour ceux qui ne sont pas des suppléments on les ajoute au tableau $ingrediantBaseTab
//             foreach($value[1] as $ingredientId){
//                 if(!in_array($ingredientId, $value[2])){
//                     $ingredient = $ingredientRepository->find($ingredientId);
//                     array_push($ingrediantBaseTab, $ingredient);
//                 }
//             }
//             $incredientSupplementTab = [];
//             foreach($value[2] as $ingredientId){
//                 $ingredient = $ingredientRepository->find($ingredientId);
//                 array_push($incredientSupplementTab, $ingredient);
//             }

//             $tab = [];
//             $tab[0] = $pizza;
//             $tab[1] = $value[0];
//             $tab[2] = $ingrediantBaseTab;
//             $tab[3] = $incredientSupplementTab;
//             array_push($pizzas, $tab);
//         }
//         // On passe en revue le panier en clé valeurs

//         // dd($pizzas);
//         return $this->render('front_panier/index.html.twig', [
//             'reseauSocials' => $reseauSocialRepository->findAll(),
//             'pizzas' => $pizzas,
//         ]);
//     }
// }

            #[Route('/panier', name: 'app_front_panier')]
            public function index(
                SessionInterface $sessionInterface,
                ReseauSocialRepository $reseauSocialRepository,
                PizzaRepository $pizzaRepository,
                BoissonRepository $boissonRepository
            ): Response
            {

                $panier = $sessionInterface->get("panier", []);
                $items = [];
                $pizzas = [];
                
                dd($pizzas);
                foreach ($panier as $key => $value) {
                    if (isset($value["type"])) {
                        if ($value["type"] === "pizza") {
                        $pizza = $pizzaRepository->find($key);
                        // ... gérer les ingrédients et suppléments
                        $pizzas[] = [
                            "product" => $pizza,
                            "price" => $value[0],
                            "ingredients" => $ingrediantBaseTab,
                            "supplements" => $incredientSupplementTab,
                            "type" => "pizza",
                        ];
                    } elseif ($value["type"] === "boisson" || $value["type"] === "canette" || $value["type"] === "dessert" || $value["type"] === "extra") {
                        // Traitez les autres types de produits de la même manière
                        $product = $boissonRepository->find($key); // ou autre type de produit
                        $items[] = [
                            "product" => $product,
                            "price" => $value[0],
                            "type" => $value["type"],
                        ];
                    }
                }
                
                return $this->render('front_panier/index.html.twig', [
                    'reseauSocials' => $reseauSocialRepository->findAll(),
                    'pizzas' => $pizzas,
                    // 'pizzas' => $pizzas
                ]);
            }
        }
    }
        