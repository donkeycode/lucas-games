<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Games;
use App\Repository\GamesRepository;
use App\Form\GamesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     * @Template("form/form.html.twig")
     */
    public function index(Request $request)
    {
        $game = new Games;
        $game->setDatepost(new \DateTime());

        $form = $this->createForm(GamesType::class, $game);

        if ($this->accepteForm($request, $form, $game)) {

            return $this->redirectToRoute('home');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/game/edit/{id}")
     * @Template("form/form.html.twig")
     */
    public function update(GamesRepository $qb, int $id, Request $request)
    {
        $game = $qb->find($id);

        $form = $this->createForm(GamesType::class, $game);

        if (!$game) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        if ($this->accepteForm($request, $form, $game)) {

            return $this->redirectToRoute('home');
        }

        return ['form' => $form->createView()];
    }

    public function accepteForm(Request $request, $form, $game)
    {
      if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
           $em = $this->getDoctrine()->getManager();
           $em->persist($game);
           $em->flush();

          return true;
      }

      return false;
    }
}
