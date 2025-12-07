<?php

namespace App\Repository;

use App\Entity\VerbasIndenizatorias;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VerbasIndenizatorias|null find($id, $lockMode = null, $lockVersion = null)
 * @method VerbasIndenizatorias|null findOneBy(array $criteria, array $orderBy = null)
 * @method VerbasIndenizatorias[]    findAll()
 * @method VerbasIndenizatorias[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerbasIndenizatoriasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VerbasIndenizatorias::class);
    }

    // /**
    //  * @return VerbasIndenizatorias[] Returns an array of VerbasIndenizatorias objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VerbasIndenizatorias
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
