<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 20; $i++) {
            $users = new Users();
            $users->setName('users-'.$i);
            $users->setLastname('lastname-'.$i);
            $users->setEmail($i.'@gmail.com');
            $users->setPassword(mt_rand(10, 100));
            $manager->persist($users);
        }

        $manager->flush();
    }
}
