<?php


namespace App\Controller\Api;

use App\Entity\Teams;
use App\Entity\User;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;

class JoinTeamController extends AbstractFOSRestController
{
    /**
     * Join a Team
     * @Rest\Post("/jointeam", name="get_jointeam")
     * @param Request $request
     * @return Response
     */
    public function teamSorter(Request $request): Response
    {
        $userId = json_decode($request->getContent(), true);

        $userId = $userId['id'];
        $teams = $this->getDoctrine()->getRepository(User::class)->getTeamIdOfAllUsers();
        $userTeam = [];
        foreach ($teams as $key => $value) {
            $userTeam[$key] = $value['id'];
        }

        $userCountInTeams = array_count_values($userTeam);

        $fullTeams = [];
        foreach ($userCountInTeams as $key => $value) {
            if ($value >= 4) {
                array_push($fullTeams, $key);
            }
        }

        $teams = $this->getDoctrine()->getRepository(Teams::class)->getTeams();
        $teamsNotFull = $teams;
        foreach ($teamsNotFull as $key => $value) {
            if (in_array($value['id'], $fullTeams)) {
                unset($teamsNotFull[$key]);
            }
        }

        $randomTeam = array_rand($teamsNotFull, 1);
        $firstTeamId = $teams[0]['id'];
        $randomTeamConverted = $firstTeamId + $randomTeam;
        $entityManager = $this->getDoctrine()->getManager();
        $team = $entityManager->getRepository(Teams::class)->find($randomTeamConverted);
        $user = $entityManager->getRepository(User::class)->find($userId);

        $team->addUser($user);
        $entityManager->flush();
        $user = $entityManager->getRepository(User::class)->getUserById($userId);

        $user = $user[0];
        $user['teamId'] = $randomTeamConverted;

        return $this->handleView($this->view($user));
    }
}
