<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimeSlotController extends AbstractController
{
    #[Route('/time/slot', name: 'app_time_slot')]
    public function index(): Response
    {
        return $this->render('time_slot/index.html.twig', [
            'controller_name' => 'TimeSlotController',
        ]);
    }
}
