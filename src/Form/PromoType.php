<?php

namespace App\Form;

use App\Entity\Extra;
use App\Entity\Pizza;
use App\Entity\Promo;
use App\Entity\Boisson;
use App\Entity\Dessert;
use phpDocumentor\Reflection\PseudoTypes\False_;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PromoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->remove('imageName')
        ->remove('updatedAt')
        ->add('isActive', CheckboxType::class,["required"=>false,"label"=>"Activée promo","attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch"]])
        ->add('nom', TextType::class, ['required' => true,'label' => 'Nom','attr' => ['placeholder' => 'Nom de la promo']])
        ->add('checkallpizza',CheckboxType::class,["required"=>false,"label"=>"Toutes les pizzas","mapped"=>false,"attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch"]])
        ->add('pizzaQuantity',IntegerType::class,["required"=>false,"label"=>"Qté","attr"=>["class"=>"form-control","type"=>"number","min"=>0,"max"=>10]])
        ->add('pizza',EntityType::class,["class"=>Pizza::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2"]])
        ->add('checkallextra',CheckboxType::class,["required"=>false,"label"=>"Tous les extras","mapped"=>false,"attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch"]])
        ->add('extraQuantity',IntegerType::class,["required"=>false,"label"=>"Qté","attr"=>["class"=>"form-control","type"=>"number","min"=>0,"max"=>10]])
        ->add('extra',EntityType::class,["class"=>Extra::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2"]])
        ->add('checkalldessert',CheckboxType::class,["required"=>false,"label"=>"Tous les desserts","mapped"=>false,"attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch"]])
        ->add('dessertQuantity',IntegerType::class,["required"=>false,"label"=>"Qté","attr"=>["class"=>"form-control","type"=>"number","min"=>0,"max"=>10]])
        ->add('dessert',EntityType::class,["class"=>Dessert::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2"]])
        ->add('checkallboisson',CheckboxType::class,["required"=>false,"label"=>"Toutes les bouteilles","mapped"=>false,"attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch"]])
        ->add('boissonQuantity',IntegerType::class,["required"=>false,"label"=>"Qté","attr"=>["class"=>"form-control","type"=>"number","min"=>0,"max"=>10]])
        ->add('boisson',EntityType::class,["class"=>Boisson::class,"label"=>"Bouteille","multiple"=>true,'required'=>false,"attr"=>["class"=>"select2"]])
        ->add('checkallcanette',CheckboxType::class,["required"=>false,"label"=>"Toutes les canettes","mapped"=>false,"attr"=>["class"=>"form-check-input"], "row_attr"=>["class"=>"form-switch"]])
        ->add('canetteQuantity',IntegerType::class,["required"=>false,"label"=>"Qté","attr"=>["class"=>"form-control","type"=>"number","min"=>0,"max"=>10]])
        ->add('canette',EntityType::class,["class"=>Boisson::class,"multiple"=>true,'required'=>false,"attr"=>["class"=>"select2"]])
        ->add('prix',MoneyType::class,["required"=>true,"label"=>"Prix"])
        ->add('imageFile',FileType::class, ["required"=>$options['isNew'],"label"=>"Image","attr"=>["class"=>"form-control"]])
        ->add('description',TextareaType::class,["required"=>false,"label"=>"Description","attr"=>["class"=>"form-control"]])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Promo::class,
            'isNew' => true
        ]);
    }
}
