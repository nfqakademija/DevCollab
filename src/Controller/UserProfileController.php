<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use App\Form\UserProfileType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class UserProfileController extends AbstractController
{
    /**
     * @Route("/user/profile", name="get_data_profile", methods="GET")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response $response
     */
    public function getUserData(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = $request->query->get('username');
        $repository = $this->getDoctrine()->getRepository(Users::class);
        $username = $repository->findOneBy([
            'username' => $data
        ]);
        if ($username !== null) {
            $username = $repository->getUsersData($data);
            $username = $this->serializeris($username);
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
     * @Route("/user/profile", name="update_data_profile", methods="POST")
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Response $response
     */
    public function updateUserData(Request $request, EntityManagerInterface $em): Response
    {
//        $form = $this->createForm(UserProfileType::class);
        $data = $request->request->all();

        $repository = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findOneBy(['username' => $data['username']]);
        if ($repository === null) {
            $user = "nerado";
        } else {
//            $user = new Users();
            $em = $this->getDoctrine()->getManager();
            $repository->setName($data['name']);
            $repository->setLastname($data['lastname']);
            $repository->setLocation($data['location']);
            $repository->setGithubUsername($data['githubUsername']);
            $repository->setShortDescription($data['shortDescription']);
            $em->flush();
            $data = "all good";
        }
        $data = $this->serializeris($data);
        $response = new Response();
        $response->setContent($data);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/plain');
        $response->send();
    }

    private function serializeris($objektas)
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $objektas = $serializer->serialize($objektas, 'json');

        return $objektas;
    }
}
