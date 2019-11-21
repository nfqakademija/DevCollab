<?php

namespace App\Repository;

use App\Entity\Sprints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Sprints|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sprints|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sprints[]    findAll()
 * @method Sprints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SprintsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sprints::class);
    }

    // /**
    //  * @return Sprints[] Returns an array of Sprints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sprints
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
