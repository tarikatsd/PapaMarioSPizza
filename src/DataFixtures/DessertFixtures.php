<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use App\Entity\Dessert;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class DessertFixtures extends Fixture
{
    public const TIRAMISU_FRAISE_DESSERT_REFERENCE = 'tiramisu-fraise';
    public const TIRAMISU_CHOCOLAT_DESSERT_REFERENCE = 'tiramisu-chocolat';
    public const TIRAMISU_CARAMEL_DESSERT_REFERENCE = 'tiramisu-caramel';
    public const TARTE_AUX_DAIMS_DESSERT_REFERENCE = 'tarte-aux-daims';
    public const TARTE_AUX_POMMES_DESSERT_REFERENCE = 'tarte-aux-pommes';
    public const TARTE_AU_CITRON_DESSERT_REFERENCE = 'tarte-au-citron';
    public const BROWNIE_DESSERT_REFERENCE = 'brownie';
    public const MUFFIN_NATURE_DESSERT_REFERENCE = 'muffin-nature';
    public const MUFFIN_CHOCOLAT_DESSERT_REFERENCE = 'muffin-chocolat';
    public const PANA_COTTA_DESSERT_REFERENCE = 'pana-cotta';
    public const SALADE_DE_FRUITS_DESSERT_REFERENCE = 'salade-de-fruits';
    public const FONDANT_AU_CHOCOLAT_DESSERT_REFERENCE = 'fondant-au-chocolat';
    public const MOUSSE_AU_CHOCOLAT_DESSERT_REFERENCE = 'mousse-au-chocolat';
    public const FLAN_DESSERT_REFERENCE = 'flan';




    public function load(ObjectManager $manager): void
    {
        $dessert = new Dessert();
        $dessert->setNom('Tiramisu-fraise');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('tiramisu-fraise.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('tiramisu-fraise');
        $manager->persist($dessert);
        $this->addReference(self::TIRAMISU_FRAISE_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tiramisu-chocolat');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('tiramisu-chocolat.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('tiramisu-chocolat');
        $manager->persist($dessert);
        $this->addReference(self::TIRAMISU_CHOCOLAT_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tiramisu-caramel');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('tiramisu-caramel.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('tiramisu-caramel');
        $manager->persist($dessert);
        $this->addReference(self::TIRAMISU_CARAMEL_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux daims');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('tarte-aux-daims.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('tarte-aux-daims');
        $manager->persist($dessert);
        $this->addReference(self::TARTE_AUX_DAIMS_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte aux pommes');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('tarte-aux-pommes.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('tarte-aux-pommes');
        $manager->persist($dessert);
        $this->addReference(self::TARTE_AUX_POMMES_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Tarte au citron');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('tarte-au-citron.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('tarte-au-citron');
        $manager->persist($dessert);
        $this->addReference(self::TARTE_AU_CITRON_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Brownie');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('brownie.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('brownie');
        $manager->persist($dessert);
        $this->addReference(self::BROWNIE_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Muffin nature');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('muffin-nature.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('muffin-nature');
        $manager->persist($dessert);
        $this->addReference(self::MUFFIN_NATURE_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Muffin chocolat');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('muffin-chocolat.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('muffin-chocolat');
        $manager->persist($dessert);
        $this->addReference(self::MUFFIN_CHOCOLAT_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Pana cotta');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('pana-cotta.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('pana-cotta');
        $manager->persist($dessert);
        $this->addReference(self::PANA_COTTA_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Salade de fruits');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('salade-de-fruits.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('salade-de-fruits');
        $manager->persist($dessert);
        $this->addReference(self::SALADE_DE_FRUITS_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Fondant au chocolat');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('fondant-au-chocolat.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('fondant-au-chocolat');
        $manager->persist($dessert);
        $this->addReference(self::FONDANT_AU_CHOCOLAT_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Mousse au chocolat');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('mousse-au-chocolat.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('mousse-au-chocolat');
        $manager->persist($dessert);
        $this->addReference(self::MOUSSE_AU_CHOCOLAT_DESSERT_REFERENCE, $dessert);

        $dessert = new Dessert();
        $dessert->setNom('Flan ');
        $dessert->setPrix(3.50);
        $dessert->setIsActive(true);
        $dessert->setImageName('flan.png');
        $dessert->setUpdatedAt(new \DateTimeImmutable());
        $dessert->setSlug('flan');
        $manager->persist($dessert);
        $this->addReference(self::FLAN_DESSERT_REFERENCE, $dessert);
        




        $manager->flush();
    }
}
