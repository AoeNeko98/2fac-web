<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('email')
            ->add('dateNaissance' , BirthdayType::class,[
                'placeholder' => 'Select a value' ,
            ])
            ->add('password')
            ->add('Role',ChoiceType::class,[
                'label'=>'Role',
                'placeholder'=>'choose type:',
                'choices'=>[
                    'Etudient'=>'Etudient',
                    'Eleve'=>'Eleve',


                ],
            ])
            ->add('adresse')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
