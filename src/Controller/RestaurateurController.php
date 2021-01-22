<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Entity\User;
use App\Form\NewRestaurateurType;
use App\Repository\RestaurantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/restaurateur")
 */
class RestaurateurController extends AbstractController
{
    /**
     * @Route("/", name="restaurateur", methods={"GET","POST"})
     */
    public function index(RestaurantRepository $restaurantRepository)
    {
        $user=$this->getUser();
        $Repository = $this->getDoctrine()->getRepository(User::class);
        $dataUser = $Repository->findOneBy(['id' => $user]);
        $restaurants = $restaurantRepository->findByRestaurateur($dataUser);
        return $this->render('restaurateur/index.html.twig', [
            'restaurants' => $restaurants
        ]);
    }
    
    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $restaurant = new Restaurant();
        $restaurant->setUser($this->getUser());
        $form = $this->createForm(NewRestaurateurType::class, $restaurant);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        $em->persist($restaurant);
        $em->flush();
        }

        return $this->render('restaurateur/new.html.twig', [
            'new_restaurateur' => $form->createView(),
        ]);
    }
}
