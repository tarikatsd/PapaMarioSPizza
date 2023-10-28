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

    public const NORVEGIENNE_REFERENCE = 'norvegienne';
    public const CHORIZO_REFERENCE = 'chorizo';
    public const BOLOGNAISE_REFERENCE = 'bolognaise';
    public const FERMIERE_REFERENCE = 'fermiere';
    public const RACLETTE_REFERENCE = 'raclette';
    public const TARTIFLETTE_REFERENCE = 'tartiflette';
    public const CHEVRE_MIEL_REFERENCE = 'chevre-miel';
    public const CANIBALE_REFERENCE = 'canibale';
    public const CAMPIONNE_REFERENCE = 'campionne';
    public const QUATRE_SAISON_REFERENCE = '4-saisons';




    public function load(ObjectManager $manager): void
    {
        $pizza = new Pizza();
        $pizza->setNom('Margherita');
        $pizza->setPrix(8.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->setImageName('margherita.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('margherita');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::MARGARITA_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Reine');
        $pizza->setPrix(9.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Jambon'));
        $pizza->addIngredient($this->getReference('Champignon'));
        $pizza->setImageName('reine.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('reine');
        $manager->persist($pizza);
        $this->addReference(self::REINE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('4 fromages');
        $pizza->setPrix(10.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Gorgonzola'));
        $pizza->addIngredient($this->getReference('Parmesan'));
        $pizza->addIngredient($this->getReference('Chèvre'));
        $pizza->setImageName('4-fromages.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('4-fromages');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::QUATRE_FROMAGES_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Calzone');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Jambon'));
        $pizza->addIngredient($this->getReference('Oeuf'));
        $pizza->setImageName('calzone.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('calzone');$pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::CALZONE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Hawai');
        $pizza->setPrix(10.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Jambon'));
        $pizza->addIngredient($this->getReference('Ananas'));
        $pizza->setImageName('hawai.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('hawai');$pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::HAWAI_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Végétarienne');
        $pizza->setPrix(10.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Poivron'));
        $pizza->addIngredient($this->getReference('Olive'));
        $pizza->addIngredient($this->getReference('Champignon'));
        $pizza->setImageName('vegetarienne.jpg');
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
        $pizza->setImageName('sicilienne.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('sicilienne');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::SICILIENNE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Canibale');
        $pizza->setPrix(14.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Viande hachée'));
        $pizza->addIngredient($this->getReference('Poulet'));
        $pizza->addIngredient($this->getReference('Lardons'));
        $pizza->addIngredient($this->getReference('Merguez'));
        $pizza->addIngredient($this->getReference('Oignon'));
        $pizza->setImageName('canibale.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('canibale');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::CANIBALE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Campionne');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Viande hachée'));
        $pizza->addIngredient($this->getReference('Champignon'));
        $pizza->addIngredient($this->getReference('Oeuf')); 
        $pizza->setImageName('campionne.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('campionne');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::CAMPIONNE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('4 saison');
        $pizza->setPrix(12.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Jambon'));
        $pizza->addIngredient($this->getReference('Champignon'));
        $pizza->addIngredient($this->getReference('Olive'));
        $pizza->addIngredient($this->getReference('Artichaut'));
        $pizza->addIngredient($this->getReference('Poivron'));
        $pizza->setImageName('4-saison.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('4-saison');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::QUATRE_SAISON_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Norvégienne');
        $pizza->setPrix(12.50);
        $pizza->addIngredient($this->getReference('Crème fraîche'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Saumon fumé'));
        $pizza->addIngredient($this->getReference('Aneth'));
        $pizza->setImageName('pizza.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('norvegienne');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::NORVEGIENNE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Chorizo');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Chorizo'));
        $pizza->addIngredient($this->getReference('Olive'));
        $pizza->setImageName('chorizo.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('chorizo');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::CHORIZO_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Bolognaise');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Sauce tomate'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Viande hachée'));
        $pizza->addIngredient($this->getReference('Olive'));
        $pizza->setImageName('bolognaise.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('bolognaise');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::BOLOGNAISE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Fermiere');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Crème fraîche'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Pomme de terre'));
        $pizza->addIngredient($this->getReference('Poulet fumé'));
        $pizza->addIngredient($this->getReference('Oignon'));
        $pizza->setImageName('fermiere.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('fermiere');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::FERMIERE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Raclette');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Crème fraîche'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Pomme de terre'));
        $pizza->addIngredient($this->getReference('Jambon'));
        $pizza->addIngredient($this->getReference('Raclette'));
        $pizza->setImageName('raclette.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('raclette');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::RACLETTE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Tartiflette');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Crème fraîche'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Pomme de terre'));
        $pizza->addIngredient($this->getReference('Lardons'));
        $pizza->addIngredient($this->getReference('Reblochon'));
        $pizza->addIngredient($this->getReference('Oignon'));
        $pizza->setImageName('tartiflette.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('tartiflette');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::TARTIFLETTE_REFERENCE, $pizza);

        $pizza = new Pizza();
        $pizza->setNom('Chèvre miel');
        $pizza->setPrix(11.50);
        $pizza->addIngredient($this->getReference('Crème fraîche'));
        $pizza->addIngredient($this->getReference('Mozzarella'));
        $pizza->addIngredient($this->getReference('Chèvre'));
        $pizza->addIngredient($this->getReference('Miel'));
        $pizza->setImageName('chevre-miel.jpg');
        $pizza->setUpdatedAt(new DateTimeImmutable() );
        $pizza->setSlug('chevre-miel');
        $pizza->setIsActive(true);
        $manager->persist($pizza);
        $this->addReference(self::CHEVRE_MIEL_REFERENCE, $pizza);

        $manager->flush();
    }
}
