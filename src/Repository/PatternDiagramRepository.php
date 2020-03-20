<?php

namespace App\Repository;

use App\Entity\PatternDiagram;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PatternDiagram|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatternDiagram|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatternDiagram[]    findAll()
 * @method PatternDiagram[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatternDiagramRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatternDiagram::class);
    }

    // /**
    //  * @return PatternDiagram[] Returns an array of PatternDiagram objects
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
    public function findOneBySomeField($value): ?PatternDiagram
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
