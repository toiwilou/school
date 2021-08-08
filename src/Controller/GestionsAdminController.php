<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionsAdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/gestions/admin", name="gestions_admin")
     */
    public function gestionsAdmin(): Response
    {
        return $this->render('gestions_admin/index.html.twig', [
            'controller_name' => 'GestionsAdminController',
        ]);
    }
}
