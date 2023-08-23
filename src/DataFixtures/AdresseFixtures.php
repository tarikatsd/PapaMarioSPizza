<?php

namespace App\DataFixtures;

use App\Entity\Adresse;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AdresseFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        

        $adresse = new Adresse();
        $adresse->setNom('maison');
        $adresse->setVoie('27 avenue de la république');
        $adresse->setCodePostal(93800);
        $adresse->setVille('Épinay-sur-Seine');
        $adresse->setUser($this->getReference(UserFixtures::TARIK_REFERENCE));
        $manager->persist($adresse);

        
        $adresse = new Adresse();
        $adresse->setNom('travail');
        $adresse->setVoie('32 avenue de la république');
        $adresse->setCodePostal(93300);
        $adresse->setVille('Aubervilliers');
        $manager->persist($adresse);
        $adresse->setUser($this->getReference(UserFixtures::TARIK_REFERENCE));



        $manager->flush();
    }
}   
