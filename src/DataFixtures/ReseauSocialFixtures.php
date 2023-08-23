<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\ReseauSocial;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ReseauSocialFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $reseauSocial = new ReseauSocial();
        $reseauSocial->setNom('Facebook');
        $reseauSocial->setImageName('FACEBOOK.png');
        $reseauSocial->setUrl('https://www.facebook.com/');
        $reseauSocial->setUpdatedAt(new DateTimeImmutable() );
        $manager->persist($reseauSocial);

        $reseauSocial = new ReseauSocial();
        $reseauSocial->setNom('Instagram');
        $reseauSocial->setImageName('INSTAGRAM.png');
        $reseauSocial->setUrl('https://www.instagram.com/');
        $reseauSocial->setUpdatedAt(new DateTimeImmutable() );
        $manager->persist($reseauSocial);

        $reseauSocial = new ReseauSocial();
        $reseauSocial->setNom('Snapchat');
        $reseauSocial->setImageName('SNAPCHAT.png');
        $reseauSocial->setUrl('https://www.snapchat.com/');
        $reseauSocial->setUpdatedAt(new DateTimeImmutable() );
        $manager->persist($reseauSocial);

        $manager->flush();
    }
}
