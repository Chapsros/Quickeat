<?php

namespace App\Controller;

use App\Entity\Restaurant;
use App\Form\NewRestaurateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurateurController extends AbstractController
{
    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $restaurant = new Restaurant();
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
