<?php

namespace App\DataFixtures;

use App\Entity\Recipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RecipeFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $recipe = new Recipe();
        $recipe->setIsActive(true);
        $recipe->setOwner($this->getReference(('user_1')));
        $recipe->setName('Lasagnes végétariennes');
        $recipe->setTime(80);
        $recipe->setDifficulty($this->getReference('difficulty_1'));
        $recipe->setCost($this->getReference('cost_0'));
        $recipe->setGuest(4);
        $recipe->setNamePicture('lasagne_vegetarienne.png');

        for($i=0; $i<11; $i++) {
            $recipe->addIngredient($this->getReference('ingredient_' . $i));
        }

        for($i=0; $i<6; $i++) {
            $recipe->addStep($this->getReference('step_' . $i));
        }

        $manager->persist($recipe);


        $recipe = new Recipe();
        $recipe->setIsActive(true);
        $recipe->setOwner($this->getReference(('user_1')));
        $recipe->setName('Steak Haricot Vert');
        $recipe->setTime(10);
        $recipe->setDifficulty($this->getReference('difficulty_0'));
        $recipe->setCost($this->getReference('cost_0'));
        $recipe->setGuest(1);
        $recipe->setNamePicture('steak_haricotvert.png');

        for($i=11; $i<14; $i++) {
            $recipe->addIngredient($this->getReference('ingredient_' . $i));
        }

        for($i=6; $i<8; $i++) {
            $recipe->addStep($this->getReference('step_' . $i));
        }

        $manager->persist($recipe);


        $recipe = new Recipe();
        $recipe->setIsActive(true);
        $recipe->setOwner($this->getReference(('user_1')));
        $recipe->setName('Mousse au chocolat');
        $recipe->setTime(20);
        $recipe->setDifficulty($this->getReference('difficulty_2'));
        $recipe->setCost($this->getReference('cost_0'));
        $recipe->setGuest(4);
        $recipe->setNamePicture('mousse_chocolat.png');

        for($i=14; $i<17; $i++) {
            $recipe->addIngredient($this->getReference('ingredient_' . $i));
        }

        for($i=8; $i<13; $i++) {
            $recipe->addStep($this->getReference('step_' . $i));
        }

        $manager->persist($recipe);


        $recipe = new Recipe();
        $recipe->setIsActive(true);
        $recipe->setOwner($this->getReference(('user_1')));
        $recipe->setName('Poisson en Papillote');
        $recipe->setTime(35);
        $recipe->setDifficulty($this->getReference('difficulty_1'));
        $recipe->setCost($this->getReference('cost_2'));
        $recipe->setGuest(2);
        $recipe->setNamePicture('papillote.png');

        for($i=17; $i<20; $i++) {
            $recipe->addIngredient($this->getReference('ingredient_' . $i));
        }

        for($i=13; $i<16; $i++) {
            $recipe->addStep($this->getReference('step_' . $i));
        }

        $manager->persist($recipe);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
            DifficultyFixtures::class,
            CostFixtures::class,
        ];
    }
}
