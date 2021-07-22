<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public const CATEGORIES = [
        'Frais'             => 'fresh',
        'Fruits & Légumes'  => 'fruit_vegetable',
        'Viande'            => 'meat',
        'Poisson'           => 'fish',
        'Patisserie'        => 'pastry',
        'Epicerie'          => 'grocery',
        'Boisson'           => 'drink'
    ];


    public function load(ObjectManager $manager)
    {
        $i = 0;
        foreach(self::CATEGORIES as $name => $identifier) {
            $category = new Category();
            $category->setName($name);
            $category->setIdentifier($identifier);
            $manager->persist($category);
            $this->addReference('category_' . $i, $category);
            $i++;
        }

        $manager->flush();
    }
}
