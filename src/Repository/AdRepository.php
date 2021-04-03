<?php

namespace App\Repository;

use App\Entity\Ad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ad|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ad|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ad[]    findAll()
 * @method Ad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ad::class);
    }


    public function myFindAll(){

            //"SELECT a FROM App\Entity\Ad a"
        $queryBuilder= $this->createQueryBuilder('a');

        $query = $queryBuilder->getQuery();


        $results = $query->getResult();


        return $results;

    }

// on récupére les annonces de prix <= à $price et avec un nbrs de chambres >= $rooms et ranger par ordre croissant
public function myFindAdPriceRooms($price,$rooms){

        $queryBuilder= $this->createQueryBuilder('a')
        ->where('a.price <= :price')
        ->setParameter('price',$price)
        ->andWhere('a.rooms >= :rooms')
        ->setParameter('rooms',$rooms)
        ->orderBy('a.price','ASC');

        $query = $queryBuilder->getQuery();


        $results = $query->getResult();


        return $results;


}


    // /**
    //  * @return Ad[] Returns an array of Ad objects
    //  */
    /*
    public function findByExampleField($value)
    {
        //"SELECT a FROM App\Entity\Ad a"
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ad
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
