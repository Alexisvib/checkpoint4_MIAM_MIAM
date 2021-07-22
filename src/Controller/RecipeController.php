<?php

namespace App\Controller;


use App\Entity\Ingredient;
use App\Entity\Recipe;
use App\Entity\Step;
use App\Form\RecipeType;
use Cocur\Slugify\Slugify;
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
        $slugify = new Slugify();
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
            $recipe->setSlug($slugify->slugify($recipe->getName()));
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
     * @Route("/editer/{slug}", name="edit")
     */
    public function edit(Recipe $recipe, Request $request, EntityManagerInterface $manager): Response
    {
        $slugify = new Slugify();
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
            $recipe->setSlug($slugify->slugify($recipe->getName()));
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
     * @Route("/{slug}", name="show")
     */
    public function show(Recipe $recipe)
    {
        return $this->render('recipe/show.html.twig', [
            'recipe' => $recipe
        ]);
    }


    /**
     * @Route("/delete/{slug}", name="delete", methods={"POST"})
     */
    public function delete(Recipe $recipe, Request $request, EntityManagerInterface $manager): Response
    {
        if ($this->isCsrfTokenValid('delete'. $recipe->getSlug(), $request->request->get('_token'))) {
            $recipe->setIsActive(false);
            $manager->flush();
            $this->addFlash('success', 'Vous avez supprimé la recette avec succès !');
        }

        return $this->redirectToRoute('home');
    }
}
