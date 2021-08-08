<?php

namespace App\Repository;

use App\Entity\TeachingUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TeachingUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeachingUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeachingUnit[]    findAll()
 * @method TeachingUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeachingUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeachingUnit::class);
    }

    // /**
    //  * @return TeachingUnit[] Returns an array of TeachingUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TeachingUnit
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
