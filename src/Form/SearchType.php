<?php

namespace App\Form;

use App\Data\SearchData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', TextType::class, [
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Nom du restaurant'
            ]
        ])
        ->add('ville', TextType::class, [
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Villes'
            ]
        ])
        ->add('categories', ChoiceType::class, [
            'label' => false,
            'required' => false,
            'choices' => [
                'Fast Food' => 'Fast food',
                'Pizzeria' => 'Pizzeria',
                'Asiatique' => 'Asiatique',
                'Indien' => 'Indien',
                'Halal' => 'Halal',
                'Francais' => 'Francais',
                'Italien' => 'Italien',
                'Vegan' => 'Vegan',                 
            ],
            'attr' => [
                'placeholder' => 'Type de restaurant'
            ]
        ])
        ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchData::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
