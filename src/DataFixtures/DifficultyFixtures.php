<?php

namespace App\DataFixtures;

use App\Entity\Difficulty;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DifficultyFixtures extends Fixture
{
    public const DIFFICULTIES = [
        'Super Facile'      => 'super_easy',
        'Facile'            => 'easy',
        'Moyenne'           => 'middle',
        'Difficile'         => 'hard',
        'Très Difficile'    => 'super_hard',
    ];


    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach(self::DIFFICULTIES as $name => $identifier) {
            $difficulty = new Difficulty();
            $difficulty->setIdentifier($identifier);
            $difficulty->setName($name);
            $manager->persist($difficulty);
            $this->addReference('difficulty_' . $i, $difficulty);
            $i++;
        }

        $manager->flush();
    }
}
