<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Boisson;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BoissonFixtures extends Fixture
{
    public const COCA_COLA_REFERENCE = 'coca-cola';
    public const COCA_ZERO_REFERENCE = 'coca-cola-zero';
    public const COCA_CHERRY_REFERENCE = 'coca-cola-cherry';
    public const SEVEN_UP_REFERENCE = '7up';
    public const SEVEN_UP_MOJITO_REFERENCE = '7up-mojito';
    public const CANADA_DRY_REFERENCE = 'canada-dry';
    public const FANTA_ORANGE_REFERENCE = 'fanta-orange';
    public const FANTA_CITRON_REFERENCE = 'fanta-citron';
    public const LIPTON_ICE_TEA_REFERENCE = 'lipton-ice-tea';
    public const OASIS_TROPICAL_REFERENCE = 'oasis-tropical';
    public const OASIS_POMME_CASSIS_REFERENCE = 'oasis-pomme-cassis';
    public const ORANGINA_REFERENCE = 'orangina';
    public const SCHWEPPES_AGRUM_REFERENCE = 'schweppes-agrum';
    public const SCHWEPPES_LEMON_REFERENCE = 'schweppes-lemon';
    public const SPRITE_REFERENCE = 'sprite';
    public const TROPICO_REFERENCE = 'tropico';
    public const PERRIER_REFERENCE = 'perrier';




    public function load(ObjectManager $manager): void
    {
        $boisson = new Boisson();
        $boisson->setNom('Coca-Cola');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('coca-cola.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('coca-cola');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::COCA_COLA_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('coca-cola zero');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('coca-cola-zero.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('coca-cola-zero');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::COCA_ZERO_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('coca-cola cherry');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('coca-cola-cherry.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('coca-cola-cherry');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::COCA_CHERRY_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('7up');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('7up.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('7up');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::SEVEN_UP_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('7up mojito');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('7up-mojito.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('7up-mojito');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::SEVEN_UP_MOJITO_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Canada Dry');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('canada-dry.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('canada-dry');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::CANADA_DRY_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Fanta orange');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('fanta-orange.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('fanta-orange');
        $boisson->setIsActive(true);
        $manager->persist($boisson);    
        $this->addReference(self::FANTA_ORANGE_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Fanta citron');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('fanta-citron.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('fanta-citron');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::FANTA_CITRON_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Lipton Ice Tea');
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName('lipton-ice-tea.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('lipton-ice-tea');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::LIPTON_ICE_TEA_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Oasis tropical');
        $boisson->setPrix(3.50);
        $boisson->setTaille('2L');
        $boisson->setImageName('oasis-tropical.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('oasis-tropical');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::OASIS_TROPICAL_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom('Oasis pomme cassis');
        $boisson->setPrix(3.50);
        $boisson->setTaille('2L');
        $boisson->setImageName('oasis-pomme-cassis.png');
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug('oasis-pomme-cassis');
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::OASIS_POMME_CASSIS_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom("Orangina");
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName("orangina.png");
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug("orangina");
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::ORANGINA_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom("Schweppes agrum'");
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName("schweppes-agrum.png");
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug("schweppes-agrum");
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::SCHWEPPES_AGRUM_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom("Schweppes lemon");
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName("schweppes-lemon.png");
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug("schweppes-lemon");
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::SCHWEPPES_LEMON_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom("Sprite");
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName("sprite.png");
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug("sprite");
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::SPRITE_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom("Tropico");
        $boisson->setPrix(3.0);
        $boisson->setTaille('1,5L');
        $boisson->setImageName("tropico.png");
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug("tropico");
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::TROPICO_REFERENCE, $boisson);

        $boisson = new Boisson();
        $boisson->setNom("Perrrier");
        $boisson->setPrix(2.50);
        $boisson->setTaille('1L');
        $boisson->setImageName("perrier.png");
        $boisson->setUpdatedAt(new DateTimeImmutable() );
        $boisson->setSlug("perrier");
        $boisson->setIsActive(true);
        $manager->persist($boisson);
        $this->addReference(self::PERRIER_REFERENCE, $boisson);

        $manager->flush();
    }
}
