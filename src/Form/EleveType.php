<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\User;
use phpDocumentor\Reflection\Types\Collection;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class EleveType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Bac_Type', ChoiceType::class, [
        'choices'  => [
            'Eco' => 'ECO',
            'Info' => 'INFO',
            'Lettres' => 'LET',
            'Math' => 'MATH' ,
            'Sciences Ex'=> 'Sc',
            'Sport' => 'SPORT' ,
            'Techniques' => 'TECH'
        ],
    ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Eleve::class,
        ]);
    }
}
