<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Recipe;
use App\Repository\CartRepository;
use App\Service\Shopping;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/caddie", name="cart_")
 * @IsGranted("ROLE_CONTRIBUTOR")
 */
class CartController extends AbstractController
{
    private $cartRepository;

    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * @Route("/", name="index")
     */
    public function index(Shopping $shopping): Response
    {
        $user = $this->getUser();
        $cart = $this->cartRepository->findOneBy(['user' => $user, 'isOpen' => true]);
        $list = null;
        if($cart) {
            $list = $shopping->makeList($cart);
        }

        return $this->render('cart/index.html.twig', [
            'list' => $list,
        ]);
    }

    /**
     * @Route("/ajout/{recipe}", name="add")
     */
    public function add(Recipe $recipe, EntityManagerInterface $manager): Response
    {
        $user = $this->getUser();
        $cart = $this->cartRepository->findOneBy(['user' => $user, 'isOpen' => true]);
        if(!$cart) {
            $newCart = new Cart();
            $newCart->setUser($user);
            $newCart->setIsOpen(true);
            $cart = $newCart;
        }
        $cart->addRecipe($recipe);
        $manager->persist($cart);
        $manager->flush();

        return $this->redirectToRoute('recipe_show', ['recipe' => $recipe->getId()]);
    }



}
