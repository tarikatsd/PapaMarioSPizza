<?php

namespace App\Controller;

use App\Entity\Promo;
use App\Form\ConfigPromoType;
use App\Repository\PromoRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontPromoController extends AbstractController
{
    #[Route('/promo/getform', name: 'app_front_promo_getform')]
    public function getPromoForm(Request $request, PromoRepository $promoRepository): Response
    {

        $promo = $promoRepository->find($request->request->get("promoId"));
        $hasExtra = true;
        if ($promo->getExtraQuantity() == 0) {
            $hasExtra = false;
        }
        $hasBoisson = true;
        if ($promo->getBoissonQuantity() == 0) {
            $hasBoisson = false;
        }
        $hasDessert = true;
        if ($promo->getDessertQuantity() == 0) {
            $hasDessert = false;
        }
        $hasCanette = true;
        if ($promo->getCanetteQuantity() == 0) {
            $hasCanette = false;
        }
        $form = $this->createForm(ConfigPromoType::class, $promo, ["has_extra" => $hasExtra, "has_boisson" => $hasBoisson, "has_dessert" => $hasDessert, "has_canette" => $hasCanette, "max_pizza" => $promo->getPizzaQuantity(), "max_extra" => $promo->getExtraQuantity(), "max_boisson" => $promo->getBoissonQuantity(), "max_dessert" => $promo->getDessertQuantity(), "max_canette" => $promo->getCanetteQuantity()]);
        return $this->render('front_promo/_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/promo', name: 'app_front_promo')]
    public function index(
        PromoRepository $promoRepository,
        ReseauSocialRepository $reseauSocialRepository,
        EntityManagerInterface $entityManager,
        Request $request,
        SluggerInterface $slugger
    ): Response {
        $promo = new Promo();
        $form = $this->createForm(ConfigPromoType::class, $promo);
        // On traite les données du formulaire lorsqu'il est soumis
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $promo->setSlug($slugger->slug(strtolower($promo->getNom())));
            $entityManager->persist($promo);

            return $this->redirectToRoute('app_front_promo');
        }
        return $this->render('front_promo/index.html.twig', [
            'promos' => $promoRepository->findBy(["isActive" => true]),
            'reseauSocials' => $reseauSocialRepository->findAll(),
            'form' => $form->createView()
        ]);
    }
}
