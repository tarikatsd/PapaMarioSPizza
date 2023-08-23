<?php

namespace App\Controller;

use App\Entity\Carousel;
use App\Form\CarouselType;
use App\Repository\CarouselRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('admin/carousel')]
class AdminCarouselController extends AbstractController
{
    #[Route('/', name: 'app_admin_carousel_index', methods: ['GET'])]
    public function index(CarouselRepository $carouselRepository): Response
    {
        return $this->render('admin_carousel/index.html.twig', [
            'carousels' => $carouselRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_carousel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $carousel = new Carousel();
        $form = $this->createForm(CarouselType::class, $carousel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($carousel);
            $entityManager->flush();
            $this->addFlash('success', 'Le carousel a bien été créé');

            return $this->redirectToRoute('app_admin_carousel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_carousel/new.html.twig', [
            'carousel' => $carousel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_carousel_show', methods: ['GET'])]
    public function show(Carousel $carousel): Response
    {
        return $this->render('admin_carousel/show.html.twig', [
            'carousel' => $carousel,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_carousel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Carousel $carousel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CarouselType::class, $carousel,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            // on ajoute un message flash
            $this->addFlash('success', 'Le carousel a bien été modifié');

            return $this->redirectToRoute('app_admin_carousel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_carousel/edit.html.twig', [
            'carousel' => $carousel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_carousel_delete', methods: ['POST'])]
    public function delete(Request $request, Carousel $carousel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$carousel->getId(), $request->request->get('_token'))) {
            $entityManager->remove($carousel);
            $entityManager->flush();
            // on ajoute un message flash
            $this->addFlash('success', 'Le carousel a bien été supprimé');
        }

        return $this->redirectToRoute('app_admin_carousel_index', [], Response::HTTP_SEE_OTHER);
    }
}
