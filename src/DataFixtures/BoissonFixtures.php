<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Boisson;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BoissonFixtures extends Fixture
{
    public const COCA_COLA_REFERENCE = 'coca';
    public const FANTA_REFERENCE = 'fanta';
    public const SPRITE_REFERENCE = 'sprite';
    public const ICE_TEA_REFERENCE = 'ice-tea';
    public const ORANGINA_REFERENCE = 'orangina';
    public const SCHWEPPES_REFERENCE = 'schweppes';
    public const PERRIER_REFERENCE = 'perrier';
    public const VITTEL_REFERENCE = 'vittel';
    public const EVIAN_REFERENCE = 'evian';
    public const OASIS_TROPICAL_REFERENCE = 'oasis';



    public function load(ObjectManager $manager): void
    {
        $boisson = new Boisson();
        $boisson->setNom('Coca-Cola');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('coca-cola');
        $boisson->setIsActive(true);;
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::COCA_COLA_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Fanta');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('fanta');
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::FANTA_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Sprite');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('sprite');
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::SPRITE_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Ice Tea');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('ice-tea');
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::ICE_TEA_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Orangina');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('orangina');
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::ORANGINA_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Schweppes');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('schweppes');
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::SCHWEPPES_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Perrier');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('perrier');
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::PERRIER_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Vittel');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('vittel');
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::VITTEL_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Evian');
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('defaultBoisson.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('evian');
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::EVIAN_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom("oasis tropical");
        $boisson->setPrix(3.5);
        $boisson->setTaille('1,5L');
        $boisson->setImageName("defaultBoisson.png");
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug("oasis-tropical");
        $boisson->setIsActive(true);
        $manager->persist($boisson);

        $this->addReference(self::OASIS_TROPICAL_REFERENCE, $boisson);

        $manager->flush();
    }
}
