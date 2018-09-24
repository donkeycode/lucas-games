<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GamesRepository;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AdvertController extends AbstractController
{
    /**
     * @Route("/advert", name="advert")
     * @Template=("advert/index.html.twig")
     */
    public function index(GamesRepository $qb, Request $request)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if ($user = $this->getUser()) {
            $pager = $qb->getAdvertPager(3, $request, $user->getPseudo());
        }

        return ['entities' => $pager,
            'pager' => $pager,
        ];
    }
}
