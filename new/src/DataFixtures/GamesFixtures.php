<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\games;

class GamesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach (["game1", "game2", "game3", "game4", "game5"] as $title) {
            $game = new games();
            $game->setTitle($title);
            $game->setDatepost(new \DateTime());
            $game->setDescription("Blablablablablabla");
            $manager->persist($game);
        }

        $manager->flush();
    }
}
