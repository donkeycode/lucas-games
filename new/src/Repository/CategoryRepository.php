<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Pagerfanta\Pagerfanta;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Adapter\DoctrineCollectionAdapter;

/**
 * @method Category|null find($id, $lockMode = null, $lockVersion = null)
 * @method Category|null findOneBy(array $criteria, array $orderBy = null)
 * @method Category[]    findAll()
 * @method Category[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function getPager(int $nbMax, string $name, Request $request)
    {
        $pagerfanta = new Pagerfanta(new DoctrineCollectionAdapter($this
            ->findOneByName($name)
            ->getGames()
          ));

        $pagerfanta
            ->setMaxPerPage($nbMax)
            ->setCurrentPage($request->get('page', 1))
            ->getNbPages();

        return $pagerfanta;
    }

    public function checkDate($a, $b)
    {
        if ($a->datepost > $b->datepost)
            return true;
        else {
            return false;
        }
    }
}
