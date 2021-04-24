<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use KMS\FroalaEditorBundle\Form\Type\FroalaEditorType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', FroalaEditorType::class, [
                'froala_language'      => 'fr',

                'froala_toolbarInline' => false,
                'froala_tableColors'   => ['#FFFFFF', '#FF0000'],
                'froala_saveParams'    => ['id' => 'myEditorField'],
            ])
            ->add('content', FroalaEditorType::class, [
                'froala_language'      => 'fr',
                'froala_toolbarInline' => false,
                'froala_tableColors'   => ['#FFFFFF', '#FF0000'],
                'froala_saveParams'    => ['id' => 'myEditorField'],
            ])
            ->add('image', FileType::class,[

                ]

            )
            ->add('submit', SubmitType::class)




        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,

        ]);
    }
}
