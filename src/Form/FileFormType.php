<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('diplomes', FileType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('Inscription', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary',
                    'data-bs-toggle' => 'modal',
                    'data-bs-target' => '#exampleModal',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
