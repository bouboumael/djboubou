<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, [
                'label' => 'Nom',
                'label_attr' => ['class' => 'fw-bolder'],
                'attr' => [
                    'placeholder' => 'Chariault'
                ],
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'label_attr' => ['class' => 'fw-bolder'],
                'attr' => [
                    'placeholder' => 'Maël'
                ],
            ])
            ->add('email', TextType::class, [
                'label_attr' => ['class' => 'fw-bolder'],
                'attr' => [
                    'placeholder' => 'Djboubou@aol.fr'
                ],
            ])
            ->add('message',TextareaType::class, [
                'label_attr' => ['class' => 'fw-bolder'],
                'attr' => [
                    'placeholder' => 'Que voulez-vous me dire ?'
                ],
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
