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
        if ($request['name'] == "") {
            $request['name'] = null;
        }
        if ($request['lastname'] == "") {
            $request['lastname'] = null;
        }
        if ($request['location'] == "") {
            $request['location'] = null;
        }
        if ($request['githubUsername'] == "") {
            $request['githubUsername'] = null;
        }
        if ($request['shortDescription'] == "") {
            $request['shortDescription'] = null;
        }
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
