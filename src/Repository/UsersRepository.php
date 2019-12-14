<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        $query = $this->createQueryBuilder('users');
        $query
            ->select(
                'users'
            );

        return $query->getQuery()->getArrayResult();
    }

    public function getUserById($id)
    {
        $query = $this->createQueryBuilder('users');
        $query
            ->select(
                'users.id','users.name',
                'users.name','users.lastname','users.location','users.email',
                'users.githubUsername','users.shortDescription','users.username'
            )
            ->innerJoin('users.team','team')
            ->where('users.id = :identifier')
            ->setParameter('identifier', $id)
        ;

      //  dd($query->getQuery()->getSQL());
        return $query->getQuery()->getArrayResult();
    }

    // /**
    //  * @return Users[] Returns an array of Users objects
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
    public function findOneBySomeField($value): ?Users
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
