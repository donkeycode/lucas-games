<?php

namespace App\Controller;

use App\Entity\Comments;
use App\Entity\Games;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\GamesRepository;

class CommentsController extends AbstractController
{
    /**
     * @Route("/comments/{id}", name="comments")
     * @Template("comments/index.html.twig")
     */
    public function index(GamesRepository $qb, $id = 1)
    {
        $game = $qb->find($id);

        return ['game' => $game];
        // $comment = new Comments();
        // $comment->setComment('J\' ai vraiment aimé ce jeu');
        //
        // $game = new Games();
        // $game->setTitle('Hearthstone');
        // $game->setDatepost(new \DateTime);
        // $game->setDescription('Jeu de cartes');
        // $game->setAuthor('Lucas');
        // $game->setCategory('Aventure');
        //
        // $game->addComment($comment);
        //
        // $em = $this->getDoctrine()->getManager();
        // $em->persist($comment);
        // $em->persist($game);
        // $em->flush();
        //
        // return new Response(
        //     'Saved new product with id: '.$product->getId()
        //     .' and new category with id: '.$category->getId()
        // );
    }
}
