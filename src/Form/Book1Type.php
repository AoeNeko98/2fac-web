<?php

namespace App\Form;

use App\Entity\Book1;
use App\Entity\Categorie;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Controller\Book1Controller;
use Symfony\Component\Validator\Constraints\Image;

class Book1Type extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {


        $builder
            ->add('nom')
            ->add('type',ChoiceType::class,[
                'label'=>'Type',
                'placeholder'=>'choose type:',
                'choices'=>[
                    'Vendre'=>'Vendre',
                    'Demande'=>'Demande',
                    'Echange'=>'Echange',
                ],


            ])
            ->add('description')
            ->add('prix')
            ->add('image',FileType::class,array('data_class'=>null,'label'=>'Image'))
            ->add('isbn')
            ->add('categorie',EntityType::class,[
            'class'=>Categorie::class,
                'placeholder'=>'choose categorie:',
            'choice_label'=>'nom',
           // 'multiple'=>false,
            //'expanded'=>true,
        ]);




    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Book1::class,
        ]);
    }
}
