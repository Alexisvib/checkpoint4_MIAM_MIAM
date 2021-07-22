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
 * @Route("/recette", name="recipe_")
 */
class RecipeController extends AbstractController
{
    /**
     * @Route("/ajout", name="add")
     */
    public function add(Request $request, EntityManagerInterface $manager): Response
    {
        $recipe = new Recipe();
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
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

            $recipe->setOwner($this->getUser());
            $recipe->setIsActive(true);
            $manager->persist($recipe);
            $manager->flush();
            $this->addFlash('success', 'recette ajoutée à l\'application');
            return $this->redirectToRoute('home');
        }
        return $this->render('recipe/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/editer/{recipe}", name="edit")
     */
    public function edit(Recipe $recipe, Request $request, EntityManagerInterface $manager): Response
    {
        $form = $this->createForm(RecipeType::class, $recipe);
        $form->handleRequest($request);
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

            $recipe->setOwner($this->getUser());
            $manager->persist($recipe);
            $manager->flush();
            $this->addFlash('success', 'recette ajoutée à l\'application');
            return $this->redirectToRoute('home');
        }
        return $this->render('recipe/edit.html.twig', [
            'form' => $form->createView(),
            'recipe' => $recipe,
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


    /**
     * @Route("/delete/{recipe}", name="delete", methods={"POST"})
     */
    public function delete(Request $request, Recipe $recipe, EntityManagerInterface $manager): Response
    {
        if ($this->isCsrfTokenValid('delete'. $recipe->getId(), $request->request->get('_token'))) {
            $recipe->setIsActive(false);
            $manager->flush();
            $this->addFlash('success', 'Vous avez supprimé la recette avec succès !');
        }

        return $this->redirectToRoute('home');
    }
}
