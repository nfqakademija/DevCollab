<?php


namespace App\Service;

use App\Controller\UserProfileController;
use App\Entity\Users;
use App\Form\UserProfileType;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserProfileUpdate extends UserProfileController
{
    /**
     * @param UserProfileController $request
     * @return string
     */
    public function updateUserProfileData($request)
    {
        $repository = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findOneBy(['username' => $request['username']]);
        if ($repository === null) {
            $data = "Something wrong, try again!";
        } else {
            $em = $this->getDoctrine()->getManager();
            $repository->setName($request['name']);
            $repository->setLastname($request['lastname']);
            $repository->setLocation($request['location']);
            $repository->setGithubUsername($request['githubUsername']);
            $repository->setShortDescription($request['shortDescription']);
            $em->flush();
        }
        return $request;
    }
}
