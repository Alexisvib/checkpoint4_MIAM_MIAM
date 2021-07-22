<?php

namespace App\Controller;

use App\Repository\RecipeRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/administration", name="admin_")
 * @IsGranted("ROLE_ADMIN")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig');
    }

    /**
     * @Route("/recettes", name="recipes")
     */
    public function recipes(RecipeRepository $recipeRepository): Response
    {
        $recipes = $recipeRepository->findAll();
        return $this->render('admin/recipes.html.twig', [
            'recipes' => $recipes,
        ]);
    }

    /**
     * @Route("/statistiques", name="stat")
     */
    public function stat(UserRepository $userRepository, RecipeRepository $recipeRepository)
    {

        $countUser = count($userRepository->findAll()) - 1;
        $countRecipe = count($recipeRepository->findAll());
        $lastRecipe = $recipeRepository->findOneBy([], ['createdAt' => 'ASC'])->getCreatedAt();

        return $this->render('admin/stat.html.twig', [
            'countUser' => $countUser,
            'countRecipe' => $countRecipe,
            'lastRecipe' => $lastRecipe,
    ]);

    }
}
