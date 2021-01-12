<?php

namespace App\Form;

use App\Entity\Restaurant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewRestaurateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom'

            ])
            ->add('categories', ChoiceType::class, [
                'choices' => [
                    'Fast Food' => 'fast_food',
                    'Pizzeria' => 'pizzeria',
                    'Asiatique' => 'asiatique',
                    'Indien' => 'indien',
                    'Halal' => 'halal',
                    'Francais' => 'francais',
                    'Italien' => 'italien',
                    'Vegan' => 'vegan',                    
                ],
            ])
            ->add('localisation', LocalisationType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Restaurant::class,
        ]);
    }
}
