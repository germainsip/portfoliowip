<?php

namespace App\Form;

use App\Entity\CoursVideo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CoursVideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,['label'=>'Nom'])
            ->add('url',TextType::class)
            ->add('description',TextType::class,['label'=>'Description'])
            ->add('submit',SubmitType::class,['label'=>'Envoyer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CoursVideo::class,
        ]);
    }
}
