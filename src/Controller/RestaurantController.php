<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Repository\PlatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurant/{id}", name="restaurant")
     */
    public function index(Restaurant $restaurant, PlatRepository $platRepository)
    {
        $entree = $platRepository->findByRestaurant($restaurant, 'Entrée');
        $plats = $platRepository->findByRestaurant($restaurant, 'plat');
        $dessert = $platRepository->findByRestaurant($restaurant, 'Dessert');
        $boisson = $platRepository->findByRestaurant($restaurant, 'Boisson');
        return $this->render('restaurant/index.html.twig', [
            'restaurant' => $restaurant,
            'entrees' => $entree,
            'plats' => $plats,
            'desserts' => $dessert,
            'boissons' => $boisson,
        ]);
    }
}
