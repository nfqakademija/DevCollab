<?php

namespace App\Repository;

use App\Entity\TeamTasks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TeamTasks|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamTasks|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamTasks[]    findAll()
 * @method TeamTasks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamTasksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeamTasks::class);
    }

    // /**
    //  * @return TeamTasks[] Returns an array of TeamTasks objects
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
    public function findOneBySomeField($value): ?TeamTasks
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
