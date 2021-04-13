<?php

namespace App\Repository;

use App\Entity\Bacsportscore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bacsportscore|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bacsportscore|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bacsportscore[]    findAll()
 * @method Bacsportscore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class bacsportscoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bacsportscore::class);
    }

    // /**
    //  * @return Bacsportscore[] Returns an array of Bacsportscore objects
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
    public function findOneBySomeField($value): ?Bacsportscore
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
