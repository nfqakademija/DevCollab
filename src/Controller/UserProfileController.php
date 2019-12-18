<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Form\UserProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SerializerFunction;
use App\Service\UserProfileUpdate;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/api/profile", name="get_data_profile", methods="GET")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param SerializerFunction $ser
     * @return Response $response
     */
    public function getUserData(
        Request $request,
        EntityManagerInterface $entityManager,
        SerializerFunction $ser
    ): Response {
        $data = $request->query->get('username');
        $repository = $this->getDoctrine()->getRepository(User::class);
        $username = $repository->findOneBy([
            'username' => $data
        ]);
        if ($username !== null) {
            $username = $repository->getUsersData($data);
            $username = $ser->serializeris($username);
        } else {
            $username = "User do not exists.";
        }
        $response = new Response();
            $response->setContent($username);
            $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/plain');
        $response->send();
    }

    /**
     * @Route("/api/profile", name="update_data_profile", methods="POST")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @param SerializerFunction $ser
     * @param UserProfileUpdate $usr
     * @return Response $response
     */
    public function updateUserData(
        Request $request,
        EntityManagerInterface $em,
        SerializerFunction $ser,
        UserProfileUpdate $usr
    ): Response {
        $data = $request->request->all();
        $form = $this->createForm(UserProfileType::class);
        $form->handleRequest($request);
        $form->submit($request->request->all());
        $response = new Response();
        if ($form->isSubmitted() && $form->isValid()) {
            $response->setStatusCode(Response::HTTP_OK);
            $data = $usr->updateUserProfileData($data);
        } else {
            $response->setStatusCode(Response::HTTP_NOT_FOUND);
            $data = "Something went wrong, please try again.";
        }
        $data = $ser->serializeris($data);
        $response->setContent($data);
        $response->send();
    }
}
