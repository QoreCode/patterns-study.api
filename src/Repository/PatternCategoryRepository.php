<?php

namespace App\Repository;

use App\Entity\PatternCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PatternCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatternCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatternCategory[]    findAll()
 * @method PatternCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatternCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatternCategory::class);
    }

    // /**
    //  * @return PatternCategory[] Returns an array of PatternCategory objects
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
    public function findOneBySomeField($value): ?PatternCategory
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
