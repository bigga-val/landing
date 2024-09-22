<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'isActive' => 'accueil'
        ]);
    }

    #[Route('/avertir', name: 'app_avertir')]
    public function avertir(): Response
    {
        return $this->render('home/avertir.html.twig', [
            'controller_name' => 'HomeController',
            'isActive' => 'avertir'
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('home/contact.html.twig', [
            'controller_name' => 'HomeController',
            'isActive' => 'contact'
        ]);
    }

    #[Route('/apropos', name: 'app_apropos')]
    public function apropos(): Response
    {
        return $this->render('home/apropos.html.twig', [
            'controller_name' => 'HomeController',
            'isActive' => 'apropos'
        ]);
    }
}
