<?php

namespace App\DataFixtures;

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
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();

        $user->setEmail('admin@admin.com')
            ->setRoles(["ROLE_ADMIN"])
            ->setName('admin')
            ->setFirstname('admin')
            ->setPhoneNumber('0123456789')
            ->setPassword($this->passwordEncoder->encodePassword($user, 'admin'));


        $manager->persist($user);

        $manager->flush();
    }
}
