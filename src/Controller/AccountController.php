<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use App\Form\SettingAccountType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     * @param UserRepository $userRepository
     * @return Response
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('account/account.html.twig', [
            'user' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="account_edit", methods={"GET","POST"})
     * @param Request $request
     * @param User $register
     * @return Response
     */
    public function edit(Request $request, User $register): Response
    {
        $form = $this->createForm(SettingAccountType::class, $register);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('account/settings_account.html.twig', [
            'user' => $register,
            'formaccount' => $form->createView(),
        ]);
    }

}
