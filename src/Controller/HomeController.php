<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\Prospect;
use App\Form\ProspectType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function contact(Request $request, EntityManagerInterface $entityManager): Response
    {
        $submittedToken = $request->request->get('token');
        if ($this->isCsrfTokenValid('token-value', $submittedToken)) {
            // ... do something, like deleting an object
//        }
//        if($submittedToken != null && $this->isCsrfTokenValid('token-value', $submittedToken)){
            $token = $request->request->get('token');
            $nom = $request->request->get('nom');
            $email = $request->request->get('email');
            $text = $request->request->get('message');
            $message = new Message();
            $message->setNom($nom);
            $message->setEmail($email);
            $message->setMessage($text);
            $message->setStatusTbl(1);
            $message->setCreatedAt(new \DateTimeImmutable());
            $entityManager->persist($message);
            $entityManager->flush();
//            dd($token, $nom, $email, $message);
        }

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
