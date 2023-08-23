<?php

namespace App\Controller;

use App\Entity\Pizza;
use App\Form\PizzaType;
use App\Repository\PizzaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/pizza')]
class AdminPizzaController extends AbstractController
{
    #[Route('/', name: 'app_admin_pizza_index', methods: ['GET'])]
    public function index(PizzaRepository $pizzaRepository): Response
    {
        return $this->render('admin_pizza/index.html.twig', [
            'pizzas' => $pizzaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_pizza_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,SluggerInterface $sluggerInterface): Response
    {
        $pizza = new Pizza();
        $form = $this->createForm(PizzaType::class, $pizza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pizza ->setSlug($sluggerInterface->slug(strtolower($pizza->getNom())));
            $entityManager->persist($pizza);
            $entityManager->flush();
            $this->addFlash('success', 'Pizza a été ajouté avec succès');

            return $this->redirectToRoute('app_admin_pizza_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_pizza/new.html.twig', [
            'pizza' => $pizza,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_pizza_show', methods: ['GET'])]
    public function show(Pizza $pizza): Response
    {
        return $this->render('admin_pizza/show.html.twig', [
            'pizza' => $pizza,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_pizza_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pizza $pizza, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $form = $this->createForm(PizzaType::class, $pizza,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pizza ->setSlug($sluggerInterface->slug(strtolower($pizza->getNom())));
            $entityManager->flush();
            $this->addFlash('success', 'Pizza modifiée avec succès');
            return $this->redirectToRoute('app_admin_pizza_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_pizza/edit.html.twig', [
            'pizza' => $pizza,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_pizza_delete', methods: ['POST'])]
    public function delete(Request $request, Pizza $pizza, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pizza->getId(), $request->request->get('_token'))) {
            $entityManager->remove($pizza);
            $entityManager->flush();
            $this->addFlash('success', 'Pizza supprimée avec succès');
        }

        return $this->redirectToRoute('app_admin_pizza_index', [], Response::HTTP_SEE_OTHER);
    }
}
