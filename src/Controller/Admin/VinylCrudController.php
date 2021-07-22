<?php

namespace App\Controller\Admin;

use App\Entity\Vinyl;
use Vich\UploaderBundle\Form\Type\VichFileType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;

class VinylCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Vinyl::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Vinyl')
            ->setEntityLabelInPlural('Vinyls')
            ->setPageTitle('index', 'DjBouBou Admin - %entity_label_plural%');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre'),
            TextareaField::new('imageFile', 'Pochette')
                ->setFormType(VichImageType::class)
                ->onlyOnForms(),
            ImageField::new('image', 'Pochette')
                ->setBasePath('/uploads/vinyls')
                ->onlyOnIndex(),
            TextField::new('author', 'Dj(s)'),
            DateField::new('createdAt', 'Date de création')
                ->onlyOnIndex(),
            AssociationField::new('category'),
        ];
    }
}
