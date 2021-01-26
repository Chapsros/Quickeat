<?php

namespace App\Controller;

use App\Entity\Plat;
use App\Entity\Restaurant;
use App\Form\PlatType;
use App\Repository\PlatRepository;
use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/restau/{resto}/plat")
 */
class PlatController extends AbstractController
{
    /**
     * @Route("/", name="plat_index", methods={"GET","POST"})
     */
    public function index(PlatRepository $platRepository, $resto): Response
    {
        $plats = $platRepository->findByRestaurant($resto, '');
        return $this->render('plat/index.html.twig', [
            'plats' => $plats,
            'resto' => $resto
        ]);
    }

    /**
     * @Route("/new/", name="plat_new", methods={"GET","POST"})
     */
    public function new(Request $request, $resto, RestaurantRepository $restaurantRepository): Response
    {
        $plat = new Plat();
        $restaurant = $restaurantRepository->findById($resto);
        $plat->setRestaurant($restaurant[0]);
        $form = $this->createForm(PlatType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($plat);
            $entityManager->flush();

            return $this->redirectToRoute('plat_index', [
                'resto' => $resto
            ]);
        }

        return $this->render('plat/new.html.twig', [
            'plat' => $plat,
            'form' => $form->createView(),
            'resto' => $resto
        ]);
    }

    /**
     * @Route("/show/{id}", name="plat_show", methods={"GET"})
     */
    public function show(Plat $plat, $resto): Response
    {
        return $this->render('plat/show.html.twig', [
            'plat' => $plat,
            'resto' => $resto
        ]);
    }

    /**
     * @Route("/{id}/edit", name="plat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Plat $plat, $resto): Response
    {
        $form = $this->createForm(PlatType::class, $plat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('plat_index');
        }

        return $this->render('plat/edit.html.twig', [
            'plat' => $plat,
            'form' => $form->createView(),
            'resto' => $resto
        ]);
    }

    /**
     * @Route("/{id}", name="plat_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Plat $plat, $resto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($plat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('plat_index', [
            'resto' => $resto
        ]);
    }
}
