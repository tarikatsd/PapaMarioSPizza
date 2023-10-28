<?php

namespace App\DataFixtures;

use App\Entity\Canette;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CanetteFixtures extends Fixture
{


    public const COCA_COLA_CANETTE_REFERENCE = 'coca-cola-canette';
    public const COCA_COLA_ZERO_CANETTE_REFERENCE = 'coca-zero-canette';
    public const COCA_COLA_CHERRY_CANETTE_REFERENCE = 'coca-cherry-canette';
    public const EVIAN_CANETTE_REFERENCE = 'evian-canette';
    public const LIPTON_ICE_TEA_CANETTE_REFERENCE = 'lipton-ice-tea-canette';
    public const MINUTE_MAID_CANETTE_REFERENCE = 'minute-maid-canette';
    public const MINUTE_MAID_POMME_CANETTE_REFERENCE = 'minute-maid-pomme-canette';
    public const MINUTE_MAID_TROPICAL_CANETTE_REFERENCE = 'minute-maid-tropical-canette';
    public const OASIS_TROPICAL_CANETTE_REFERENCE = 'oasis-tropical-canette';
    public const OASIS_POMME_CASSIS_CANETTE_REFERENCE = 'oasis-pomme-cassis-canette';
    public const ORANGINA_CANETTE_REFERENCE = 'orangina-canette';
    public const PEPSI_CANETTE_REFERENCE = 'pepsi-canette';
    public const PEPSI_MAX_CANETTE_REFERENCE = 'pepsi-max-canette';
    public const SPRITE_CANETTE_REFERENCE = 'sprite-canette';
    public const TROPICO_CANETTE_REFERENCE = 'tropico-canette';
    public const FANTA_CITRON_CANETTE_REFERENCE = 'fanta-citron-canette';
    public const FANTA_ORANGE_CANETTE_REFERENCE = 'fanta-orange-canette';   
    public const PERRIER_CANETTE_REFERENCE = 'perrier-canette';




    public function load(ObjectManager $manager): void
    {
        $canette = new Canette();
        $canette->setNom('Coca-Cola');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('coca-cola.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('coca-cola');
        $manager->persist($canette);
        $this->addReference(self::COCA_COLA_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Coca-Cola zero');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('coca-zero.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('coca-cola-zero');
        $manager->persist($canette);
        $this->addReference(self::COCA_COLA_ZERO_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Coca-Cola cherry');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('coca-cherry.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('coca-cola-cherry');
        $manager->persist($canette);
        $this->addReference(self::COCA_COLA_CHERRY_CANETTE_REFERENCE, $canette);


        $canette = new Canette();
        $canette->setNom('Fanta orange');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('fanta-orange.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('fanta-orange');
        $manager->persist($canette);
        $this->addReference(self::FANTA_ORANGE_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Fanta citron');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('fanta-citron.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('fanta-citron');
        $manager->persist($canette);
        $this->addReference(self::FANTA_CITRON_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Evian');
        $canette->setTaille('50cl');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('evian.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('evian');
        $manager->persist($canette);
        $this->addReference(self::EVIAN_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('perrier');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('perrier.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('perrier');
        $manager->persist($canette);
        $this->addReference(self::PERRIER_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Lipton Ice Tea');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('lipton-ice-tea.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('lipton-ice-tea');
        $manager->persist($canette);
        $this->addReference(self::LIPTON_ICE_TEA_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Minute Maid ');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('minute-maid.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('minute-maid');
        $manager->persist($canette);
        $this->addReference(self::MINUTE_MAID_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Minute Maid pomme');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('minute-maid-pomme.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('minute-maid-pomme');
        $manager->persist($canette);
        $this->addReference(self::MINUTE_MAID_POMME_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Minute Maid tropical');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('minute-maid-tropical.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('minute-maid-tropical');
        $manager->persist($canette);
        $this->addReference(self::MINUTE_MAID_TROPICAL_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Oasis tropical');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('oasis-tropical.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('oasis-tropical');
        $manager->persist($canette);
        $this->addReference(self::OASIS_TROPICAL_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Oasis pomme cassis');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('oasis-pomme-cassis.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('oasis-pomme-cassis');
        $manager->persist($canette);
        $this->addReference(self::OASIS_POMME_CASSIS_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Orangina');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('orangina.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('orangina');
        $manager->persist($canette);
        $this->addReference(self::ORANGINA_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Pepsi');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('pepsi.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('pepsi');
        $manager->persist($canette);
        $this->addReference(self::PEPSI_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Pepsi Max');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('pepsi-max.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('pepsi-max');
        $manager->persist($canette);
        $this->addReference(self::PEPSI_MAX_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Sprite');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('sprite.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('sprite');
        $manager->persist($canette);
        $this->addReference(self::SPRITE_CANETTE_REFERENCE, $canette);

        $canette = new Canette();
        $canette->setNom('Tropico');
        $canette->setTaille('33');
        $canette->setPrix(2.50);
        $canette->setIsActive(true);
        $canette->setImageName('tropico.png');
        $canette->setUpdatedAt(new \DateTimeImmutable());
        $canette->setSlug('tropico');
        $manager->persist($canette);
        $this->addReference(self::TROPICO_CANETTE_REFERENCE, $canette);


        $manager->flush();
    }
}
