<?php

namespace App\Controller;

use App\Entity\Admin;
use App\Entity\StudentTemporary;
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
            
        ]);
    }

    /**
     * @Route("/admin/gestions/admin", name="gestions_admin")
     */
    public function gestionsAdmin(): Response
    {
        $admins = $this->getDoctrine()->getRepository(Admin::class)->findAll();

        return $this->render('admin/index.html.twig', [
            'admins' => $admins,
        ]);
    }

    /**
     * @Route("/admin/gestions/inscriptions", name="gestions_inscriptions")
     */
    public function gestionsInscriptions(): Response
    {
        $_students = $this->getDoctrine()->getRepository(StudentTemporary::class)->findAll();

        return $this->render('admin/gestionsInscriptions.html.twig', [
            'students' => $_students,
        ]);
    }
}
