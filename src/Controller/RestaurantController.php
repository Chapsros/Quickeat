<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Repository\PlatRepository;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurantController extends AbstractController
{
    /**
     * @Route("/restaurant/{id}", name="restaurant")
     */
    public function index(Restaurant $restaurant, PlatRepository $platRepository, RestaurantRepository $restaurantRepository): Response
    {
        // $id = $restaurantRepository->findOneBy(['id'=> $test]);
        // dd($id);
        $entree = $platRepository->findByRestaurant(3, 'Entrée');
        $plats = $platRepository->findByRestaurant(3, 'plat');
        $dessert = $platRepository->findByRestaurant(3, 'Dessert');
        $boisson = $platRepository->findByRestaurant(3, 'Boisson');
        return $this->render('restaurant/index.html.twig', [
            'restaurant' => $restaurant,
            'entrees' => $entree,
            'plats' => $plats,
            'desserts' => $dessert,
            'boissons' => $boisson,
        ]);
    }
}
