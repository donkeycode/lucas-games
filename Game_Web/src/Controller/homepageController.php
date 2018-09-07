<?php
//src/Controller/homepage_controller.php
namespace App\Controller;

use App\Entity\games;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class homepageController extends Controller
{
  /**
   * @Route("/add", name="add")
   */
   public function addAction(Request $request)
   {
     $toadd = new games();
     $toadd->setTitle("Uncharted");
     $toadd->setComment("On continue");
     $toadd->setAuthor("Max");

     $em = $this->getDoctrine()->getManager();

     $em->persist($toadd);

     $em->flush();

//     if ($request->isMethod('POST')) {
//       $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
//       return $this->redirectToRoute('oc_platform_view', array('id' => $advert->getId()));
//     }
//     return $this->render('OCPlatformBundle:Advert:add.html.twig', array('advert' => $advert));
      return $this->render("home_page.html.twig");
   }
}

?>
