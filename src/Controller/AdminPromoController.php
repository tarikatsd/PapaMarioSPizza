<?php

namespace App\Controller;

use App\Entity\Promo;
use App\Form\PromoType;
use App\Repository\BoissonRepository;
use App\Repository\DessertRepository;
use App\Repository\ExtraRepository;
use App\Repository\PizzaRepository;
use App\Repository\PromoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/promo')]
class AdminPromoController extends AbstractController
{
    #[Route('/', name: 'app_admin_promo_index', methods: ['GET'])]
    public function index(PromoRepository $promoRepository): Response
    {
        return $this->render('admin_promo/index.html.twig', [
            'promos' => $promoRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_promo_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,SluggerInterface $sluggerInterface, 
    PizzaRepository $pizzaRepository,DessertRepository $dessertRepository,BoissonRepository $boissonRepository,ExtraRepository $extraRepository): Response
    {
        $promo = new Promo();
        $form = $this->createForm(PromoType::class, $promo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get("checkalldessert")->getData()) {
                $allDessert = $dessertRepository->findAll(["isActive"=>true]);
                foreach ($allDessert as $dessert) {
                    $promo->addDessert($dessert);
                }
            }
            if ($form->get("checkallpizza")->getData()) {
                $allPizza = $pizzaRepository->findAll(["isActive"=>true]);
                foreach ($allPizza as $pizza) {
                    $promo->addPizza($pizza);
                }
            }
            if ($form->get("checkallextra")->getData()) {
                $allExtra = $extraRepository->findAll(["isActive"=>true]);
                foreach ($allExtra as $extra) {
                    $promo->addExtra($extra);
                }
            }
            
            if ($form->get("checkallboisson")->getData()) {
                $allBoisson = $boissonRepository->findAll(["isActive"=>true]);
                foreach ($allBoisson as $boisson) {
                    $promo->addBoisson($boisson);
                }
            }
            
            
        
            $promo ->setSlug($sluggerInterface->slug(strtolower($promo->getNom())));
            $entityManager->persist($promo);
            $entityManager->flush();
            $this->addFlash('success', 'Promo créer avec succès');

            return $this->redirectToRoute('app_admin_promo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_promo/new.html.twig', [
            'promo' => $promo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_promo_show', methods: ['GET'])]
    public function show(Promo $promo): Response
    {
        return $this->render('admin_promo/show.html.twig', [
            'promo' => $promo,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_promo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Promo $promo, EntityManagerInterface $entityManager,SluggerInterface $sluggerInterface,
    PizzaRepository $pizzaRepository,DessertRepository $dessertRepository,BoissonRepository $boissonRepository,ExtraRepository $extraRepository): Response
    {
        $form = $this->createForm(PromoType::class, $promo,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get("checkalldessert")->getData()) {
                $allDessert = $dessertRepository->findAll(["isActive"=>true]);
                foreach ($allDessert as $dessert) {
                    $promo->addDessert($dessert);
                }
            }
            if ($form->get("checkallpizza")->getData()) {
                $allPizza = $pizzaRepository->findAll(["isActive"=>true]);
                foreach ($allPizza as $pizza) {
                    $promo->addPizza($pizza);
                }
            }
            if ($form->get("checkallextra")->getData()) {
                $allExtra = $extraRepository->findAll(["isActive"=>true]);
                foreach ($allExtra as $extra) {
                    $promo->addExtra($extra);
                }
            }
            
            if ($form->get("checkallboisson")->getData()) {
                $allBoisson = $boissonRepository->findAll(["isActive"=>true]);
                foreach ($allBoisson as $boisson) {
                    $promo->addBoisson($boisson);
                }
            }
            $promo ->setSlug($sluggerInterface->slug(strtolower($promo->getNom())));
            $entityManager->flush();
            $this->addFlash('success', 'Promo modifier avec succès');

            return $this->redirectToRoute('app_admin_promo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_promo/edit.html.twig', [
            'promo' => $promo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_promo_delete', methods: ['POST'])]
    public function delete(Request $request, Promo $promo, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$promo->getId(), $request->request->get('_token'))) {
            $entityManager->remove($promo);
            $entityManager->flush();
            $this->addFlash('success', 'Promo supprimer avec succès');
        }

        return $this->redirectToRoute('app_admin_promo_index', [], Response::HTTP_SEE_OTHER);
    }
}
