<?php

namespace App\Controller\Api;

use App\Entity\Users;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends AbstractFOSRestController
{
    /**
     * List all users
     * @Rest\Get("/users", name="get_users")
     * @return Response
     */
    public function showUsers(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Users::class);
        $users = $repository->getUsers();
        return $this->handleView($this->view($users));
    }

    /**
     * List all users
     * @Rest\Get("/users/{id}", name="get_userbyid")
     * @return Response
     */
    public function showUserById($id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(Users::class)->getUserById($id);
        $teamId = $entityManager->getRepository(Users::class)->getTeamIdOfUser($id);

        $users['user'] = $user[0];
        $users['teamId'] = $teamId[0]['id'];

        return $this->handleView($this->view($users));
    }
}
