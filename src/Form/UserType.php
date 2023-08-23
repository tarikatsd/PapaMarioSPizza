<?php

namespace App\Form;

use App\Entity\User;
use App\Form\AdresseType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->remove('roles')
        ->remove('password')
        ->remove('isVerified')
        ->add('email', null,  [
            'label' => 'Email',
            'attr' => [
                'placeholder' => 'Email',
            ]
        ])
        ->add('plainPassword', RepeatedType::class, [
            'type' => PasswordType::class,
            'invalid_message' => 'Les mots de passe doivent être identiques',
            'required' => false,
            'first_options'  => ['required' => false,
                'label' => 'Mot de passe',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/',
                        'message' => 'Votre mot de passe doit contenir au moins 6 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial'
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ],
            'second_options' => ['label' => 'Confirmer le mot de passe'],
            'mapped' => false,
            
        ])
        ->add('nom', TextType::class, [
            'label' => 'Nom',
            'attr' => [
                'placeholder' => 'Nom'
            ]
        ])
        ->add('prenom',TextType::class, [
            'label' => 'Prénom',
            'attr' => [
                'placeholder' => 'Prénom'
            ]
        ])
        ->add('telephone',null, [
            'label' => 'Téléphone',
            'attr' => [
                'placeholder' => 'Téléphone'
            ]
        ])
        ->add('adresse',CollectionType::class, [
            'entry_type' => AdresseType::class,
            'entry_options' => ['label' => false],
            'allow_add' => true,
            'by_reference' => false,
            'allow_delete' => true,
            'label' => false,
        ])
        ->add('modifier', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-brown'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
