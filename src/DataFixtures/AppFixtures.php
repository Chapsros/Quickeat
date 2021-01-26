<?php

namespace App\DataFixtures;

use App\Entity\Localisation;
use App\Entity\Restaurant;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use PhpParser\Node\Expr\New_;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        // ---------- user ---------------
        $Localisation = new Localisation();
        $Localisation
            ->setNumber(2)
            ->setAddress('rue de vichy')
            ->setPostalCode(69004)
            ->setCity("lyon")
            ->setCountry("France")
            ;

        $admin = new User();
        $admin
            ->setEmail('admin@admin.com')
            ->setRoles(["ROLE_ADMIN"])
            ->setName('admin')
            ->setFirstname('admin')
            ->setPhoneNumber('0123456789')
            ->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'))
            ->setLocalisation($Localisation);


        $Localisation2 = new Localisation();
        $Localisation2
            ->setNumber(2)
            ->setAddress('rue de vichy')
            ->setPostalCode(69004)
            ->setCity("lyon")
            ->setCountry("France")
            ;
        $resto = new User();
        $resto->setEmail('resto@resto.com')
            ->setRoles(["ROLE_RESTAURATEUR"])
            ->setName('resto')
            ->setFirstname('resto')
            ->setPhoneNumber('0123456789')
            ->setPassword($this->passwordEncoder->encodePassword($resto, 'resto'))
            ->setLocalisation($Localisation2);
            
        $Localisation3 = new Localisation();
        $Localisation3
            ->setNumber(2)
            ->setAddress('rue de vichy')
            ->setPostalCode(69004)
            ->setCity("lyon")
            ->setCountry("France")
            ;
        $user = new User();
        $user->setEmail('user@user.com')
            ->setRoles(["ROLE_USER"])
            ->setName('user')
            ->setFirstname('user')
            ->setPhoneNumber('0123456789')
            ->setPassword($this->passwordEncoder->encodePassword($user, 'user'))
            ->setLocalisation($Localisation3);

        // ---------- fin user ---------------

        // ---------- restaurant ---------------


        // $Localisation4 = new Localisation();
        // $Localisation4
        //     ->setNumber(2)
        //     ->setAddress('rue de vichy')
        //     ->setPostalCode(69004)
        //     ->setCity("lyon")
        //     ->setCountry("France")
        //     ;
        // $restaurant1 = New Restaurant();
        // $restaurant1
        //     ->setLocalisation($Localisation4)
        //     ->setName("");





        $manager->persist($Localisation);
        $manager->persist($Localisation2);
        $manager->persist($Localisation3);
        // $manager->persist($Localisation4);
        $manager->persist($admin);
        $manager->persist($resto);
        $manager->persist($user);

        $manager->flush();
    }
}
