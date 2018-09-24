<?php

namespace App\Repository;

use App\Entity\Games;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Symfony\Component\HttpFoundation\Request;
use Pagerfanta\Adapter\ArrayAdapter;

/**
 * @method Games|null find($id, $lockMode = null, $lockVersion = null)
 * @method Games|null findOneBy(array $criteria, array $orderBy = null)
 * @method Games[]    findAll()
 * @method Games[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GamesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Games::class);
    }

    public function getAdvertPager(int $nbMax, Request $request, string $author)
    {
      $pagerfanta = new Pagerfanta(new ArrayAdapter($this
          ->findBy(['author' => $author],
              ['datepost' => 'DESC'])
      ));

      $pagerfanta
          ->setMaxPerPage($nbMax)
          ->setCurrentPage($request->get('page', 1))
          ->getNbPages();

      return $pagerfanta;
    }

    public function getPager(int $nbMax, Request $request)
    {
        $pagerfanta = new Pagerfanta(new DoctrineORMAdapter($this
            ->createQueryBuilder('g')
            ->orderBy('g.datepost', 'DESC')
          ));

        $pagerfanta
            ->setMaxPerPage($nbMax)
            ->setCurrentPage($request->get('page', 1))
            ->getCurrentPageResults();

        return $pagerfanta;
    }
}
