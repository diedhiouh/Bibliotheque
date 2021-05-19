<?php

namespace App\Form;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('prenom', TextType::class, [
                'attr' => [
                    'placeholder' => "Prenom",
                    'class'=> "form-control col-md-5 mt-8"
                ]
            ])
            ->add('nom',  TextType::class, [
                'attr' => [
                    'placeholder' => "Nom",
                    'class'=> "form-control col-md-5 mt-8"
                ]
                ])
            ->add('nationalite', TextType::class, [
                'attr' => [
                    'placeholder' => "Nationalite",
                    'class'=> "form-control col-md-5 mt-8"
                ]
                ])
            ->add('date_naissance', BirthdayType::class, [
                'attr' => [
                    'class'=> "form-control col-md-5",
                    'type' => "date"
                ]
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Auteur::class,
        ]);
    }
}
