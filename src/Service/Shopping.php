<?php


namespace App\Service;


use App\Repository\CategoryRepository;

class Shopping
{
    private $categorieRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categorieRepository = $categoryRepository;
    }


    public function makeList($cart): array
    {
        $categories = $this->categorieRepository->findAll();
        $recipes = $cart->getRecipes();
        $list = [];


        foreach ($categories as $category) {
            foreach ($recipes as $recipe) {
                foreach ($recipe->getIngredients() as $ingredient) {
                    $test = false;
                    if($ingredient->getAliment()->getCategory()->getName() === $category->getName()) {
                        if(isset($list[$category->getName()])) {
                            for($i = 0; $i < count($list[$category->getName()]); $i++) {
                                if($list[$category->getName()][$i][0] === $ingredient->getAliment()->getName()) {
                                    $test = true;
                                    if($ingredient->getQuantity()) {
                                        $list[$category->getName()][$i][1] +=  $ingredient->getQuantity();
                                    }

                                }
                            }
                        }

                        if(!$test) {
                            if($ingredient->getQuantity()) {
                                $list[$category->getName()][] = [$ingredient->getAliment()->getName(),(int)$ingredient->getQuantity()];
                            } else {
                                $list[$category->getName()][] = [$ingredient->getAliment()->getName(),0];
                            }
                        }
                    }
                }
            }

        }
        return $list;

    }

}