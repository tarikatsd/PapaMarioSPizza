<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Form\ConfigPizzaType;
use App\Repository\PizzaRepository;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontPizzaController extends AbstractController
{
    #[Route('/pizza/modif', name: 'app_front_pizza_modif')]
    public function modifPizza(Request $request, PizzaRepository $pizzaRepository,ReseauSocialRepository $reseauSocialRepository,
    IngredientRepository $ingredientRepository, SessionInterface $session): Response
    {


// Récupération des données depuis la requête
$pizzaId = $request->request->get("pizzaId");
$ingredients = $request->request->get("ingredients");
$quantity = $request->request->get("quantity");

// Créez une clé unique en combinant l'ID de la pizza avec les ingrédients sélectionnés (sous forme de chaîne) pour identifier la pizza dans le panier
$uniqueKey = $pizzaId . '_' . implode('_', $ingredients);

// Récupération de la pizza à partir du repository
$pizza = $pizzaRepository->find($pizzaId);
$originalIngredients = $pizza->getIngredient();

$original = [];
foreach ($originalIngredients->toArray() as $ingredient) {
    // Construction d'un tableau avec les ID des ingrédients originaux
    array_push($original, $ingredient->getId());
}

$ingredientsAdded = [];
$ingredientsRemoved = [];

// Comparaison entre les ingrédients originaux et les ingrédients sélectionnés
foreach ($original as $ingredientId) {
    if (!in_array($ingredientId, $ingredients)) {
        // Si l'ingrédient n'est pas dans les ingrédients sélectionnés, il a été enlevé
        $ingredientsRemoved[] = $ingredientId;
    }
}

foreach ($ingredients as $ingredientId) {
    if (!in_array($ingredientId, $original)) {
        // Si l'ingrédient n'était pas dans les ingrédients originaux, il a été ajouté
        $ingredientsAdded[] = $ingredientId;
    }
}

$totalPrice = $pizza->getPrix();

foreach ($ingredientsAdded as $ingredientId) {   
    // Calcul du prix total en ajoutant le prix des ingrédients ajoutés
    $ingredient = $ingredientRepository->find($ingredientId);
    $totalPrice += $ingredient->getPrix();
}

// Récupération du panier en session
$panier = $session->get("panier", []);

// Si la pizza existe déjà dans le panier
if (isset($panier[$uniqueKey])) {
    // Mise à jour de la quantité et du prix total de la pizza existante dans le panier
    $panier[$uniqueKey]["quantity"] += $quantity;
    $panier[$uniqueKey]["totalPrice"] += $totalPrice;
    // Mise à jour des ingrédients si nécessaire
    $panier[$uniqueKey]["ingredientsAdded"] = $ingredientsAdded;
    $panier[$uniqueKey]["ingredientsRemoved"] = $ingredientsRemoved;
} else {
    // Ajout de la pizza au panier comme une nouvelle entrée avec une clé unique
    $panier[$uniqueKey] = [
        "totalPrice" => $totalPrice,
        "ingredientsAdded" => $ingredientsAdded,
        "ingredientsRemoved" => $ingredientsRemoved,
        "quantity" => $quantity,
        "type" => "pizza"
    ];
}

// Mise à jour du panier en session
$session->set("panier", $panier);
dd($panier);
// Répondez par un message JSON pour indiquer le succès
return new JsonResponse(['success' => true]);

    }



    #[Route('/pizza/getform', name: 'app_front_pizza_getform')]
    public function getPizzaForm(Request $request, PizzaRepository $pizzaRepository): Response
    {
        $pizza = $pizzaRepository->find($request->request->get("pizzaId")); 
        $form = $this->createForm(ConfigPizzaType::class, $pizza);
        return $this->render('front_pizza/_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route('/pizza', name: 'app_front_pizza')]
    public function index(
        PizzaRepository $pizzaRepository,
        ReseauSocialRepository $reseauSocialRepository,
        EntityManagerInterface $entityManager,
        Request $request,
        SluggerInterface $slugger
    ): Response {
        $pizza = new Pizza();
        $form = $this->createForm(ConfigPizzaType::class, $pizza);
        // On traite les données du formulaire lorsqu'il est soumis
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $pizza->setSlug($slugger->slug(strtolower($pizza->getNom())));
            $entityManager->persist($pizza);
            
            return $this->redirectToRoute('app_front_pizza');
        }
        
        return $this->render('front_pizza/index.html.twig', [
            'pizzas' => $pizzaRepository->findBy(["isActive" => true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
            'form' => $form->createView(), // Correction : créer la vue du formulaire
        ]);
    }
}
