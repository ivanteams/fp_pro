<?php

namespace App\Repository;

use App\Entity\Docentes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Docentes>
 *
 * @method Docentes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Docentes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Docentes[]    findAll()
 * @method Docentes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocentesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Docentes::class);
    }

//    /**
//     * @return Docentes[] Returns an array of Docentes objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Docentes
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
