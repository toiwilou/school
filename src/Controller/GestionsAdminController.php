<?php

namespace App\Controller;

use App\Entity\Admin;
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
        $admins = $this->getDoctrine()->getRepository(Admin::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'admins' => $admins,
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
