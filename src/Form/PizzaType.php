<?php

namespace App\Form;

use App\Entity\Pizza;
use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class PizzaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->remove('updatedAt')
        ->remove('imageName')
        ->add('isActive', CheckboxType::class,["required"=>false,"label"=>"Activée","attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch"]])
        ->add('nom', TextType::class, ['required' => true,'label' => 'Nom de la pizza','attr' => ['placeholder' => 'Nom de la pizza']])
        ->add('rankOrder',NumberType::class,["required"=>false,"label"=>"Ordre","row_attr"=>["class"=>"mb-0"]])
        ->add('ingredient',EntityType::class,["class"=>Ingredient::class,"multiple"=>true,'required'=>true,"attr"=>["class"=>"select2"]])
        ->add('imageFile',FileType::class, ["required"=>$options['isNew'],"label"=>"Image","attr"=>["class"=>"form-control"]])
        ->add('prix',MoneyType::class,["required"=>true,"label"=>"Prix"])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Pizza::class,
            'isNew' => true
        ]);
    }
}
