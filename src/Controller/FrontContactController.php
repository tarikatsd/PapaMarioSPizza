<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ReseauSocialRepository;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontContactController extends AbstractController
{
    #[Route('/contact', name: 'app_front_contact')]
    public function index(Request $request, EntityManagerInterface $em, MailerInterface $mailerInterface,
    ReseauSocialRepository $reseauSocialRepository): Response
    {
        //on met en place le formulaire de contact
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        //on hydrate le contact avec les données du formulaire
        $form->handleRequest($request);
        // On vérifie que le formulaire est soumis et valide
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($contact);
            $em->flush();
            //on envoi par mail
            // $email = (new Email())
            // ->from($contact->getEmail())
            // ->to('admin@lalibrairie')
            // ->subject($contact->getSujet())
            // ->text($contact->getMessage());
            // On recuperer l'email déclaré dans le fichier services.yaml
            $emailContact = $this->getParameter('app.contactEmail');
            // on prepare le mail html
            $email = (new TemplatedEmail())
            ->from($contact->getEmail())
            ->to($emailContact)
            ->subject((!is_null($contact->getSujet())) ? $contact->getSujet() : 'Pas de sujet')
            ->htmlTemplate('front_contact/contact.html.twig')
            ->context([
                'qui'=>$contact->getEmail(),
                'sujet'=>$contact->getSujet(),	
                'message'=>$contact->getMessage(),
            ]);
            //on envoi le mail

            // $mailerInterface->send($email);
            //on ajoute un message
            $this->addFlash('success', 'Votre message a bien été envoyé');
            //on redirige vers la page d'accueil
            return $this->redirectToRoute('app_home');
        }
        //
        return $this->render('front_contact/index.html.twig', [
            'form' => $form->createView(),
            'reseauSocials' => $reseauSocialRepository->findAll(),

        ]);
    }
}