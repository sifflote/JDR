<?php

namespace App\Repository\DH;

use App\Entity\DH\DhMondeNatal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DhMondeNatal|null find($id, $lockMode = null, $lockVersion = null)
 * @method DhMondeNatal|null findOneBy(array $criteria, array $orderBy = null)
 * @method DhMondeNatal[]    findAll()
 * @method DhMondeNatal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DhMondeNatalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DhMondeNatal::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DhMondeNatal $entity, bool $flush = true): void
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
    public function remove(DhMondeNatal $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DhMondeNatal[] Returns an array of DhMondeNatal objects
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
    public function findOneBySomeField($value): ?DhMondeNatal
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
