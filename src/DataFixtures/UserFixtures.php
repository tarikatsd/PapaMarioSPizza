<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture 
{   
   

    public const TARIK_REFERENCE = 'tarik';
    public const IDRISS_REFERENCE = 'idriss';

    public $encoder; // pour le hashage du mot de passe

    public function __construct(UserPasswordHasherInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    //METHODS

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('tarikaitsaid33@gmail.com');
        $user->setPassword($this->encoder->hashPassword($user, 'Tarobr93300@'));
        $user->setRoles(['ROLE_ADMIN']);
        $user->setNom('Ait-said');
        $user->setPrenom('Tarik');
        $user->setTelephone('0786891246');
        $user->isVerified(true);
        $manager->persist($user);
        $this->addReference(self::TARIK_REFERENCE, $user);


        $user = new User();
        $user->setEmail('idrissslimani999@gmail.com');
        $user->setPassword($this->encoder->hashPassword($user, 'Tarobr93300@'));
        $user->setRoles(['ROLE_USER']);
        $user->setNom('Slimani');
        $user->setPrenom('Idriss');
        $user->setTelephone('0786891246');
        $user->isVerified(true);
        $manager->persist($user);
        $this->addReference(self::IDRISS_REFERENCE, $user);


        $manager->flush();

} 
}
