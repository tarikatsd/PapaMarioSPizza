<?php

namespace App\Form;

use App\Entity\ReseauSocial;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ReseauSocialType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->remove('updatedAt')
        ->remove('imageName')
        ->add('nom', TextType::class, ['required' => true,'label' => 'Nom du reseau social','attr' => ['placeholder' => 'Nom du reseau social']])
            ->add('url',UrlType::class,['required' => true,
                'default_protocol' => 'https',
                'attr' => [
                    'placeholder' => 'https://www.NomDuReseauSocial.com/...',
                ]
            ])
            ->add('imageFile',FileType::class, ["required"=>$options['isNew'],"label"=>"Image","attr"=>["class"=>"form-control"]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ReseauSocial::class,
            'isNew' => true
        ]);
    }
}
