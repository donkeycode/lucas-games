<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Games;
use App\Repository\GamesRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Pagerfanta;
use App\Repository\ImageRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     * @Template("home/homepage.html.twig")
     */
    public function index(GamesRepository $qb, Request $request)
    {
        $pagerfanta = $qb->getPager();
        $entities = $pagerfanta
            ->setMaxPerPage(3)
            ->setCurrentPage($request->get('page', 1))
            ->getCurrentPageResults();

        return ['entities' => $entities, 'pager' => $pagerfanta];
    }
}
