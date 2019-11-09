<?php

namespace App\Repository;

use App\Entity\Teampoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Teampoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method Teampoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method Teampoints[]    findAll()
 * @method Teampoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeampointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Teampoints::class);
    }

    // /**
    //  * @return Teampoints[] Returns an array of Teampoints objects
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
    public function findOneBySomeField($value): ?Teampoints
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
