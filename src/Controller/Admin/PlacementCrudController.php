<?php

namespace App\Controller\Admin;

use App\Entity\Placement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlacementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Placement::class;
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
