<?php

namespace App\Controller;

use App\Entity\Boisson;
use App\Form\BoissonType;
use App\Repository\BoissonRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/boisson')]
class AdminBoissonController extends AbstractController
{
    #[Route('/', name: 'app_admin_boisson_index', methods: ['GET'])]
    public function index(BoissonRepository $boissonRepository): Response
    {
        return $this->render('admin_boisson/index.html.twig', [
            'boissons' => $boissonRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_boisson_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager,SluggerInterface $sluggerInterface): Response
    {
        $boisson = new Boisson();
        $form = $this->createForm(BoissonType::class, $boisson);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $boisson ->setSlug($sluggerInterface->slug(strtolower($boisson->getNom())));
            $entityManager->persist($boisson);
            $entityManager->flush();
            $this->addFlash('success', 'Boisson ajoutée avec succès');

            return $this->redirectToRoute('app_admin_boisson_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_boisson/new.html.twig', [
            'boisson' => $boisson,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_boisson_show', methods: ['GET'])]
    public function show(Boisson $boisson): Response
    {
        return $this->render('admin_boisson/show.html.twig', [
            'boisson' => $boisson,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_boisson_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Boisson $boisson, EntityManagerInterface $entityManager, SluggerInterface $sluggerInterface): Response
    {
        $form = $this->createForm(BoissonType::class, $boisson,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $boisson ->setSlug($sluggerInterface->slug(strtolower($boisson->getNom())));
            $entityManager->flush();
            $this->addFlash('success', 'Boisson modifiée avec succès');

            return $this->redirectToRoute('app_admin_boisson_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_boisson/edit.html.twig', [
            'boisson' => $boisson,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_boisson_delete', methods: ['POST'])]
    public function delete(Request $request, Boisson $boisson, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boisson->getId(), $request->request->get('_token'))) {
            $entityManager->remove($boisson);
            $entityManager->flush();
            $this->addFlash('success', 'Boisson supprimée avec succès');
        }

        return $this->redirectToRoute('app_admin_boisson_index', [], Response::HTTP_SEE_OTHER);
    }
}
