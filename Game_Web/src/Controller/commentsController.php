<?php
//src/Controller/commentsController.php
namespace App\Controller;

//use App\Entity\games;
use App\Entity\comments;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class commentsController extends Controller
{
  /**
   * @Route("/comments/{gamename}", name="commentspage")
   */
   public function commentsAction($gamename)
   {
     return $this->render('comments.html.twig');
   }
}
