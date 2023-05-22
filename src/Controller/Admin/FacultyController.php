<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FacultyController extends AbstractController
{
    #[Route('/faculty', name: 'app_faculty')]
    public function index(): Response
    {
        return $this->render('faculty/index.html.twig', [
            'controller_name' => 'FacultyController',
        ]);
    }
}
