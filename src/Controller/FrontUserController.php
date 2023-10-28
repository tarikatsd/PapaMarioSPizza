<?php

namespace App\Controller;

use App\Form\UserType;
use App\Repository\AdresseRepository;
use App\Repository\ArticleRepository;
use App\Repository\CommandeRepository;
use App\Repository\ReseauSocialRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class FrontUserController extends AbstractController
{

    #[Route('/user', name: 'app_front_user')]
    public function index(Request $request,ReseauSocialRepository $reseauSocialRepository,
    EntityManagerInterface $entityManagerInterface,UserPasswordHasherInterface $userPasswordHasherInterface,
    CommandeRepository $commandeRepository, UserRepository $userRepository,ArticleRepository $articleRepository,
    AdresseRepository $adresseRepository): Response
    {
        // on recupere l'utilisateur connecté
        $user = $this->getUser();
        $commandes = $commandeRepository->findBy(['user' => $user]);
        $adresse = $adresseRepository->findBy(['user' => $user]);
        $articles = $articleRepository->findBy(['commande' => $commandeRepository->findBy(['user' => $user])]);
        if ($user) {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            if(!is_null($request->request->get('plainPassword'))){
                $user->setPassword(
                    $userPasswordHasherInterface->hashPassword(
                       $user, $request->request->get('plainPassword')  // on recupere le mot de passe en clair du formulaire
                    )
                );
                $entityManagerInterface->persist($user);
            }
            $entityManagerInterface->flush();
            $this->addFlash('success', 'Votre profil a bien été modifié');
            return $this->redirectToRoute('app_front_user');
        }
        }else{
            return $this->redirectToRoute('app_login');
            $this->addFlash('danger', 'Vous devez être connecté pour accéder à cette page');
        }

        return $this->render('front_user/index.html.twig', [
            'form' => $form->createView(),
            'reseauSocials' => $reseauSocialRepository->findAll(),
            'commandes' => $commandes,
            'adresse' => $adresse,
            'articles' => $articles,
            'user' => $user,

        ]);
    }
}
