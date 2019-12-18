<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        $query = $this->createQueryBuilder('users');
        $query
            ->select(
                'users.id',
                'users.name',
                'users.lastname',
                'users.location',
                'users.email',
                'users.github_username',
                'users.short_description',
                'users.username'
            );

        return $query->getQuery()->getArrayResult();
    }

    public function getUsersData(string $username)
    {
        $qb = $this->createQueryBuilder('p')
            ->select('p.id,
            p.name, p.lastname, p.location, p.email, p.github_username, p.short_description, p.username')
            ->leftJoin('p.team', 'team')
            ->where('p.username = :user')
            ->setParameter('user', $username);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function getUsersId(string $username)
    {
        $qb = $this->createQueryBuilder('p')
            ->select('team.id')
            ->leftJoin('p.team', 'team')
            ->where('p.username = :user')
            ->setParameter('user', $username);

        $query = $qb->getQuery();

        return $query->execute();
    }

    public function getUserById($id)
    {
        $query = $this->createQueryBuilder('users');
        $query
            ->select(
                'users.id',
                'users.name',
                'users.lastname',
                'users.location',
                'users.email',
                'users.github_username',
                'users.short_description',
                'users.username'
            )
            ->leftJoin('users.team', 'team')
            ->where('users.id = :identifier')
            ->setParameter('identifier', $id);

        return $query->getQuery()->getArrayResult();
    }

    public function getTeamIdOfUser($id)
    {
        $query = $this->createQueryBuilder('users');
        $query
            ->select(
                'team.id'
            )
            ->leftJoin('users.team', 'team')
            ->where('users.id = :identifier')
            ->setParameter('identifier', $id);

        return $query->getQuery()->getArrayResult();
    }

    // /**
    //  * @return User[] Returns an array of User objects
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
    public function findOneBySomeField($value): ?User
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
