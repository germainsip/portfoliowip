<?php

namespace App\Repository;

use App\Entity\Depo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Depo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Depo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Depo[]    findAll()
 * @method Depo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Depo::class);
    }

    // /**
    //  * @return Depo[] Returns an array of Depo objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Depo
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
