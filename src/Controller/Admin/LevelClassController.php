<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LevelClassController extends AbstractController
{
    #[Route('/level/class', name: 'app_level_class')]
    public function index(): Response
    {
        return $this->render('level_class/index.html.twig', [
            'controller_name' => 'LevelClassController',
        ]);
    }
}
