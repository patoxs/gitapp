<?php

namespace App\Repository;

use App\Entity\Merge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Merge|null find($id, $lockMode = null, $lockVersion = null)
 * @method Merge|null findOneBy(array $criteria, array $orderBy = null)
 * @method Merge[]    findAll()
 * @method Merge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MergeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Merge::class);
    }

//    /**
//     * @return Merge[] Returns an array of Merge objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Merge
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
