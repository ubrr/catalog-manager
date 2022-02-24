<?php

namespace App\Repository;

use App\Entity\Citiesofinfluence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Citiesofinfluence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Citiesofinfluence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Citiesofinfluence[]    findAll()
 * @method Citiesofinfluence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CitiesofinfluenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Citiesofinfluence::class);
    }

    // /**
    //  * @return Citiesofinfluence[] Returns an array of Citiesofinfluence objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Citiesofinfluence
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
