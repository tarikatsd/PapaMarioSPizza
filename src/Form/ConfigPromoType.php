<?php

namespace App\Form;

use App\Entity\Extra;
use App\Entity\Pizza;
use App\Entity\Promo;
use App\Entity\Boisson;
use App\Entity\Canette;
use App\Entity\Dessert;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigPromoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('pizza',EntityType::class,["class"=>Pizza::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2",
        "max"=> (!is_null($options['max_pizza']) ? $options['max_pizza'] : "")]])
        ;
        if($options['has_extra']){
            $builder
            ->add('extra',EntityType::class,["class"=>Extra::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2", 
            "max"=> (!is_null($options['max_extra']) ? $options['max_extra'] : "")]])
            ;
        }
        if($options['has_dessert']){
            $builder
            ->add('dessert',EntityType::class,["class"=>Dessert::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2",
            "max"=> (!is_null($options['max_dessert']) ? $options['max_dessert'] : "")]])
            ;
        }
        if($options['has_boisson']){
            $builder
            ->add('boisson',EntityType::class,["class"=>Boisson::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2",
            "max"=> (!is_null($options['max_boisson']) ? $options['max_boisson'] : "")]])
        ;
        }
        if($options['has_canette']){
            $builder
            ->add('canette',EntityType::class,["class"=>Canette::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2",
            "max"=> (!is_null($options['max_canette']) ? $options['max_canette'] : "")]])  
            ;   
        }
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Promo::class,
            'has_extra'=>true,
            'has_dessert'=>true,
            'has_boisson'=>true,
            'has_canette'=>true,
            'max_extra'=>null,
            'max_dessert'=>null,
            'max_boisson'=>null,
            'max_pizza'=>null,
            'max_canette'=>null,
        ]);
    }
}
