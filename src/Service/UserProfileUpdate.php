<?php


namespace App\Service;

use App\Controller\UserProfileController;
use App\Entity\Users;
use App\Form\UserProfileType;
use App\Repository\UsersRepository;

class UserProfileUpdate
{
    /**
     * @param UserProfileController $request
     * @return string
     */
    public function updateUserProfileData(UserProfileController $request)
    {
        $repository = $this->getDoctrine()
            ->getRepository(Users::class)
            ->findOneBy(['username' => $request['username']]);
        if ($repository === null) {
            $data = "Something wrong, try again!";
        } else {
            $user = new Users();
            $em = $this->getDoctrine()->getManager();
            $repository->setName($data['name']);
            $repository->setLastname($data['lastname']);
            $repository->setLocation($data['location']);
            $repository->setGithubUsername($data['githubUsername']);
            $repository->setShortDescription($data['shortDescription']);
            $em->flush();
        }
        return $data;
    }
}
