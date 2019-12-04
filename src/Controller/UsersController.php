<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/api1/users", name="users")
     */
    public function show()
    {
////kaip gauti viena
//        $user = $this->getDoctrine()
//            ->getRepository(Users::class)
//            ->findOneBy(['email'=>'email2@gmail.com']);
//
//        var_dump($user->getName());die; // die nutraukia viska (kaip break)
//kaip gauti custom
//        $user1 = $this->getDoctrine()
//            ->getRepository(Users::class)
//            ->findAllUsers();

//        var_dump($user1); die;
//
//        $user2 = $this->getDoctrine()
//            ->getRepository(Users::class)
//            ->findAllEmails();
//
//        var_dump($user2);

        $workordie = $this->getDoctrine()
            ->getRepository(Users::class)
            ->createQueryBuilder('u');

//        $product = $this->getDoctrine()
//            ->getRepository(Product::class)
//            ->find($id);
//
//        if (!$product) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$id
//            );
//        }
    }
}
