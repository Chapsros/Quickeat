<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();

        $user->setEmail('admin@admin.com')
        ->setPassword('admin')
            ->setRoles(["ROLE_ADMIN"])
            ->setName('admin')
            ->setFirstname('admin')
            ->setPhoneNumber('0123456789');

        $manager->persist($user);

        $manager->flush();
    }
}
