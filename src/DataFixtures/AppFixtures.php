<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    public const USER = 'user';

    /** @var UserPasswordEncoderInterface $userPasswordEncoder */
    private $userPasswordEncoder;
    /**
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
    {
        $this->userPasswordEncoder = $userPasswordEncoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager): void
    {
        $usersData = $this->getData();
        foreach ($usersData as $userData) {
            $userFixture = self::USER;
            /** @var User $user */
            $user = new User();
            $user
                ->setPassword(
                    $this->userPasswordEncoder->encodePassword($user, $userData['password'])
                )
                ->setEmail($userData['email'])
                ->setRoles($userData['roles'])
                ->setName($userData['name'])
                ->setLastname($userData['lastname'])
                ->setShortDescription($userData['short_description'])
                ->setGithubUsername($userData['github_username']);


            $manager->persist($user);
            $this->setReference($userFixture, $user);
        }
        $manager->flush();
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            [
                'email' => 'vienas@mail.com',
                'roles' => ['ROLE_USER', 'ROLE_ADMIN'],
                'password' => 'labas',
                'name' => 'Evaldas',
                'lastname' => 'Bepavardis',
                'location' => 'Vilnius',
                'short_description' => 'Blablabla',
                'github_username' => 'nopuser'

            ],
            [
                'email' => 'du@mail.com',
                'roles' => ['ROLE_USER'],
                'password' => 'hello',
                'name' => 'Jonas',
                'lastname' => 'Jonaitis',
                'location' => 'Kaunas',
                'short_description' => 'Blablabla',
                'github_username' => 'nopuser'
            ],
        ];
    }
}
