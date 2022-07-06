<?php

namespace App\Repository\DH;

use App\Entity\DH\DhPersonnage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DhPersonnage|null find($id, $lockMode = null, $lockVersion = null)
 * @method DhPersonnage|null findOneBy(array $criteria, array $orderBy = null)
 * @method DhPersonnage[]    findAll()
 * @method DhPersonnage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DhPersonnageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DhPersonnage::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DhPersonnage $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(DhPersonnage $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DhPersonnage[] Returns an array of DhPersonnage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DhPersonnage
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
