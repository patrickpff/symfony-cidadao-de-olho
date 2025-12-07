<?php

namespace App\Repository;

use App\Entity\TagLocalizacao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TagLocalizacao|null find($id, $lockMode = null, $lockVersion = null)
 * @method TagLocalizacao|null findOneBy(array $criteria, array $orderBy = null)
 * @method TagLocalizacao[]    findAll()
 * @method TagLocalizacao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TagLocalizacaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TagLocalizacao::class);
    }

    // /**
    //  * @return TagLocalizacao[] Returns an array of TagLocalizacao objects
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
    public function findOneBySomeField($value): ?TagLocalizacao
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
