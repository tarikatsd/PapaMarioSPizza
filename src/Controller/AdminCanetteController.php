<?php

namespace App\Controller;

use App\Entity\Canette;
use App\Form\CanetteType;
use App\Repository\CanetteRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/canette')]
class AdminCanetteController extends AbstractController
{
    #[Route('/', name: 'app_admin_canette_index', methods: ['GET'])]
    public function index(CanetteRepository $canetteRepository): Response
    {
        return $this->render('admin_canette/index.html.twig', [
            'canettes' => $canetteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_canette_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,SluggerInterface $sluggerInterface): Response
    {
        $canette = new Canette();
        $form = $this->createForm(CanetteType::class, $canette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $canette ->setSlug($sluggerInterface->slug(strtolower($canette->getNom())));
            $entityManager->persist($canette);
            $entityManager->flush();
        $this->addFlash('success', 'Canette ajoutée avec succès');

            return $this->redirectToRoute('app_admin_canette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_canette/new.html.twig', [
            'canette' => $canette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_canette_show', methods: ['GET'])]
    public function show(Canette $canette): Response
    {
        return $this->render('admin_canette/show.html.twig', [
            'canette' => $canette,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_canette_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Canette $canette, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CanetteType::class, $canette,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Canette modifiée avec succès');

            return $this->redirectToRoute('app_admin_canette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_canette/edit.html.twig', [
            'canette' => $canette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_canette_delete', methods: ['POST'])]
    public function delete(Request $request, Canette $canette, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$canette->getId(), $request->request->get('_token'))) {
            $entityManager->remove($canette);
            $entityManager->flush();
            $this->addFlash('success', 'Canette supprimée avec succès');
        }

        return $this->redirectToRoute('app_admin_canette_index', [], Response::HTTP_SEE_OTHER);
    }
}
