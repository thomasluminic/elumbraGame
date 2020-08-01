<?php

namespace App\Controller\Admin;

use App\Entity\Extension;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ExtensionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Extension::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
