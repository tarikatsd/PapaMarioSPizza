<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/home')]
class AdminHomeController extends AbstractController
{
    #[Route('/', name: 'app_admin_home_index', methods: ['GET'])]
    public function index(HomeRepository $homeRepository): Response
    {
        return $this->render('admin_home/index.html.twig', [
            'homes' => $homeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_home_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        // on crée une nouvelle instance de Home
        $home = new Home();
        // on crée un formulaire en lui passant l'instance de Home
        $form = $this->createForm(HomeType::class, $home);
        // on hydrate l'instance de Home avec les données du formulaire
        $form->handleRequest($request);// hydrate l'instance de Home avec les données de la requête
        // si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // on memorise l'instance de Home
            $entityManager->persist($home);
            // on enregistre en base de données
            $entityManager->flush();
            // on ajoute un message flash
            $this->addFlash('success', 'La home a bien été créée');
            // redirection vers la liste des homes
            return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
        }
        // si le formulaire n'est pas soumis ou n'est pas valide
        // on affiche le formulaire
        return $this->renderForm('admin_home/new.html.twig', [
            'home' => $home,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_home_show', methods: ['GET'])]
    public function show(Home $home): Response
    {
        return $this->render('admin_home/show.html.twig', [
            'home' => $home,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_home_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Home $home, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(HomeType::class, $home,["isNew"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            // on ajoute un message flash
            $this->addFlash('success', 'La home a bien été modifiée');
            return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_home/edit.html.twig', [
            'home' => $home,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_home_delete', methods: ['POST'])]
    public function delete(Request $request, Home $home, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$home->getId(), $request->request->get('_token'))) {
            $entityManager->remove($home);
            $entityManager->flush();
            // on ajoute un message flash
            $this->addFlash('success', 'La home a bien été supprimée');
        }

        return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
    }
}
