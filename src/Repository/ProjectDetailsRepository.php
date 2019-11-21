<?php

namespace App\Repository;

use App\Entity\ProjectDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProjectDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectDetails[]    findAll()
 * @method ProjectDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProjectDetails::class);
    }

    // /**
    //  * @return ProjectDetails[] Returns an array of ProjectDetails objects
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
    public function findOneBySomeField($value): ?ProjectDetails
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
