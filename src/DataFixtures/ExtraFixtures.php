<?php

namespace App\DataFixtures;

use App\Entity\Extra;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ExtraFixtures extends Fixture
{
public const NUGGETS_REFERENCE = 'nuggets';
public const CHICKEN_WINGS_REFERENCE = 'chicken-wings';
public const ONION_RINGS_REFERENCE = 'onion-rings';
public const FRITES_REFERENCE = 'frites';
public const POTATOES_REFERENCE = 'potatoes';
public const MOZZA_STICKS_REFERENCE = 'mozza-sticks';
public const CHEESE_POPPERS_REFERENCE = 'cheese-poppers';
public const TENDERS_REFERENCE = 'tenders';
public const YAKITORI_REFERENCE = 'yakitori';
public const BOUCHEES_AU_CAMEMBERT_REFERENCE = 'bouchees-au-camembert';
public const PAIN_A_L_AIL_REFERENCE = 'pain-a-l-ail';


    public function load(ObjectManager $manager): void
    {
        $extra = new Extra();
        $extra->setNom('nuggets x 6');
        $extra->setPrix('4.90');
        $extra->setImageName('nuggets.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('nuggets');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::NUGGETS_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('chicken wings x 6');
        $extra->setPrix('5.90');
        $extra->setImageName('chicken-wings.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('chicken-wings');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::CHICKEN_WINGS_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Onion rings x 6');
        $extra->setPrix('4.90');
        $extra->setImageName('onion-rings.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('onion-rings');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::ONION_RINGS_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Frites');
        $extra->setPrix('2.90');
        $extra->setImageName('frites.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('frites');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::FRITES_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Potatoes');
        $extra->setPrix('2.90');
        $extra->setImageName('potatoes.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('potatoes');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::POTATOES_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Mozza sticks x 6');
        $extra->setPrix('4.90');
        $extra->setImageName('mozza-sticks.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('mozza-sticks');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::MOZZA_STICKS_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Cheese poppers x 6');
        $extra->setPrix('4.90');
        $extra->setImageName('cheese-poppers.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('cheese-poppers');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::CHEESE_POPPERS_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Tenders x 6');
        $extra->setPrix('4.90');
        $extra->setImageName('tenders.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('tenders');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::TENDERS_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Yakitori x 6');
        $extra->setPrix('4.90');
        $extra->setImageName('yakitori.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('yakitori');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::YAKITORI_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Bouchees au camembert x 6');
        $extra->setPrix('4.90');
        $extra->setImageName('bouchees-au-camembert.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('bouchees-au-camembert');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::BOUCHEES_AU_CAMEMBERT_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('Pain a l\'ail');
        $extra->setPrix('2.90');
        $extra->setImageName('pain-a-l-ail.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('pain-a-l-ail');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::PAIN_A_L_AIL_REFERENCE, $extra);

        $manager->flush();
    }
}
