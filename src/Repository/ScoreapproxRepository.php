<?php

namespace App\Repository;

use App\Entity\Scoreapprox;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Scoreapprox|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scoreapprox|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scoreapprox[]    findAll()
 * @method Scoreapprox[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoreapproxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scoreapprox::class);
    }

    // /**
    //  * @return Scoreapprox[] Returns an array of Scoreapprox objects
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
    public function findOneBySomeField($value): ?Scoreapprox
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
