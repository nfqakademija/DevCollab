<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserProfileType;
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
     * @param SerializerFunction $ser
     * @return Response $response
     */
    public function getUserData(
        Request $request,
        SerializerFunction $ser
    ): Response {
        $data = $request->query->get('username');
        $repository = $this->getDoctrine()->getRepository(User::class);
        $username = $repository->findOneBy([
            'username' => $data
        ]);
        if ($username !== null) {
            $username = $repository->getUsersData($data);
            $username =  json_encode($username, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        } else {
            $username = "User do not exists.";
        }
        $response = new Response();
            $response->setContent($username);
            $response->setStatusCode(Response::HTTP_OK);
        $response->send();
    }

    /**
     * @Route("/api/profile", name="update_data_profile", methods="POST")
     * @param Request $request
     * @param SerializerFunction $ser
     * @param UserProfileUpdate $usr
     * @return Response $response
     */
    public function updateUserData(
        Request $request,
        SerializerFunction $ser,
        UserProfileUpdate $usr
    ): Response {
        $data = $request->request->all();
        $form = $this->createForm(UserProfileType::class);
        $form->handleRequest($request);
        $form->submit($request->request->all());
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $usr->updateUserProfileData($data);
        } else {
            $data = "Something went wrong, please try again.";
        }
        $data = $ser->serializeris($data);
        $response = new Response();
        $response->setContent($data);
        $response->headers->set('Content-Type', 'application/json');
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();
    }
}
