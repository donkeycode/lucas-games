<?php
//src/App/Entity/game.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\gamesRepository")
 */
class games
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  /**
   * @ORM\Column(name="game", type="string", length=255)
   */

  protected $game;

  /**
   * @ORM\Column(name="comment", type="text")
   */
  protected $comment;

  /**
   * @ORM\Column(name="date", type="date")
   */
  protected $date;

  /**
   * @ORM\Column(name="author", type="string", length=255)
   */
  protected $author;

  public function __construct()
  {
    $this->date = new \Datetime();
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function GetId()
  {
    return $this->id;
  }

  public function setGame($game)
  {
    $this->game = $game;
  }

  public function GetGame()
  {
    return $this->game;
  }

  public function setComment($comment)
  {
    $this->comment = $comment;
  }

  public function GetComment()
  {
    return $this->comment;
  }
  public function setDate($date)
  {
    $this->date = $date;
  }

  public function GetDate()
  {
    return $this->date;
  }
  public function setAuthor($author)
  {
    $this->author = $author;
  }

  public function GetAuthor()
  {
    return $this->author;
  }
}

?>
