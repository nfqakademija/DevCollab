<?php


namespace App\Service;

use App\Controller\UserProfileController;
use App\Entity\User;
use App\Form\UserProfileType;
use App\Repository\UserRepository;

class UserProfileUpdate extends UserProfileController
{
    /**
     * @param array $request
     * @return array
     */
    public function updateUserProfileData($request)
    {
        $repository = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['username' => $request['username']]);
        if ($repository === null) {
            $request = "Something wrong, try again!";
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
