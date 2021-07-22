<?php

namespace App\DataFixtures;

use App\Entity\Aliment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AlimentFixtures extends Fixture implements DependentFixtureInterface
{

    public const FRESH = 'category_0';
    public const FRUITS_VEGETABLE = 'category_1';
    public const MEAT = 'category_2';
    public const FISH = 'category_3';
    public const PASTRY = 'category_4';
    public const GROCERY = 'category_5';
    public const DRINK = 'category_6';


    public const ALIMENTS = [
        'courgette'             => ['Courgette', self::FRUITS_VEGETABLE],
        'oignons'               => ['Oignons', self::FRUITS_VEGETABLE],
        'bouillon_vegetable'    => ['Bouillon de cube de légume', self::GROCERY],
        'cream_fresh'           => ['Crème fraiche', self::FRESH],
        'salt'                   => ['Sel', self::GROCERY],
        'pepper'                => ['Poivre', self::GROCERY],
    ];


    public function load(ObjectManager $manager)
    {
        $today = new \DateTime();

        $i = 0;
        foreach (self::ALIMENTS as $identifier => $contents) {
            $aliment = new Aliment();
            $aliment->setIdentifier($identifier);
            $aliment->setName($contents[0]);
            $aliment->setCategory($this->getReference($contents[1]));
            $aliment->setUpdatedAt($today);
            $aliment->setCreatedAt($today);
            $manager->persist($aliment);
            $this->addReference('aliment_' . $i, $aliment);
            $i++;
        }

        $manager->flush();


    }


    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
