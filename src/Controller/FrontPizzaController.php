<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Form\ConfigPizzaType;
use App\Repository\IngredientRepository;
use App\Repository\PizzaRepository;
use App\Repository\ReseauSocialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

class FrontPizzaController extends AbstractController
{
    #[Route('/pizza/modif', name: 'app_front_pizza_modif')]
    public function modifPizza(Request $request, PizzaRepository $pizzaRepository,
    IngredientRepository $ingredientRepository, SessionInterface $session): Response
    {
        $pizza = $pizzaRepository->find($request->request->get("pizzaId")); 
        $ingredients = $request->request->get("ingredients");
        // dump(gettype($ingredients));
        $originalIngredients = $pizza->getIngredient();
        // dump($ingredients);
        // dd(count($originalIngredients));
        // $gap = array_diff($ingredients, $originalIngredients->toArray());
        // foreach ($ingredients as $ingredient) {
        //     dump($ingredient);
        //     // if(!in_array($ingredient, $originalIngredients->toArray())){
        //     //     $gap[] = $ingredient;
        //     // }
        // }
        // dump("=============================");
        $original = [];
        foreach ($originalIngredients->toArray() as $ingredient) {
            // dump($ingredient);
            array_push($original, $ingredient->getId());
        }
        $gap = array_diff($ingredients, $original);
        // dd($gap);
        $supplements = [];
        $prixTotal = $pizza->getPrix();
        // // on boucle sur le tableau gap, on recupère les ingrédients par leur id et leur nom et leur  prix 
        foreach ($gap as $ingredientId) {   
            $ingredient = $ingredientRepository->find($ingredientId);
            $prixTotal += $ingredient->getPrix();
        }

        // On met dans le panier en session
        // On récupère le panier en session
        $panier = $session->get("panier", []);
        // On ajoute la pizza au panier
        // $panier[$pizza->getId()] = [$prixTotal, $ingredients, $gap, "pizzas"];
        $panier[$pizza->getId()]  = [
            "pizza" => $pizza,
            "prixTotal" => $prixTotal,
            "ingredients" => $ingredients,
            "gap" => $gap,
        ];

        // On remet le panier en session
        $session->set("panier", $panier);
        //  dd($panier);



        // foreach ($gap as $ingredientId) {
        //     $ingredient = $ingredientRepository->find($ingredientId);
        //     $supplement += $ingredient->getPrix();
        // }
        // dd($supplement);
        // on additione le prix de la pizza et le prix des ingrédients
        //$pizza->setPrix($pizza->getPrix() + $supplement);
        // on la stocke dans une variable
        // $prix = $pizza->getPrix();
        // on ajoute les ingrédients à la pizza

        // on persiste la pizza
        //dd($prix);
        // $entityManager->persist($pizza);

        return new Response("coucou");
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
