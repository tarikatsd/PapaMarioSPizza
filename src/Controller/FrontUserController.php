<?php

namespace App\Controller;

use App\Form\UserType;
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
    CommandeRepository $commandeRepository, UserRepository $userRepository,ArticleRepository $articleRepository): Response
    {
       // on recupere l'utilisateur connecté
        $user = $this->getUser();
       // on va cree un formulaire de User avec les data de l'utilisateur connecté et on passe le formulaire à la vue
        $form = $this->createForm(UserType::class, $user);
       // on hydrate le formulaire avec les données de l'utilisateur 
        $form->handleRequest($request);
       // on va verifier si le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
           // dd($user);
           // dd($form->getData()); // Récupérer l'instance du User mais pas les propriétés mapped false
           // dd($form->all()); // Récupérer toutes les données (champs) du formulaire y compris les mapped false
           //dd($form->get('plainPassword')->getData()); // On récupére la données d'un champ en particulier y compris les mapped false
           //dd($request->request->get('plainPassword')); // On récupère la valeur d'un champ non pas dans le formulaire, mais dans la requête.
           // dd($form->getData()); // Récupérer l'instance du User mais pas les propriétés mapped false
           // dd($form->all()); // Récupérer toutes les données (champs) du formulaire y compris les mapped false
           //dd($form->get('plainPassword')->getData()); // On récupére la données d'un champ en particulier y compris les mapped false
           //dd($request->request->get('plainPassword')); // On récupère la valeur d'un champ non pas dans le formulaire, mais dans la requête. $request->request récupère les données de la requête POST pour la requête GET il faut utiliser $request->query
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


            if (!$user) {
            throw $this->createNotFoundException('Utilisateur non trouvé');
            }

            $commandes = $userRepository->getCommandes();
            $articles = $commandeRepository->getArticles();


            return $this->redirectToRoute('app_front_user');
        }

        return $this->render('front_user/index.html.twig', [
            'form' => $form->createView(),
            'reseauSocials' => $reseauSocialRepository->findAll(),
            'commandes' => $commandeRepository->findBy(['user' => $user]),
            'articles' => $articleRepository->findBy(['commande' => $commandeRepository->findBy(['user' => $user])]),
            'user' => $user,

        ]);
    }
}
