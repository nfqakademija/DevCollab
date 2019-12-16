<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class RegisterController extends AbstractController
{
    /**
     * @Route("api/registration", name="registration", methods="POST")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response $response
     */
    public function registration(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $user = new User();
        $data = json_decode($request->getContent(), true);

                $repository = $this->getDoctrine()->getRepository(User::class);
                $username = $repository->findOneBy([
                    'username' => $data['username']
                ]);
                $email = $repository->findOneBy([
                    'email' => $data['email']
                ]);

        if ($data['password'] !== $data['passwordConfirmation']) {
            $error = "Passwords are not the same!";
        } elseif (strlen($data['password']) < 6) {
            $error = "Your password is too short. Please, try again.";
        } elseif (isset($username)) {
            $error = "User with this username already exists. Please enter different username and try again.";
        } elseif (isset($email)) {
            $error = "User with this email already exists. Please enter another email and try again, or try to login.";
        } else {
            $data['password'] = password_hash($data['password'], PASSWORD_ARGON2I);
            $entityManager = $this->getDoctrine()->getManager();
            $user->setUsername($data['username']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setRoles('["ROLE_USER"]');
            $entityManager->persist($user);
            $entityManager->flush();
            $encoders = [new XmlEncoder(), new JsonEncoder()];
            $normalizers = [new ObjectNormalizer()];
            $serializer = new Serializer($normalizers, $encoders);
            $user = $serializer->serialize($user, 'json');
        }

        $response = new Response();
        if (isset($error)) {
            $response->setContent($error);
            $response->setStatusCode(Response::HTTP_OK);
        } else {
            $response->headers->setCookie(Cookie::create('name', $data['username']));
            $response->setContent($user);
            $response->setStatusCode(Response::HTTP_CREATED);
        }
        $response->headers->set('Content-Type', 'text/plain');
        $response->send();
    }
}
