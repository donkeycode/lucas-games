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
        $pager = $qb->getPager(3, $request);

        return ['entities' => $pager, 'pager' => $pager];
    }
}
