<?php

namespace App\DataFixtures;

use App\Entity\Pizza;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PizzaFixtures extends Fixture
{
    public const MARGARITA_REFERENCE = 'margherita';
    public const REINE_REFERENCE = 'reine';
    public const QUATRE_FROMAGES_REFERENCE = '4-fromages';
    public const CALZONE_REFERENCE = 'calzone';
    public const HAWAI_REFERENCE = 'hawai';
    public const VEGETARIENNE_REFERENCE = 'vegetarienne';
    public const SICILIENNE_REFERENCE = 'sicilienne';


    public function load(ObjectManager $manager): void
    {
        $pizza = new Pizza();
        $pizza->setNom('Margherita');
        $pizza->setPrix(8.50);
        $pizza->addIngredient($this->getReference('Tomate'));
        $pizza->setImageName('pizza1.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('margherita');
        $pizza->setIsActive(true);
        $manager->persist($pizza);

        $this->addReference(self::MARGARITA_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Reine');
        $pizza->setPrix(9.50);
        $pizza->addIngredient($this->getReference('Tomate'));
        $pizza->addIngredient($this->getReference('Jambon'));
        $pizza->setImageName('pizza2.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('reine');
        $manager->persist($pizza);

        $this->addReference(self::REINE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('4 fromages');
        $pizza->setPrix(10.50);
        $pizza->addIngredient($this->getReference('Tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Gorgonzola'));
        $pizza->addIngredient($this->getReference('Parmesan'));
        $pizza->setImageName('pizza3.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('4-fromages');
        $pizza->setIsActive(true);
        $manager->persist($pizza);

        $this->addReference(self::QUATRE_FROMAGES_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Calzone');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Jambon'));
        $pizza->setImageName('pizza4.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('calzone');$pizza->setIsActive(true);
        $manager->persist($pizza);

        $this->addReference(self::CALZONE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Hawai');
        $pizza->setPrix(10.50);
        $pizza->addIngredient($this->getReference('Tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Jambon'));
        $pizza->addIngredient($this->getReference('Ananas'));
        $pizza->setImageName('pizza5.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('hawai');$pizza->setIsActive(true);
        $manager->persist($pizza);

        $this->addReference(self::HAWAI_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Végétarienne');
        $pizza->setPrix(10.50);
        $pizza->addIngredient($this->getReference('Tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Poivron'));
        $pizza->addIngredient($this->getReference('Olive'));
        $pizza->setImageName('pizza6.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('vegetarienne');$pizza->setIsActive(true);
        $manager->persist($pizza);

        $this->addReference(self::VEGETARIENNE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Sicilienne');
        $pizza->setPrix(10.50);
        $pizza->addIngredient($this->getReference('Tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Anchois'));
        $pizza->addIngredient($this->getReference('Olive'));
        $pizza->setImageName('pizza7.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('sicilienne');$pizza->setIsActive(true);
        $manager->persist($pizza);

        $this->addReference(self::SICILIENNE_REFERENCE, $pizza);

        $manager->flush();
    }
}
