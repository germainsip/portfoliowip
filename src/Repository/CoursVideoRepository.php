<?php

namespace App\Repository;

use App\Entity\CoursVideo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoursVideo|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoursVideo|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoursVideo[]    findAll()
 * @method CoursVideo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursVideoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoursVideo::class);
    }

    // /**
    //  * @return CoursVideo[] Returns an array of CoursVideo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CoursVideo
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
