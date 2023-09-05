<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Commande;
use App\Repository\IngredientRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Uuid;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontCommandeController extends AbstractController
{
    #[Route('/front/commande', name: 'app_front_commande')]
    public function index(SessionInterface $session): Response
    {
        return $this->render('front_commande/index.html.twig', [
            'controller_name' => 'FrontCommandeController',
        ]);
    }

    #[Route('/add/commande', name: 'app_front_commande_add')]
    public function add(
        SessionInterface $session,
        ReseauSocialRepository $reseauSocialRepository,
        EntityManagerInterface $entityManagerInterface,
        IngredientRepository $ingredientRepository
    ): Response {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $panier = $session->get('panier', []);
        if (empty($panier)) {
            return $this->redirectToRoute('app_home');
        }
        $commande = new Commande();
        $commande->setUser($this->getUser());
        $commande->setReference(uniqid() . '-' . date('d-m-Y') . '-' . date('H:i:s') . '-' . rand(0, 9999));
        $commande->setStatut('En cours');
        $commande->setUpdatedAt(new \DateTimeImmutable());
        $total = 0;

        foreach ($panier as $item => $id) {
            $article = new Article();
            $nom = $id['nom'];
            $quantity = $id['quantity'];
            $prix = $id['totalPrice'];
            // Bouclez sur les ingrédients ajoutés pour obtenir leurs noms et graisses
            if (empty($id['ingredientsAdded'])) {
                $ingredientsAdded = '';
            } else {
                $ingredientsAddedInfo = [];
                foreach ($id['ingredientsAdded'] as $ingredientId) {
                    $ingredient = $ingredientRepository->find($ingredientId);
                    if ($ingredient) {
                        $ingredientsAddedInfo[] = $ingredient->getNom() . ' (' . $ingredient->getPrix() . '€)';
                    }
                    $ingredientsAdded = implode(', ', $ingredientsAddedInfo);
                }
            }
            if (empty($id['ingredientsRemoved'])) {
                $ingredientsRemoved = '';
            } else {
                $ingredientsRemovedNames = [];
                foreach ($id['ingredientsRemoved'] as $ingredientId) {
                    $ingredient = $ingredientRepository->find($ingredientId);
                    if ($ingredient) {
                        $ingredientsRemovedNames[] = $ingredient->getNom();
                    }
                    $ingredientsRemoved = implode(', ', $ingredientsRemovedNames);
                }
            }

            // Attribuez les informations à l'article
            $article->setNom($nom);
            $article->setIngredientAdd($ingredientsAdded);
            $article->setIngredientRemoved($ingredientsRemoved);
            $article->setQuantity($quantity);
            $article->setPrix($prix);
            $commande->addArticle($article);
            $articleTotal = $prix * $quantity;
            $total += $articleTotal;
        }
        $commande->setTotal($total);

        if ($commande->getTotal() < 15) {
            $this->addFlash('danger', 'Votre commande doit être supérieure à 15€');
            return $this->redirectToRoute('app_front_panier');
        } else {
            $entityManagerInterface->persist($commande);
            $entityManagerInterface->flush();
            $this->addFlash('success', 'Votre commande a bien été enregistrée');
            $session->clear();
            return $this->redirectToRoute('app_home');
        }

        return $this->render('front_commande/index.html.twig', [
            'controller_name' => 'FrontCommandeController',
            'reseauSocials' => $reseauSocialRepository->findAll(),
        ]);
    }
}
