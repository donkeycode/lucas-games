<?php

namespace App\Controller;

use App\Entity\Comments;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GamesRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CommentsType;
use App\Service\CheckForm;

class CommentsController extends AbstractController
{
    /**
     * @Route("/comments/{title}", name="view")
     * @Template("comments/commentspage.html.twig")
     */
    public function index(CheckForm $check, GamesRepository $gmr, string $title, Request $request)
    {
        $game = $gmr->findOneByTitle($title);
        $comments = $game->getComments();

        if ($user = $this->getUser()) {
            $comment = new Comments;

            $form = $this->createForm(CommentsType::class, $comment
                ->setAuthor($user->getPseudo())
            );

            $check->accepteComment($request, $form, $game, $comment);

            return ['game' => $game,
                'comments' => $comments,
                'form' => $form->createView()
            ];
        }
        else {

            return ['game' => $game,
                'comments' => $comments
            ];
        }
    }
}
