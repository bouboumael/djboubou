<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\SearchCategory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class SearchCategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'label' => 'Catégories',
                'label_attr' => ['class' => 'fw-bolder me-2'],
                'attr' => [
                    'class' => 'filter'
                ],
                'placeholder' => 'Choisissez la categorie',
                'empty_data' => null,
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SearchCategory::class,
        ]);
    }
}
