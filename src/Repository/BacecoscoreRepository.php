<?php

namespace App\Repository;

use App\Entity\Bacecoscore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bacecoscore|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bacecoscore|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bacecoscore[]    findAll()
 * @method Bacecoscore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BacecoscoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bacecoscore::class);
    }

    // /**
    //  * @return Bacecoscore[] Returns an array of Bacecoscore objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bacecoscore
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
