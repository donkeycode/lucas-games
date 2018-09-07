<?php
//src/Controller/homepage_controller.php
namespace App\Controller;

use App\Entity\games;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class homepageController extends Controller
{
  private $id = 1;
  /**
   * @Route("/", name="homepage")
   */
   public function show()
   {
    $product = $this->getDoctrine()
        ->getRepository(games::class)
        ->find($this->id);

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }

    return new Response('Check out this great product: '.$product->getGame());

    // or render a template
    // in the template, print things with {{ product.name }}
    // return $this->render('product/show.html.twig', ['product' => $product]);
}
//     $repository = $this->getDoctrine()->getManager()->getRepository('App:games');
//     $tofind = $repository->find($this->id);
//
//     if ($tofind === null) {
//       throw new NotFoundHttpException("L'annonce d'id ".$id." n'existe pas.");
//     }
//     return $this->render('comments.html.twig', array('game' => $tofind->getTitle()));
   }
/*   public function addAction(Request $request)
   {
     $toadd = new games();
     $toadd->setTitle("Uncharted");
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
