<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Entity\Link;
use App\Entity\User;
use App\Entity\Vinyl;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Assets;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

        return $this->redirect($routeBuilder->setController(LinkCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<a href="/">Djboubou</a>');
    }
    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Contenu');
        yield MenuItem::linkToCrud('Vidéos', 'fab fa-youtube', Link::class);
        yield MenuItem::linkToCrud('Vinyls', 'fas fa-record-vinyl', Vinyl::class);
        yield MenuItem::section('Messages');
        yield MenuItem::linkToCrud('Messages', 'fas fa-envelope-open-text', Contact::class);
        yield MenuItem::section('Action');
        yield MenuItem::linkToLogout('Déconnexion', 'fas fa-sign-out-alt');
    }
}
