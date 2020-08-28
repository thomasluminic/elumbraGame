<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use App\Entity\CardType;
use App\Entity\Extension;
use App\Entity\Faction;
use App\Entity\Placement;
use App\Entity\Rarity;
use App\Entity\Type;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
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
        if (Crud::PAGE_INDEX === $pageName) {
            return self::indexCardFields();
        } elseif(Crud::PAGE_DETAIL === $pageName) {
            return self::editFields();
        } elseif (Crud::PAGE_EDIT === $pageName) {
            return self::editCardFields();
        } else {
            return self::newCardFields();
        }
    }

    static function indexCardFields()
    {
        return [
            TextField::new('faction.name', 'Faction'),
            TextField::new('placement.name', 'Placement'),
            TextField::new('type.name', 'Race'),
            TextField::new('name', 'Nom'),
            IntegerField::new('cost', 'Cout en mana'),
            IntegerField::new('attack', 'Attaque'),
            IntegerField::new('retaliation', 'Retaliation'),
            IntegerField::new('lifePoint', 'Point de vie'),
            TextField::new('extension.name', 'Extension'),
            TextField::new('rarity.name', 'Rarité'),
        ];
    }

    static function editCardFields()
    {
        return [
            FormField::addPanel('Info Globale'),
                AssociationField::new('card_type', 'Type de carte'),
                AssociationField::new('faction', 'Faction'),
                AssociationField::new('placement', 'Placement'),
                AssociationField::new('type', 'Race'),

            FormField::addPanel('Carte'),
                TextField::new('name', 'Nom'),
                IntegerField::new('cost', 'Cout en mana'),
                IntegerField::new('attack', 'Attaque'),
                IntegerField::new('retaliation', 'Retaliation'),
                IntegerField::new('lifePoint', 'Point de vie'),
                TextEditorField::new('content', 'Contenu'),

            FormField::addPanel('Bas de carte'),
                IntegerField::new('number', 'Nombre de la carte'),
                AssociationField::new('extension', 'Extension'),
                AssociationField::new('rarity', 'Rarité'),

            FormField::addPanel('Image'),
            ImageField::new('imageFile', 'Image')
                ->setFormType(VichImageType::class)
        ];
    }
    static function newCardFields()
    {
        return [
            FormField::addPanel('Info Globale'),
                TextField::new('card_type', 'Type de carte')
                    ->setFormType(EntityType::class)
                    ->setFormTypeOptions(['class' => CardType::class, 'choice_label' => 'name']),
                TextField::new('faction', 'Faction')
                    ->setFormType(EntityType::class)
                    ->setFormTypeOptions(['class' => Faction::class, 'choice_label' => 'name']),
                TextField::new('placement', 'Placement')
                    ->setFormType(EntityType::class)
                    ->setFormTypeOptions(['class' => Placement::class, 'choice_label' => 'name']),
                TextField::new('type', 'Race')
                    ->setFormType(EntityType::class)
                    ->setFormTypeOptions(['class' => Type::class, 'choice_label' => 'name']),

            FormField::addPanel('Carte'),
                TextField::new('name', 'Nom'),
                IntegerField::new('cost', 'Cout en mana'),
                IntegerField::new('attack', 'Attaque'),
                IntegerField::new('retaliation', 'Retaliation'),
                IntegerField::new('lifePoint', 'Point de vie'),
                TextEditorField::new('content', 'Contenu'),

            FormField::addPanel('Bas de carte'),
                IntegerField::new('number', 'Nombre de la carte'),
            TextField::new('extension', 'Extension')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions(['class' => Extension::class, 'choice_label' => 'name']),
            TextField::new('rarity', 'Rarité')
                ->setFormType(EntityType::class)
                ->setFormTypeOptions(['class' => Rarity::class, 'choice_label' => 'name']),

            FormField::addPanel('Image'),
                ImageField::new('imageFile', 'Image')
                    ->setFormType(VichImageType::class)
        ];
    }
}
