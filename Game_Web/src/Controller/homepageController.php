<?php
//src/Controller/homepageController.php
namespace App\Controller;

use App\Entity\games;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class homepageController extends Controller
{
  /**
   * @Route("/{page}", name="homepage",
   * requirements={"page"="\d+"})
   */
   public function viewAction($page = 1)
   {
     $pos = ($page * 3) - 3;
     $game = $this->getDoctrine()
          ->getRepository(games::class)
          ->findBy(
            array(),
            array('date' => 'desc'),
            3,
            $pos
          );

     if (!$game) {
        throw $this->createNotFoundException(
          'No product found for id '.$id);
      }
      return $this->render('home_page.html.twig', array(
        'game' => $game,
        'next' => $page + 1,
        'back' => $page - 1,
        'pos' => $pos)
      );
    }
}
/*   public function addAction(Request $request)
   {
     $toadd = new games();
     $toadd->setGame("Uncharted");
     $toadd->setComment("On continue");
     $toadd->setAuthor("Max");

     $em = $this->getDoctrine()->getManager();

     $em->persist($toadd);

     $em->flush();*/

//     if ($request->isMethod('POST')) {
//       $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');
//       return $this->redirectToRoute('oc_platform_view', array('id' => $advert->getId()));
//     }
//     return $this->render('OCPlatformBundle:Advert:add.html.twig', array('advert' => $advert));
//      return $this->render("home_page.html.twig");
//   }
//  }
//}

?>
