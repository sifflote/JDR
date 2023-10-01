<?php

namespace App\Repository\Banque;

use App\Entity\Banque\Intitule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Intitule>
 *
 * @method Intitule|null find($id, $lockMode = null, $lockVersion = null)
 * @method Intitule|null findOneBy(array $criteria, array $orderBy = null)
 * @method Intitule[]    findAll()
 * @method Intitule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IntituleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Intitule::class);
    }

//    /**
//     * @return Intitule[] Returns an array of Intitule objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Intitule
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
