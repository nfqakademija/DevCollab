<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
class SecurityController extends AbstractController
{
    /**
     * @Route("/security/login", name="app_login", methods={"POST"})
     */
      public function login(Request $request)
      {
          $user = $this->getUser();

          return $this->json([
              'id' => $user->getId(),
              'name' => $user->getName(),
              'lastname' => $user->getLastname(),
              'username' => $user->getUsername(),
              'email' => $user->getEmail(),
              'location' => $user->getLocation(),
              'github_username' => $user->getGithubUsername(),
              'short_description' => $user->getShortDescription(),
//              'team' => $user->getTeam(),
//              'skills' => $user->getSkills(),
              'roles' => $user->getRoles(),         
          ]);
      }
    /**
     * @Route("/security/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \Exception('This method can be blank - it will be intercepted by the logout key on your firewall');
    }
}
