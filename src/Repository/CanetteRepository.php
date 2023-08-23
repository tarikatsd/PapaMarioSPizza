<?php

namespace App\Repository;

use App\Entity\Canette;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Canette>
 *
 * @method Canette|null find($id, $lockMode = null, $lockVersion = null)
 * @method Canette|null findOneBy(array $criteria, array $orderBy = null)
 * @method Canette[]    findAll()
 * @method Canette[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CanetteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Canette::class);
    }

//    /**
//     * @return Canette[] Returns an array of Canette objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Canette
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
