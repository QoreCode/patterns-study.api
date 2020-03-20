<?php

namespace App\Repository;

use App\Entity\PatternClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PatternClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatternClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatternClass[]    findAll()
 * @method PatternClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatternClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatternClass::class);
    }

    // /**
    //  * @return PatternClass[] Returns an array of PatternClass objects
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
    public function findOneBySomeField($value): ?PatternClass
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
