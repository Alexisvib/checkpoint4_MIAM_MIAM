<?php

namespace App\DataFixtures;

use App\Entity\Ingredient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class IngredientFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_1'));
        $ingredient->setQuantity(6);
        $manager->persist($ingredient);
        $this->addReference('ingredient_0', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_0'));
        $ingredient->setQuantity(4);
        $manager->persist($ingredient);
        $this->addReference('ingredient_1', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_12'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_2', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_11'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_3', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_2'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_4', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_3'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_5', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_7'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_6', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_4'));
        $ingredient->setQuantity(400);
        $manager->persist($ingredient);
        $this->addReference('ingredient_7', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_5'));
        $ingredient->setQuantity(200);
        $manager->persist($ingredient);
        $this->addReference('ingredient_8', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_8'));
        $ingredient->setQuantity(4);
        $manager->persist($ingredient);
        $this->addReference('ingredient_9', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_7'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_10', $ingredient);


        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_13'));
        $ingredient->setQuantity(150);
        $manager->persist($ingredient);
        $this->addReference('ingredient_11', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_14'));
        $ingredient->setQuantity(150);
        $manager->persist($ingredient);
        $this->addReference('ingredient_12', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_1'));
        $ingredient->setQuantity(1);
        $manager->persist($ingredient);
        $this->addReference('ingredient_13', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_11'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_14', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_16'));
        $ingredient->setQuantity(6);
        $manager->persist($ingredient);
        $this->addReference('ingredient_15', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_15'));
        $ingredient->setQuantity(200);
        $manager->persist($ingredient);
        $this->addReference('ingredient_16', $ingredient);


        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_1'));
        $ingredient->setQuantity(200);
        $manager->persist($ingredient);
        $this->addReference('ingredient_17', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_11'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_18', $ingredient);

        $ingredient = new Ingredient();
        $ingredient->setAliment($this->getReference('aliment_17'));
        $manager->persist($ingredient);
        $this->addReference('ingredient_19', $ingredient);



        $manager->flush();
    }

    public function getDependencies()
    {
        return [
          AlimentFixtures::class,
        ];
    }
}
