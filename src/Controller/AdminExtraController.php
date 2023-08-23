<?php

namespace App\Controller;

use App\Entity\Extra;
use App\Form\ExtraType;
use App\Repository\ExtraRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

#[Route('/admin/extra')]
class AdminExtraController extends AbstractController
{
    #[Route('/', name: 'app_admin_extra_index', methods: ['GET'])]
    public function index(ExtraRepository $extraRepository): Response
    {
        return $this->render('admin_extra/index.html.twig', [
            'extras' => $extraRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_extra_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager ,SluggerInterface $sluggerInterface): Response
    {
        $extra = new Extra();
        $form = $this->createForm(ExtraType::class, $extra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $extra ->setSlug($sluggerInterface->slug(strtolower($extra->getNom())));
            $entityManager->persist($extra);
            $entityManager->flush();
            $this->addFlash('success', 'Extra a bien été ajouté');

            return $this->redirectToRoute('app_admin_extra_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_extra/new.html.twig', [
            'extra' => $extra,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_extra_show', methods: ['GET'])]
    public function show(Extra $extra): Response
    {
        return $this->render('admin_extra/show.html.twig', [
            'extra' => $extra,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_extra_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Extra $extra, EntityManagerInterface $entityManager,SluggerInterface $sluggerInterface): Response
    {
        $form = $this->createForm(ExtraType::class, $extra,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $extra ->setSlug($sluggerInterface->slug(strtolower($extra->getNom())));
            $entityManager->flush();
            $this->addFlash('success', 'Extra modifié avec succès');

            return $this->redirectToRoute('app_admin_extra_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_extra/edit.html.twig', [
            'extra' => $extra,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_extra_delete', methods: ['POST'])]
    public function delete(Request $request, Extra $extra, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$extra->getId(), $request->request->get('_token'))) {
            $entityManager->remove($extra);
            $entityManager->flush();
            $this->addFlash('success', 'Extra supprimé avec succès');
        }

        return $this->redirectToRoute('app_admin_extra_index', [], Response::HTTP_SEE_OTHER);
    }
}
