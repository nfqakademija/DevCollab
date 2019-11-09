<?php

namespace App\Repository;

use App\Entity\Teamtasks;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Teamtasks|null find($id, $lockMode = null, $lockVersion = null)
 * @method Teamtasks|null findOneBy(array $criteria, array $orderBy = null)
 * @method Teamtasks[]    findAll()
 * @method Teamtasks[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamtasksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Teamtasks::class);
    }

    // /**
    //  * @return Teamtasks[] Returns an array of Teamtasks objects
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
    public function findOneBySomeField($value): ?Teamtasks
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
