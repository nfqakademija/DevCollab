<?php

namespace App\Repository;

use App\Entity\Teams;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Teams|null find($id, $lockMode = null, $lockVersion = null)
 * @method Teams|null findOneBy(array $criteria, array $orderBy = null)
 * @method Teams[]    findAll()
 * @method Teams[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Teams::class);
    }

    /**
     * @return array
     */
    public function getTeams(): array
    {
        $query = $this->createQueryBuilder('teams');
        $query
            ->select(
                'teams'
            )
        ;

        return $query->getQuery()->getArrayResult();
    }

    /**
     * @return array
     */
    public function getUsersOfEachTeam(): array
    {
        $query = $this->createQueryBuilder('teams');
        $query
            ->select(
                'teams.id',
                'users.username'
            )
            ->leftJoin('teams.users', 'users')
        ;

        return $query->getQuery()->getArrayResult();
    }

    /**
     * @param int $id
     * @return array
     */

    public function getTeamById(int $id): array
    {
        $query = $this->createQueryBuilder('teams');
        $query
            ->select('teams')
            ->where($query->expr()->orX($query->expr()->eq('teams.id', $id)));

        return $query->getQuery()->getArrayResult();
    }

    // /**
    //  * @return Teams[] Returns an array of Teams objects
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
    public function findOneBySomeField($value): ?Teams
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
