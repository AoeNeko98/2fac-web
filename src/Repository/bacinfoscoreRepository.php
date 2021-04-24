<?php

namespace App\Repository;

use App\Entity\Bacinfoscore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bacinfoscore|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bacinfoscore|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bacinfoscore[]    findAll()
 * @method Bacinfoscore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class bacinfoscoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bacinfoscore::class);
    }

    // /**
    //  * @return Bacinfoscore[] Returns an array of Bacinfoscore objects
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
    public function findOneBySomeField($value): ?Bacinfoscore
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
