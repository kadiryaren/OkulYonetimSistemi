<?php

namespace App\Repository;

use App\Entity\DersKatologu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
<<<<<<< HEAD
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
=======
>>>>>>> main

/**
 * @method DersKatologu|null find($id, $lockMode = null, $lockVersion = null)
 * @method DersKatologu|null findOneBy(array $criteria, array $orderBy = null)
 * @method DersKatologu[]    findAll()
 * @method DersKatologu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
<<<<<<< HEAD
class DersKatologuRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
=======
class DersKatologuRepository extends ServiceEntityRepository
>>>>>>> main
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DersKatologu::class);
    }

<<<<<<< HEAD
    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof DersKatologu) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

=======
>>>>>>> main
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
