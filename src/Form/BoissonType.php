<?php

namespace App\Form;

use App\Entity\Boisson;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class BoissonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->remove('updatedAt')
        ->remove('imageName')
        ->add('isActive', CheckboxType::class, ["required"=>false, "label"=>"Active", "attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch"]])
        ->add('nom',TextType::class,["required"=>true,"label"=>"Nom"])
            ->add('taille',TextType::class,["required"=>true,"label"=>"Taille"])
            ->add('prix',MoneyType::class,["required"=>true,"label"=>"Prix"])
            ->add('imageFile',FileType::class,["required"=>$options['isNew'],"label"=>"image"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Boisson::class,
            'isNew'=>true
        ]);
    }
}
