<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\ORM\EntityManager;

class CheckForm
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function accepteAdvert(Request $request, $form, $game)
    {
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->em->persist($game);
            $this->em->flush();

            return true;
        }

        return false;
    }

    public function accepteComment(Request $request, $form, $game, $comment)
    {
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $game->addComment($comment);
            $this->em->persist($comment);
            $this->em->persist($game);
            $this->em->flush();
        }

        return ;
    }

    public function accepteUser(Request $request, UserPasswordEncoderInterface $passwordEncoder, $form, $user)
    {
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setIsActive(true);
            //$user->addRole("ROLE_ADMIN");
            $this->em->persist($user);
            $this->em->flush();

            return true;
        }

        return false;
    }
}
