<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MonPremierController extends AbstractController
{
    #[Route('/mon/premier', name: 'app_mon_premier')]
    public function index(): Response
    {
        return new Response("Bonjour, ceci est mon premier contrôleur !");
    }

    #[Route('/', name: 'app_accueil')]
    public function accueil(): Response
    {
        return $this->render('accueil.html.twig');
    }

    #[Route('/avec/twig', name: 'app_avec_twig')]
    public function avecTwig(): Response
    {
        return $this->render('mon_premier/index.html.twig');
    }
}