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
class BookRepository extends ServiceEntityRepository
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



            public function findPrice(): array
            {
                $conn = $this->getEntityManager()->getConnection();

                $sql = 'SELECT MAX(prix) FROM book1';
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                // returns an array of arrays (i.e. a raw data set)
                return $stmt->fetchAllAssociative();
            }
            public function sortByCat(){

                return $this->createQueryBuilder('b')
                    ->orderBy('b.categorie','ASC')
                    ->getQuery()->getResult();
            }
    public function sortByType(){

        return $this->createQueryBuilder('b')
            ->orderBy('b.type','ASC')
            ->getQuery()->getResult();
    }
    public function sortByPrice(){

        return $this->createQueryBuilder('b')
            ->orderBy('b.prix','ASC')
            ->getQuery()->getResult();
    }
    public function sort($sort){

        return $this->createQueryBuilder('b')
            ->orderBy('b.'.$sort,'ASC')

            ->getQuery()->getResult();
    }
    public function findBookByName($name){
        $qb = $this->createQueryBuilder('b')
            ->select('b')
            ->where('b.nom LIKE :nom')
            ->setParameter('nom','%'.$name.'%')
            ->getQuery();
        return $qb;
    }

    public function filterBook($nom,$cate,$type,$prix,$sort){
        $qb = $this->createQueryBuilder('b')
            ->orderBy('b.'.$sort,'ASC')
            ->select('b')
            ->where('b.nom LIKE :nom')
            ->andWhere('b.categorie IN(:cate)')
            ->andWhere('b.type IN(:type)')
            ->andWhere('b.prix <= :prix')
            ->setParameter('type',$type)
            ->setParameter('cate',$cate)
            ->setParameter('nom','%'.$nom.'%')
            ->setParameter('prix', $prix)
            ->getQuery()->getResult();
        return $qb;
    }



}
