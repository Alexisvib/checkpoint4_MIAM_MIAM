<?php

namespace App\Form;

use App\Entity\Cost;
use App\Entity\Difficulty;
use App\Entity\Recipe;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecipeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('guest', NumberType::class)
            ->add('time', IntegerType::class)
            ->add('difficulty', EntityType::class, [
                'class' => Difficulty::class,
                'choice_label' =>'name',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('cost', EntityType::class, [
                'class' => Cost::class,
                'choice_label' =>'name',
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('steps', CollectionType::class, [
                'entry_type' => StepType::class,
                'allow_add' => true,
                'label' => false,
            ])
            ->add('ingredients', CollectionType::class, [
                'entry_type' => IngredientType::class,
                'allow_add' => true,
                'label' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recipe::class,
        ]);
    }
}
