<?php

namespace App\DataFixtures;

use App\Entity\Extra;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ExtraFixtures extends Fixture
{
public const NUGGETS_REFERENCE = 'nuggets';
public const FRITES_REFERENCE = 'frites';
public const SALADE_REFERENCE = 'salade';
public const WINGS_REFERENCE = 'wings';
public const SAUCE_REFERENCE = 'sauce';
public const OIGNON_RINGS_REFERENCE = 'oignon-rings';
public const PEPADREW_REFERENCE = 'pepadrew';
public const CHEDDAR_REFERENCE = 'cheddar';
public const CHEDDAR_FONDU_REFERENCE = 'cheddar-fondu';


    public function load(ObjectManager $manager): void
    {
        $extra = new Extra();
        $extra->setNom('nuggets');
        $extra->setPrix(2.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('nuggets');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::NUGGETS_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('frites');
        $extra->setPrix(2.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('frites');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::FRITES_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('salade');
        $extra->setPrix(2.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('salade');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::SALADE_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('wings');
        $extra->setPrix(2.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('wings');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::WINGS_REFERENCE, $extra);
        
        $extra = new Extra();
        $extra->setNom('sauce');
        $extra->setPrix(0.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('sauce');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::SAUCE_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('oigon rings');
        $extra->setPrix(2.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() ); 
        $extra->setSlug('oigon-rings');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::OIGNON_RINGS_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('pepadew');
        $extra->setPrix(2.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('pepadew');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::PEPADREW_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('cheddar');
        $extra->setPrix(2.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('cheddar');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::CHEDDAR_REFERENCE, $extra);

        $extra = new Extra();
        $extra->setNom('cheddar fondu');
        $extra->setPrix(2.5);
        $extra->setImageName('defaultExtra.jpg');
        $extra->setUpdatedAt(new DateTimeImmutable() );
        $extra->setSlug('cheddar-fondu');
        $extra->setIsActive(true);
        $manager->persist($extra);
        $this->addReference(self::CHEDDAR_FONDU_REFERENCE, $extra);
        




        $manager->flush();
    }
}
