<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    /**
     * @Route("/admin/student/add/{id}", name="add_student")
     */
    public function addStudent($id): Response
    {
        return $this->render('admin/gestionsInscriptions.html.twig', [
            
        ]);
    }
}
