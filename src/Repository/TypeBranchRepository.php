<?php

namespace App\Repository;

use App\Entity\TypeBranch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeBranch|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBranch|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBranch[]    findAll()
 * @method TypeBranch[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBranchRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeBranch::class);
    }

//    /**
//     * @return TypeBranch[] Returns an array of TypeBranch objects
//     */
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
    public function findOneBySomeField($value): ?TypeBranch
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
