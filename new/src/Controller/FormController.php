<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Games;
use App\Form\GamesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Service\CheckForm;

class FormController extends AbstractController
{
    /**
     * @Route("/form", name="form")
     * @Template("form/form.html.twig")
     */
    public function addForm(Request $request, CheckForm $check)
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        if ($user = $this->getUser()) {
            $game = new Games;

            $form = $this->createForm(GamesType::class, $game
                ->setDatepost(new \DateTime())
                ->setAuthor($user->getPseudo())
            );

            if ($check->accepteAdvert($request, $form, $game)) {

                return $this->redirectToRoute('home');
            }
        }

        return ['form' => $form->createView()];
    }
}
