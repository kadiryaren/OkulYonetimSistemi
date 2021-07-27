<?php

namespace App\Repository;

use App\Entity\OgretmenDetay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OgretmenDetay|null find($id, $lockMode = null, $lockVersion = null)
 * @method OgretmenDetay|null findOneBy(array $criteria, array $orderBy = null)
 * @method OgretmenDetay[]    findAll()
 * @method OgretmenDetay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OgretmenDetayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OgretmenDetay::class);
    }

    // /**
    //  * @return OgretmenDetay[] Returns an array of OgretmenDetay objects
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
    public function findOneBySomeField($value): ?OgretmenDetay
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
