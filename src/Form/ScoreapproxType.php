<?php

namespace App\Form;

use App\Entity\Scoreapprox;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScoreapproxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ScoreECO')
            ->add('ScoreINFO')
            ->add('ScoreLET')
            ->add('ScoreMATH')
            ->add('ScoreSc')
            ->add('ScoreSPORT')
            ->add('ScoreTECH')

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scoreapprox::class,
        ]);
    }
}
