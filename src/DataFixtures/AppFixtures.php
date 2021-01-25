<?php

namespace App\DataFixtures;

use App\Entity\Localisation;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
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

        $Localisation = new Localisation();

        $Localisation
            ->setNumber(2)
            ->setAddress('rue de vichy')
            ->setPostalCode(69004)
            ->setCity("lyon")
            ->setCountry("France")
            ;

        $admin = new User();

        $admin->setEmail('admin@admin.com')
            ->setRoles(["ROLE_ADMIN"])
            ->setName('admin')
            ->setFirstname('admin')
            ->setPhoneNumber('0123456789')
            ->setPassword($this->passwordEncoder->encodePassword($admin, 'admin'));

        $resto = new User();

        $resto->setEmail('resto@resto.com')
            ->setRoles(["ROLE_RESTAURATEUR"])
            ->setName('resto')
            ->setFirstname('resto')
            ->setPhoneNumber('0123456789')
            ->setPassword($this->passwordEncoder->encodePassword($resto, 'resto'));
            
        $user = new User();

        $user->setEmail('user@user.com')
            ->setRoles(["ROLE_USER"])
            ->setName('user')
            ->setFirstname('user')
            ->setPhoneNumber('0123456789')
            ->setPassword($this->passwordEncoder->encodePassword($user, 'user'));

        $manager->persist($admin);
        $manager->persist($resto);
        $manager->persist($user);
        $manager->persist($Localisation);

        $manager->flush();
    }
}
