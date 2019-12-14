<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UsersFixtures extends Fixture implements DependentFixtureInterface
{
    public const USERS_REFERENCE = 'admin-users';

    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 20; $i++) {
            $users = new Users();
            $users->setUsername('username-' . $i);
            $users->setName('firstname-' . $i);
            $users->setLastname('lastname-' . $i);
            $users->setEmail('email' . $i . '@gmail.com');
            $users->setPassword(mt_rand(10, 10000000));
            $data['password'] = password_hash($data['password'], PASSWORD_ARGON2I);
            $users->setRoles('ROLES_USER');
            $users->setTeam($this->getReference(TeamsFixtures::TEAM_REFERENCE));
            $manager->persist($users);
        }
        $manager->flush();
        $this->addReference(self::USERS_REFERENCE, $users);
    }

    public function getDependencies()
    {
        return array(
            TeamsFixtures::class,
        );
    }
}
