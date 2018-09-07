<?php

//src/App/Repository/gamesRepository.php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class gamesRepository extends EntityRepository
{
  public function findAllComments()
   {

     return $this ->createQueryBuilder('a')
     ->getQuery()
     ->getResult() ;
   }
}

 ?>
