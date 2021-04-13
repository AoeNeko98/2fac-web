<?php

namespace App\Repository;

use App\Entity\Bactechscore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bactechscore|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bactechscore|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bactechscore[]    findAll()
 * @method Bactechscore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class bactechscoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bactechscore::class);
    }

    // /**
    //  * @return Bactechscore[] Returns an array of Bactechscore objects
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
    public function findOneBySomeField($value): ?Bactechscore
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
