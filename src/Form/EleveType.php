<?php

namespace App\Form;

use App\Entity\Eleve;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder


            ->add('bacType', ChoiceType::class, [
                'choices'  => [
                    'Eco' => 'Eco',
                    'Info' => 'Info',
                    'Lettres' => 'Let',
                    'Math' => 'Math' ,
                    'Sciences Ex'=> 'Sc',
                    'Sport' => 'Sp' ,
                    'Techniques' => 'Tech'
                ],
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

            'data_class' => Eleve::class,
        ]);
    }
}
