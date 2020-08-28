<?php

namespace App\Controller\Admin;

use App\Entity\Card;
use App\Entity\CardType;
use App\Entity\Extension;
use App\Entity\Faction;
use App\Entity\Placement;
use App\Entity\Rarity;
use App\Entity\Type;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Elumbre Games');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),

            MenuItem::section('Cartes'),
            MenuItem::linkToCrud('Carte', 'fa fa-tags', Card::class),
            MenuItem::linkToCrud('Type de carte', 'fa fa-file-text', CardType::class),
            MenuItem::linkToCrud('Faction', 'fa fa-file-text', Faction::class),
            MenuItem::linkToCrud('Placement', 'fa fa-file-text', Placement::class),
            MenuItem::linkToCrud('Rareté', 'fa fa-file-text', Rarity::class),
            MenuItem::linkToCrud('Type', 'fa fa-file-text', Type::class),
            MenuItem::linkToCrud('Extension', 'fa fa-file-text', Extension::class),

            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
        ];
    }
}
