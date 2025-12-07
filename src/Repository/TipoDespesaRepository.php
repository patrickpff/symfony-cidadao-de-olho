<?php

namespace App\Repository;

use App\Entity\TipoDespesa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TipoDespesa|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoDespesa|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoDespesa[]    findAll()
 * @method TipoDespesa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoDespesaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoDespesa::class);
    }

    // /**
    //  * @return TipoDespesa[] Returns an array of TipoDespesa objects
    //  */
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
    public function findOneBySomeField($value): ?TipoDespesa
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
