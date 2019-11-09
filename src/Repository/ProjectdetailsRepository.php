<?php

namespace App\Repository;

use App\Entity\Projectdetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Projectdetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method Projectdetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method Projectdetails[]    findAll()
 * @method Projectdetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectdetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Projectdetails::class);
    }

    // /**
    //  * @return Projectdetails[] Returns an array of Projectdetails objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Projectdetails
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
