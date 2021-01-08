<?php

namespace App\Form;

use App\Entity\Localisation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocalisationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number', NumberType::class, [
                'label' => 'N° de l\'adresse'
            ])
            ->add('address', TextType::class, [
                'label' => 'Adresse'
            ])
            ->add('postalCode', NumberType::class, [
                'label' => 'Code postal'

            ])
            ->add('city', TextType::class, [
            'label' => 'Ville'

            ])
            ->add('country', TextType::class, [
                'label' => 'Pays'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Localisation::class,
        ]);
    }
}
