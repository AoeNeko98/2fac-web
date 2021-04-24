<?php

namespace App\Entity;

use App\Entity\Bacscscore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bacscscore|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bacscscore|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bacscscore[]    findAll()
 * @method Bacscscore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class bacscscoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bacscscore::class);
    }

    // /**
    //  * @return Bacscscore[] Returns an array of Bacscscore objects
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
    public function findOneBySomeField($value): ?Bacscscore
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
