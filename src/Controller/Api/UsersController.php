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
}
