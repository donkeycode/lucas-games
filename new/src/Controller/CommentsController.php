<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Entity\Games;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\GamesRepository;
use App\Repository\CommentsRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CommentsType;

class CommentsController extends AbstractController
{
    /**
     * @Route("/comments/{id}", name="view")
     * @Template("comments/commentspage.html.twig")
     */
    public function index(GamesRepository $gmr, int $id, Request $request)
    {
        $comment = new Comments;

        $form = $this->createForm(CommentsType::class, $comment);

        $game = $gmr->find($id);
        $comments = $game->getComments();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $game->addComment($comment);
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->persist($game);
            $em->flush();
        }

        return ['game' => $game,
            'comments' => $comments,
            'form' => $form->createView()
        ];
    }
}
