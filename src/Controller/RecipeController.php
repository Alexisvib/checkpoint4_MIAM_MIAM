<?php

namespace App\Controller;


use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\Step;
use App\Form\RecipeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/recipe", name="recipe_")
 */
class RecipeController extends AbstractController
{
    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request, EntityManagerInterface $manager): Response
    {
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
//        dd($recipe->getSteps(), $recipe->getIngredients());
        if($form->isSubmitted() && $form->isValid()) {
            $number = 1;
            foreach ($recipe->getSteps() as $step) {
                $step->setRecipe($recipe);
                $step->setNumber($number);
                $step->setRecipe($recipe);
                $manager->persist($step);
                $number++;
            }


            foreach ($recipe->getIngredients() as $ingredient) {
                $ingredient->setRecipe($recipe);
                $manager->persist($ingredient);
            }

            $manager->persist($recipe);
            $manager->flush();
            $this->addFlash('success', 'recette ajoutée à l\'application');
        }
        return $this->render('recipe/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/show/{recipe}", name="show")
     */
    public function show(Recipe $recipe)
    {
        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe
        ]);
    }
}
