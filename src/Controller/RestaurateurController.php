<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurateurController extends AbstractController
{
    /**
     * @Route("/restaurateur", name="restaurateur")
     */
    public function index(): Response
    {
        return $this->render('restaurateur/index.html.twig', [
            'controller_name' => 'RestaurateurController',
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(): Response
    {
        return $this->render('restaurateur/new.html.twig', [
            'controller_name' => 'RestaurateurController',
        ]);
    }
}
