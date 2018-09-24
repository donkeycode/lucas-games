<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\GamesRepository;
use App\Service\CheckForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class EditController extends AbstractController
{
    /**
     * @Route("/edit/{id}", name="edit")
     * @Template("form/form.html.twig")
     */
    public function update(GamesRepository $qb, int $id, Request $request, CheckForm $check)
    {
        $game = $qb->find($id);

        $form = $this->createForm(GamesType::class, $game);

        if ($check->accepteForm($request, $form, $game)) {

            return $this->redirectToRoute('home');
        }

        return ['form' => $form->createView()];
    }
}
