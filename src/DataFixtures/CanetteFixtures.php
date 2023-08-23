<?php

namespace App\DataFixtures;

use App\Entity\Canette;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CanetteFixtures extends Fixture
{
    public const COCA_COLA_CANETTE_REFERENCE = 'coca-canette';
    public const FANTA_CANETTE_REFERENCE = 'fanta-canette';
    public const SPRITE_CANETTE_REFERENCE = 'sprite-canette';
    public const ICE_TEA_CANETTE_REFERENCE = 'ice-tea-canette';
    public const ORANGINA_CANETTE_REFERENCE = 'orangina-canette';
    public const SCHWEPPES_CANETTE_REFERENCE = 'schweppes-canette';
    public const PEPSI_CANETTE_REFERENCE = 'pepsi-canette';
    public const SEVENUP_CANETTE_REFERENCE = '7up-canette';
    public const LIPSTON_CANETTE_REFERENCE = 'lipston-canette';



    public function load(ObjectManager $manager): void
    {
        $canette = new Canette();
        $canette->setNom('Coca-Cola');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('coca-cola');
        $manager->persist($canette);
        $this->addReference(self::COCA_COLA_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Fanta');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('fanta');
        $manager->persist($canette);
        $this->addReference(self::FANTA_CANETTE_REFERENCE, $canette);

        $canette = new Canette();   
        $canette->setNom('Sprite');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('sprite');
        $manager->persist($canette);
        $this->addReference(self::SPRITE_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Ice Tea');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('ice-tea');
        $manager->persist($canette);
        $this->addReference(self::ICE_TEA_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Orangina');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('orangina');
        $manager->persist($canette);
        $this->addReference(self::ORANGINA_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Schweppes');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('schweppes');
        $manager->persist($canette);
        $this->addReference(self::SCHWEPPES_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Pepsi');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('pepsi');
        $manager->persist($canette);
        $this->addReference(self::PEPSI_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('7up');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('7up');
        $manager->persist($canette);
        $this->addReference(self::SEVENUP_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Lipton');
        $canette->setTaille('33cl');
        $canette->setPrix(1.50);
        $canette->setIsActive(true);
        $canette->setImageName('canette.jpg');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('lipton');
        $manager->persist($canette);
        $this->addReference(self::LIPSTON_CANETTE_REFERENCE, $canette);

        $manager->flush();
    }
}
