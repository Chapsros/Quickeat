<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\RestaurantRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @param RestaurantRepository $restaurantRepository
     * @return Response
     */
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        $restaurants = $restaurantRepository->findAll();

        return $this->render('index/mail.html.twig', [
            'controller_name' => 'IndexController',
            'restaurants' => $restaurants
        ]);
    }


}
