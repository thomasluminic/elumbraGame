<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use App\Entity\CardType;
use App\Entity\Extension;
use App\Entity\Faction;
use App\Entity\Placement;
use App\Entity\Rarity;
use App\Entity\Type;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class CardCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Card::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Info Globale'),
                IdField::new('id')->hideOnForm(),
                TextField::new('card_type.name', 'Type de carte')
                    ->setFormType(EntityType::class)
                    ->setFormTypeOptions(['class' => CardType::class, 'choice_label' => 'name']),
                TextField::new('faction.name', 'Faction')
                        ->setFormType(EntityType::class)
                        ->setFormTypeOptions(['class' => Faction::class, 'choice_label' => 'name']),
                TextField::new('placement.name', 'Placement')
                        ->setFormType(EntityType::class)
                        ->setFormTypeOptions(['class' => Placement::class, 'choice_label' => 'name']),
                TextField::new('type.name', 'Race')
                        ->setFormType(EntityType::class)
                        ->setFormTypeOptions(['class' => Type::class, 'choice_label' => 'name']),

            FormField::addPanel('Carte'),
                TextField::new('name', 'Nom'),
                IntegerField::new('attack', 'Attaque'),
                IntegerField::new('retaliation', 'Retaliation'),
                IntegerField::new('lifePoint', 'Point de vie'),
                TextEditorField::new('content', 'Contenu'),

            FormField::addPanel('Bas de carte'),
                IntegerField::new('number', 'Nombre de la carte'),
            TextField::new('extension.name', 'Extension')
                    ->setFormType(EntityType::class)
                    ->setFormTypeOptions(['class' => Extension::class, 'choice_label' => 'name']),
            TextField::new('rarity.name', 'Rarité')
                    ->setFormType(EntityType::class)
                    ->setFormTypeOptions(['class' => Rarity::class, 'choice_label' => 'name']),

            FormField::addPanel('Image'),
                ImageField::new('imageFile', 'Image')
                    ->setFormType(VichImageType::class)
                    ->hideOnDetail()
        ];
    }
}
