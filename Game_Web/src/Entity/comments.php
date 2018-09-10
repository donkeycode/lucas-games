<?php
//src/App/Entity/game.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\commentsRepository")
 */
class comments
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getIt()
  {
    return $this->id;
  }

  /**
   * @ORM\Column(name="comment", type="text")
   */
  protected $comments;

  public function setComment($comment)
  {
    $this->comment = $comment;
  }

  public function GetComment()
  {
    return $this->comment;
  }

  /**
   * @ORM\Column(name="game", type="string", length=255)
   */
  protected $game;

  public function setGame($game)
  {
    $this->game = $game;
  }

  public function GetGame()
  {
    return $this->game;
  }
}

?>
