<?php

namespace App\Controller;

use App\Entity\Users;
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
    public function get_user_data(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->get('username'), true);
        $repository = $this->getDoctrine()->getRepository(Users::class);
        $username = $repository->findOneBy([
            'username' => $data['username']
        ]);
//        $encoders = [new XmlEncoder(), new JsonEncoder()];
//        $normalizers = [new ObjectNormalizer()];
//        $serializer = new Serializer($normalizers, $encoders);
//        $username = $serializer->serialize($username, 'json');
        $response = new Response();
            $response->setContent($username);
            $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/plain');
        $response->send();
    }

    /**
     * @Route("/user/profile", name="update_data_profile", methods="POST")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Response $response
     */
    public function update_user_data(Request $request, EntityManagerInterface $entityManager): Response
    {
        $data = json_decode($request->getContent(), true);
        $repository = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findOneBy(['username' => $data['username']]);
        if ($repository === null) {
            $user = "nerado";
        } else {
            $user = "rado";
        }
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $user = $serializer->serialize($repository, 'json');
        $response = new Response();
        $response->setContent($user);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/plain');
        $response->send();
    }
}
