<?php


declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends AbstractFOSRestController
{
    /**
     * @Rest\Post("/security/login", name="login")
     * @return JsonResponse
     */
    public function login(): JsonResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        if (!$user) {
            return JsonResponse::create(
                [
                    'errors' => 'User does not exist'
                ],
                Response::HTTP_NOT_FOUND
            );
        }
        $res_data = [
            'email' => $user->getEmail(),
            'roles' => $user->getRoles(),
            'username' => $user->getUsername(),
            'name' => $user->getName(),
            'lastname' => $user->getLastname(),
            'id' => $user->getId(),
            'location' => $user->getLocation(),
            'github_username' => $user->getGithubUsername(),
            '$short_description' => $user->getShortDescription(),
            'team' => $user->getTeam(),
            'skills' => $user->getSkills(),
            'isLoggedIn' => true
        ];
        return JsonResponse::create($res_data);
    }

    /**
     * @Rest\Get("/security/logout", name="logout", methods={"GET"})
     * @return void
     * @throws \RuntimeException
     */
    public function logout(): void
    {
        throw new \RuntimeException('This should not be reached!');
    }
}
