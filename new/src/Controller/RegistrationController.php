<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\UserType;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use App\Service\CheckForm;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     * @Template("registration/register.html.twig")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder, CheckForm $check)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user)->handleRequest($request);

        if ($check->accepteUser($request, $passwordEncoder, $form, $user)) {

            return $this->redirectToRoute('login');
        }

        return ['form' => $form->createView(),
            'mainNavRegistration' => true,
            'title' => 'Inscription'
        ];
    }
}
