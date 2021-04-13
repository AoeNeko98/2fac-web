<?php

namespace App\Repository;

use App\Entity\Book1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Book1|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book1|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book1[]    findAll()
 * @method Book1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class Book1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book1::class);
    }

    // /**
    //  * @return Book1[] Returns an array of Book1 objects
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
    public function findOneBySomeField($value): ?Book1
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
