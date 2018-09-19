<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category.{name}", name="category")
     * @Template("category/index.html.twig")
     */
    public function index(string $name, CategoryRepository $qbC, Request $request)
    {
        $pager = $qbC->getPager(3, $name, $request);

        return ['games' => $pager,
            'category' => $qbC->findOneByName($name),
            'pager' => $pager
        ];
    }
}
