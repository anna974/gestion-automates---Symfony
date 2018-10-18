<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AutomateController extends AbstractController
{
    /**
     * @Route("/automate", name="automate")
     */
    public function index()
    {
        return $this->render('automate/index.html.twig', [
            'controller_name' => 'AutomateController',
        ]);
    }
}
