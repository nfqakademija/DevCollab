<?php

namespace App\Repository;

use App\Entity\TeamPoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TeamPoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamPoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamPoints[]    findAll()
 * @method TeamPoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamPointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeamPoints::class);
    }

    // /**
    //  * @return TeamPoints[] Returns an array of TeamPoints objects
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
    public function findOneBySomeField($value): ?TeamPoints
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
