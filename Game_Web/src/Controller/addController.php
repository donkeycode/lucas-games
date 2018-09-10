<?php
//src/App/Controller/addController.php
namespace App\Controller;

use App\Form\gamesType;
use App\Entity\games;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class addController extends Controller
{
    /**
     * @Route("/add", name="addPage")
     */
     public function addAction(Request $request)
     {
       $game = new games;
       $form = $this->createForm(gamesType::class, $game);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($game);
            $em->flush();

            $request->getSession()->getFlashbag()->add('notice', 'Annonce bien enregistrée. =)');

            return $this->redirectToRoute('homepage');
        }
        return $this->render('add.html.twig', array('form' => $form->createView()));
     }
}




?>
