<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class IngredientFixtures extends Fixture
{
    public const SAUCE_TOMATE_REFERENCE = 'Sauce tomate';
    public const CREME_FRAICHE_REFERENCE = 'Crème fraîche';
    public const PERSILLADE_REFERENCE = 'Persillade';
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
    public const MERGUEZ_REFERENCE = 'Merguez';
    public const CHEVRE_REFERENCE = 'Chèvre';
    public const MIEL_REFERENCE = 'Miel';
    public const ROQUETTE_REFERENCE = 'Roquette';
    public const REBLOCHON_REFERENCE = 'Reblochon';
    public const CHEDDAR_REFERENCE = 'Cheddar';
    public const BACON_REFERENCE = 'Bacon';
    public const POULET_FUME_REFERENCE = 'Poulet fumé';
    public const SAUMON_FUME_REFERENCE = 'Saumon fumé';
    public const THON_REFERENCE = 'Thon';
    public const FRUITS_DE_MER_REFERENCE = 'Fruits de mer';
    public const EMMENTAL_REFERENCE = 'Emmental';
    public const PIMENT_REFERENCE = 'Piment';
    public const OEUF_REFERENCE = 'Oeuf';
    public const ANETH_REFERENCE = 'Aneth';
    public const RACLETTE_REFERENCE = 'Raclette';
    public const LARDON_REFERENCE = 'Lardons';
    public const ARTICHAUT_REFERENCE = 'Artichaut';
    public const VIANDE_HACHEE_REFERENCE = 'Viande hachée';



    public function load(ObjectManager $manager): void
    {
        $ingredient = new Ingredient();
        $ingredient->setNom('Sauce tomate');
        $ingredient->setSlug('sauce-tomate');
        $ingredient->setPrix(0);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(self::SAUCE_TOMATE_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Crème fraîche');
        $ingredient->setSlug('creme-fraiche');
        $ingredient->setPrix(0);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(self::CREME_FRAICHE_REFERENCE, $ingredient);


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
        $this->addReference(self::CHAMPIGNON_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Chorizo');
        $ingredient->setSlug('chorizo');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(self::CHORIZO_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Merguez');
        $ingredient->setSlug('merguez');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(self::MERGUEZ_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Chèvre');
        $ingredient->setSlug('chevre');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::CHEVRE_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Miel');
        $ingredient->setSlug('miel');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::MIEL_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Roquette');
        $ingredient->setSlug('roquette');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::ROQUETTE_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Reblochon');
        $ingredient->setSlug('reblochon');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::REBLOCHON_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Cheddar');
        $ingredient->setSlug('cheddar');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::CHEDDAR_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Bacon');
        $ingredient->setSlug('bacon');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::BACON_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Poulet fumé');
        $ingredient->setSlug('poulet-fume');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::POULET_FUME_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Saumon fumé');
        $ingredient->setSlug('saumon-fume');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::SAUMON_FUME_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Thon');
        $ingredient->setSlug('thon');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::THON_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Fruits de mer');
        $ingredient->setSlug('fruits-de-mer');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::FRUITS_DE_MER_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Emmental');
        $ingredient->setSlug('emmental');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::EMMENTAL_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Piment');
        $ingredient->setSlug('piment'); 
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::PIMENT_REFERENCE, $ingredient);
        
        $ingredient = new Ingredient();
        $ingredient->setNom('Persillade');
        $ingredient->setSlug('persillade');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::PERSILLADE_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Oeuf');
        $ingredient->setSlug('oeuf');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::OEUF_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Aneth');
        $ingredient->setSlug('aneth');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::ANETH_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Lardon');
        $ingredient->setSlug('lardon');
        $ingredient->setPrix(1.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::LARDON_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Raclette');
        $ingredient->setSlug('raclette');
        $ingredient->setPrix(2.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::RACLETTE_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Artichaut');
        $ingredient->setSlug('artichaut');
        $ingredient->setPrix(2.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::ARTICHAUT_REFERENCE, $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setNom('Viande hachée');
        $ingredient->setSlug('viande-hachee');
        $ingredient->setPrix(2.5);
        $ingredient->setIsActive(true);
        $manager->persist($ingredient);
        $this->addReference(SELF::VIANDE_HACHEE_REFERENCE, $ingredient);

        $manager->flush();
    }
}
