<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitre("bienvenue chez Papa Mario's Pizza ");
        $home->setTexte('voici la meilleur pizzeria  de france avec de pizzas de qualitée ');
        $home->setImageName('defaultHome.jpg');
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre('bienvenue sur la pizeria la plus hype de france ');
        $home->setTexte('ne venez vous faire votre propre avis en degustant nos pizza cuit sur pierre au feu de bois');
        $home->setImageName('defaultHome.jpg');
        $home->setIsActive(false);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre("bienvenue chez Papa Mario's Pizza ");
        $home->setTexte('voici la meilleur pizzeria  de france avec de pizzas de qualitée ');
        $home->setImageName('defaultHome.jpg');
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre('bienvenue sur la pizeria la plus hype de france ');
        $home->setTexte('ne venez vous faire votre propre avis en degustant nos pizza cuit sur pierre au feu de bois');
        $home->setImageName('defaultHome.jpg');
        $home->setIsActive(false);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre("bienvenue chez Papa Mario's Pizza ");
        $home->setTexte('voici la meilleur pizzeria  de france avec de pizzas de qualitée ');
        $home->setImageName('defaultHome.jpg');
        $home->setIsActive(true);
        $manager->persist($home);

        $home = new Home();
        $home->setTitre('bienvenue sur la pizeria la plus hype de france ');
        $home->setTexte('ne venez vous faire votre propre avis en degustant nos pizza cuit sur pierre au feu de bois');
        $home->setImageName('defaultHome.jpg');
        $home->setIsActive(false);
        $manager->persist($home);

        $manager->flush();
    }
}
