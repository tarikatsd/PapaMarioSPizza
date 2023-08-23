<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Dessert;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DessertFixtures extends Fixture
{
    public const TIRAMISU_REFERENCE = 'tiramisu';
    public const TARTE_AUX_POMMES_REFERENCE = 'tarte-aux-pommes';
    public const TARTE_AUX_CITRON_REFERENCE = 'tarte-au-citron';
    public const TARTE_AUX_FRAISES_REFERENCE = 'tarte-aux-fraises';
    public const TARTE_AUX_FRAMBOISES_REFERENCE = 'tarte-aux-framboises';
    public const TARTE_AUX_MYRTILLES_REFERENCE = 'tarte-aux-myrtilles';
    public const TARTE_AUX_ABRICOTS_REFERENCE = 'tarte-aux-abricots';
    public const TARTE_AUX_POIRES_REFERENCE = 'tarte-aux-poires';
    public const TARTE_AUX_PECHE_REFERENCE = 'tarte-aux-peches';


    public function load(ObjectManager $manager): void
    {
        $dessert = new Dessert();
        $dessert->setNom('Tiramisu');
        $dessert->setPrix(5.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );
        $dessert->setSlug('tiramisu');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TIRAMISU_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux pommes');
        $dessert->setPrix(4.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );
        $dessert->setSlug('tarte-aux-pommes');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TARTE_AUX_POMMES_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte au citron');
        $dessert->setPrix(4.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );
        $dessert->setSlug('tarte-au-citron');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TARTE_AUX_CITRON_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux fraises');
        $dessert->setPrix(4.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );
        $dessert->setSlug('tarte-aux-fraises');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TARTE_AUX_FRAISES_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux framboises');
        $dessert->setPrix(4.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );
        $dessert->setSlug('tarte-aux-framboises');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TARTE_AUX_FRAMBOISES_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux myrtilles');
        $dessert->setPrix(4.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );
        $dessert->setSlug('tarte-aux-myrtilles');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TARTE_AUX_MYRTILLES_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux abricots');
        $dessert->setPrix(4.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );   
        $dessert->setSlug('tarte-aux-abricots');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TARTE_AUX_ABRICOTS_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux poires');
        $dessert->setPrix(4.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );
        $dessert->setSlug('tarte-aux-poires');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TARTE_AUX_POIRES_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux pêches');
        $dessert->setPrix(4.50);
        $dessert->setImageName('defaultDessert.jpg');
        $dessert->setUpdatedAt(new DateTimeImmutable() );
        $dessert->setSlug('tarte-aux-peches');
        $dessert->setIsActive(true);
        $manager->persist($dessert);

        $this->addReference(self::TARTE_AUX_PECHE_REFERENCE, $dessert);

        

        $manager->flush();
    }
}
