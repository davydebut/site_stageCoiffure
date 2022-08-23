<?php

namespace App\Controller\Admin;


use App\Entity\Client;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ClientCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Client::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('firstname'),
            TextField::new('lastname'),
            ArrayField::new('roles'),
            ChoiceField::new('genre')
            ->setChoices([
                'Femme' => 'Femme',
                'Homme' => 'Homme',])
            ->renderExpanded()
            ->allowMultipleChoices(false),
            EmailField::new('email'),
            DateField::new('date_de_naissance'),
            TextField::new('adresse'),
            NumberField::new('code_postal'),
            TextField::new('ville'),
            BooleanField::new('promotions'),
            BooleanField::new('alerteSMS'),
            BooleanField::new('isPro')
        ];
    }
   
}
