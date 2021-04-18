<?php

namespace App\Repository;

use App\Entity\SpecialitySear;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecialitySear|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialitySear|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialitySear[]    findAll()
 * @method SpecialitySear[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialitySearRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialitySear::class);
    }

    // /**
    //  * @return SpecialitySear[] Returns an array of SpecialitySear objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpecialitySear
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
