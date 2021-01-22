<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterFormType;
use App\Form\SettingAccountType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
     * @Route("/{id}/edit_account", name="account_edit", methods={"GET","POST"})
     * @param Request $request
     * @param User $user
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function edit(Request $request, User $user, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SettingAccountType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $form['imageFile']->getData();
            $destination = $this->getParameter('kernel.project_dir').'/public/uploads/users_logo';
            $originalFilename = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
            $newFilename = Urlizer::urlize($originalFilename).'-'.uniqid().'.'.$uploadedFile->guessExtension();
            $uploadedFile->move(
                $destination,
                $newFilename
            );
            $user->setImageFilename($newFilename);

            $em->persist($user);
            $em->flush();


            return $this->redirectToRoute('index');
        }

        return $this->render('account/settings_account.html.twig', [
            'user' => $user,
            'formaccount' => $form->createView(),
        ]);
    }

}
