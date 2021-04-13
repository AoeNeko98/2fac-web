<?php

namespace App\Repository;

use App\Entity\Bacletscore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bacletscore|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bacletscore|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bacletscore[]    findAll()
 * @method Bacletscore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class bacletscoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bacletscore::class);
    }

    // /**
    //  * @return Bacletscore[] Returns an array of Bacletscore objects
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
    public function findOneBySomeField($value): ?Bacletscore
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
