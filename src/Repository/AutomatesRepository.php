<?php

namespace App\Repository;

use App\Entity\Automates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Automates|null find($id, $lockMode = null, $lockVersion = null)
 * @method Automates|null findOneBy(array $criteria, array $orderBy = null)
 * @method Automates[]    findAll()
 * @method Automates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutomatesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Automates::class);
    }

//    /**
//     * @return Automates[] Returns an array of Automates objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Automates
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
