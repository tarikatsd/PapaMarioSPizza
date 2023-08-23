<?php

namespace App\Controller;

use App\Entity\Dessert;
use App\Form\DessertType;
use App\Repository\DessertRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/dessert')]
class AdminDessertController extends AbstractController
{
    #[Route('/', name: 'app_admin_dessert_index', methods: ['GET'])]
    public function index(DessertRepository $dessertRepository): Response
    {
        return $this->render('admin_dessert/index.html.twig', [
            'desserts' => $dessertRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_dessert_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,SluggerInterface $sluggerInterface): Response
    {
        $dessert = new Dessert();
        $form = $this->createForm(DessertType::class, $dessert);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dessert ->setSlug($sluggerInterface->slug(strtolower($dessert->getNom())));
            $entityManager->persist($dessert);
            $entityManager->flush();
            $this->addFlash('success', 'Dessert ajouté avec succès');

            return $this->redirectToRoute('app_admin_dessert_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_dessert/new.html.twig', [
            'dessert' => $dessert,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_dessert_show', methods: ['GET'])]
    public function show(Dessert $dessert): Response
    {
        return $this->render('admin_dessert/show.html.twig', [
            'dessert' => $dessert,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_dessert_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Dessert $dessert, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $form = $this->createForm(DessertType::class, $dessert,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $dessert ->setSlug($sluggerInterface->slug(strtolower($dessert->getNom())));
            $entityManager->flush();
            $this->addFlash('success', 'Dessert modifié avec succès');
            return $this->redirectToRoute('app_admin_dessert_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_dessert/edit.html.twig', [
            'dessert' => $dessert,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_dessert_delete', methods: ['POST'])]
    public function delete(Request $request, Dessert $dessert, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$dessert->getId(), $request->request->get('_token'))) {
            $entityManager->remove($dessert);
            $entityManager->flush();
            $this->addFlash('success', 'Dessert supprimé avec succès');
        }

        return $this->redirectToRoute('app_admin_dessert_index', [], Response::HTTP_SEE_OTHER);
    }
}
