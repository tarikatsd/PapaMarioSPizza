<?php

namespace App\Controller;

use App\Entity\Cgv;
use App\Form\CgvType;
use App\Repository\CgvRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/cgv')]
class AdminCgvController extends AbstractController
{
    #[Route('/', name: 'app_admin_cgv_index', methods: ['GET'])]
    public function index(CgvRepository $cgvRepository): Response
    {
        return $this->render('admin_cgv/index.html.twig', [
            'cgvs' => $cgvRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_cgv_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cgv = new Cgv();
        $form = $this->createForm(CgvType::class, $cgv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cgv);
            $entityManager->flush();
            $this->addFlash('success', 'Les CGV ont bien été ajoutées');

            return $this->redirectToRoute('app_admin_cgv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cgv/new.html.twig', [
            'cgv' => $cgv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_cgv_show', methods: ['GET'])]
    public function show(Cgv $cgv): Response
    {
        return $this->render('admin_cgv/show.html.twig', [
            'cgv' => $cgv,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_cgv_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cgv $cgv, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CgvType::class, $cgv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'Les CGV ont bien été modifiées');

            return $this->redirectToRoute('app_admin_cgv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cgv/edit.html.twig', [
            'cgv' => $cgv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_cgv_delete', methods: ['POST'])]
    public function delete(Request $request, Cgv $cgv, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cgv->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cgv);
            $entityManager->flush();
            $this->addFlash('success', 'Les CGV ont bien été supprimées');
        }

        return $this->redirectToRoute('app_admin_cgv_index', [], Response::HTTP_SEE_OTHER);
    }
}
