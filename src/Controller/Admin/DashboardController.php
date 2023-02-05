<?php

namespace App\Controller\Admin;

use App\Entity\Films;
use App\Entity\People;
use App\Entity\Planets;
use App\Entity\Species;
use App\Entity\Vehicles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Rendu Symfony');
    }

    public function configureMenuItems(): iterable
    {
        return [
            yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            yield MenuItem::linkToCrud('Planets', 'fas fa-list', Planets::class),
            yield MenuItem::linkToCrud('People', 'fas fa-list', People::class),
            yield MenuItem::linkToCrud('Films', 'fas fa-list', Films::class),
            yield MenuItem::linkToCrud('Species', 'fas fa-list', Species::class),
            yield MenuItem::linkToCrud('Vehicles', 'fas fa-list', Vehicles::class),
        ];

    }
}
