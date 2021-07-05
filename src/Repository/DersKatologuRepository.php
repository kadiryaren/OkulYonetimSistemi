<?php

namespace App\Repository;

use App\Entity\DersKatologu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DersKatologu|null find($id, $lockMode = null, $lockVersion = null)
 * @method DersKatologu|null findOneBy(array $criteria, array $orderBy = null)
 * @method DersKatologu[]    findAll()
 * @method DersKatologu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DersKatologuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DersKatologu::class);
    }

    // /**
    //  * @return DersKatologu[] Returns an array of DersKatologu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DersKatologu
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
