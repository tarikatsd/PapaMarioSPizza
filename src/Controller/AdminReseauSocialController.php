<?php

namespace App\Controller;

use App\Entity\ReseauSocial;
use App\Form\ReseauSocialType;
use App\Repository\ReseauSocialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/reseau/social')]
class AdminReseauSocialController extends AbstractController
{
    #[Route('/', name: 'app_admin_reseau_social_index', methods: ['GET'])]
    public function index(ReseauSocialRepository $reseauSocialRepository): Response
    {
        return $this->render('admin_reseau_social/index.html.twig', [
            'reseau_socials' => $reseauSocialRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_reseau_social_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $reseauSocial = new ReseauSocial();
        $form = $this->createForm(ReseauSocialType::class, $reseauSocial);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($reseauSocial);
            $entityManager->flush();
            $this->addFlash('success', 'Réseau social ajouté avec succès');

            return $this->redirectToRoute('app_admin_reseau_social_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_reseau_social/new.html.twig', [
            'reseau_social' => $reseauSocial,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_reseau_social_show', methods: ['GET'])]
    public function show(ReseauSocial $reseauSocial): Response
    {
        return $this->render('admin_reseau_social/show.html.twig', [
            'reseau_social' => $reseauSocial,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_reseau_social_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ReseauSocial $reseauSocial, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ReseauSocialType::class, $reseauSocial,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Réseau social modifié avec succès');

            return $this->redirectToRoute('app_admin_reseau_social_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_reseau_social/edit.html.twig', [
            'reseau_social' => $reseauSocial,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_reseau_social_delete', methods: ['POST'])]
    public function delete(Request $request, ReseauSocial $reseauSocial, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$reseauSocial->getId(), $request->request->get('_token'))) {
            $entityManager->remove($reseauSocial);
            $entityManager->flush();
            $this->addFlash('success', 'Réseau social supprimé avec succès');
        }

        return $this->redirectToRoute('app_admin_reseau_social_index', [], Response::HTTP_SEE_OTHER);
    }
}
