<?php

namespace App\Repository;

use App\Entity\Incidence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Incidence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Incidence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Incidence[]    findAll()
 * @method Incidence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IncidenceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Incidence::class);
    }

//    /**
//     * @return Incidence[] Returns an array of Incidence objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Incidence
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
