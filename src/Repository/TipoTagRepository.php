<?php

namespace App\Repository;

use App\Entity\TipoTag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TipoTag|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoTag|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoTag[]    findAll()
 * @method TipoTag[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoTagRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoTag::class);
    }

    // /**
    //  * @return TipoTag[] Returns an array of TipoTag objects
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
    public function findOneBySomeField($value): ?TipoTag
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
