<?php

namespace App\Repository;

use App\Entity\StudentTemporary;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StudentTemporary|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentTemporary|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentTemporary[]    findAll()
 * @method StudentTemporary[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentTemporaryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentTemporary::class);
    }

    // /**
    //  * @return StudentTemporary[] Returns an array of StudentTemporary objects
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
    public function findOneBySomeField($value): ?StudentTemporary
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
