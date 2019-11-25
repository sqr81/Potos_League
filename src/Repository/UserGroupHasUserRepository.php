<?php

namespace App\Repository;

use App\Entity\UserGroupHasUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserGroupHasUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserGroupHasUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserGroupHasUser[]    findAll()
 * @method UserGroupHasUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserGroupHasUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserGroupHasUser::class);
    }

    // /**
    //  * @return UserGroupHasUser[] Returns an array of UserGroupHasUser objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserGroupHasUser
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
