<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class IngredientFixtures extends Fixture
{
    public const TOMATE_REFERENCE = 'Tomate';
    public const OIGNON_REFERENCE = 'Oignon';
    public const POIVRON_REFERENCE = 'Poivron';
    public const POULET_REFERENCE = 'Poulet';
    public const MOZZARELLA_REFERENCE = 'Mozzarella';
    public const OLIVE_REFERENCE = 'Olive';
    public const ANCHOIS_REFERENCE = 'Anchois';
    public const ANANAS_REFERENCE = 'Ananas';
    public const GORGONZOLA_REFERENCE = 'Gorgonzola';
    public const POMME_DE_TERRE_REFERENCE = 'Pomme de terre';
    public const PARMESAN_REFERENCE = 'Parmesan';
    public const JAMBON_REFERENCE = 'Jambon';
    public const CHAMPIGNON_REFERENCE = 'Champignon';
    public const CHORIZO_REFERENCE = 'Chorizo';


    public function load(ObjectManager $manager): void
    {
        $ingredient = new Ingredient();
        $ingredient->setNom('Tomate');
        $ingredient->setSlug('tomate');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::TOMATE_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Oignon');
        $ingredient->setSlug('oignon');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::OIGNON_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Poivron');
        $ingredient->setSlug('poivron');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::POIVRON_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Poulet');
        $ingredient->setSlug('poulet');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient); 

        $this->addReference(self::POULET_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Mozzarella');
        $ingredient->setSlug('mozzarella');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::MOZZARELLA_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Olive');
        $ingredient->setSlug('olive');  
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::OLIVE_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Anchois');
        $ingredient->setSlug('anchois');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::ANCHOIS_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Ananas');
        $ingredient->setSlug('ananas');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::ANANAS_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Gorgonzola');
        $ingredient->setSlug('gorgonzola');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::GORGONZOLA_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Pomme de terre');
        $ingredient->setSlug('pomme-de-terre');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::POMME_DE_TERRE_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Parmesan');
        $ingredient->setSlug('parmesan');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference(self::PARMESAN_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Jambon');
        $ingredient->setSlug('jambon');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        
        $this->addReference(self::JAMBON_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Champignon');
        $ingredient->setSlug('champignon');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference('Champignon', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Chorizo');
        $ingredient->setSlug('chorizo');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);

        $this->addReference('Chorizo', $ingredient);

        $manager->flush();
    }
}
