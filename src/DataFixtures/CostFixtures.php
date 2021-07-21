<?php

namespace App\DataFixtures;

use App\Entity\Cost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CostFixtures extends Fixture
{
    public const COSTS = [
        'Bon marché'    => 'low',
        'Moyen chère'   => 'middle',
        'Chère'         => 'high',
        'Coute un bras' => 'very_high',

    ];


    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach(self::COSTS as $name => $identifier) {
            $cost = new Cost();
            $cost->setIdentifier($identifier);
            $cost->setName($name);
            $manager->persist($cost);
            $this->addReference('cost_' . $i, $cost);
            $i++;
        }

        $manager->flush();
    }
}
