<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Form\ConfigPizzaType;
use App\Repository\PizzaRepository;
use App\Repository\ReseauSocialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\String\Slugger\SluggerInterface;

class FrontPizzaController extends AbstractController
{
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
