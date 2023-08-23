<?php

namespace App\Form;

use App\Entity\Adresse;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options,): void
    {
        $builder
        ->remove('user')
            ->add('nom', null, ['required' => false, 
                'label' => false,
                'attr' => [
                    'placeholder' => 'Donner un nom à votre adresse'
                ]
            ])
            ->add('voie', null, ['required' => false, 
                'label' => false,
                'attr' => [
                    'placeholder' => 'Numero et nom de voie'
                ]
            ])
            ->add('codePostal',IntegerType::class, ['required' => false, 
                'label' => false,
                'attr' => [
                    'placeholder' => 'Code postal'
                ]
            ])
            ->add('ville', null, ['required' => false, 
                'label' => false,
                'attr' => [
                    'placeholder' => 'Ville'
                ]
            ])
            ->add('interphone', null, ['required' => false, 
                'label' => false,
                'attr' => [
                    'placeholder' => 'Interphone'
                ]
            ])
            ->add('complementAdresse', TextareaType::class, ['required' => false, 
                'label' => false,
                'attr' => [
                    'placeholder' => 'Complément d\'adresse'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
