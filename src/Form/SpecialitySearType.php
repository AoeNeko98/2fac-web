<?php

namespace App\Form;

use App\Entity\Etablissement;
use App\Entity\SpecialitySear;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SpecialitySearType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('etab',EntityType::class, [
        'class' => Etablissement::class,
        'choice_label' => 'Nom',
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SpecialitySear::class,
        ]);
    }
}
