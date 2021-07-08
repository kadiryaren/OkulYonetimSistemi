<?php

namespace App\Repository;

use App\Entity\OgrenciDetay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OgrenciDetay|null find($id, $lockMode = null, $lockVersion = null)
 * @method OgrenciDetay|null findOneBy(array $criteria, array $orderBy = null)
 * @method OgrenciDetay[]    findAll()
 * @method OgrenciDetay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OgrenciDetayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OgrenciDetay::class);
    }

  

    // /**
    //  * @return OgrenciDetay[] Returns an array of OgrenciDetay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OgrenciDetay
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
