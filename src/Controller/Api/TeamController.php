<?php

namespace App\Controller\Api;

use App\Controller\Form\TeamType;
use App\Entity\Projects;
use App\Entity\Teams;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TeamsRepository;
use App\Repository\ProjectsRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class TeamController extends AbstractFOSRestController
{
    /**
     * List all Teams
     * @Rest\Get("/teams", name="get_teams")
     *
     * @return Response
     */

    public function showTeams()
    {
        $repository = $this->getDoctrine()->getRepository(Teams::class);
        $teams = $repository->getTeams();

        return $this->handleView($this->view($teams));
    }

    /**
     * Create a new Team
     * @Rest\Post("/team", name="post_team")
     * @param Request $request
     *
     * @return Response
     */

    public function createTeam(Request $request): Response
    {
        $team = new Teams();
        $form = $this->createForm(TeamType::class, $team);
        $data = json_decode($request->getContent(), true);
        $form->submit($data);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($team);
            $em->flush();

            return $this->handleView($this->view([], Response::HTTP_CREATED));
        }

        return $this->handleView($this->view($form->getErrors()));
    }

    /**
     * List all Teams
     * @Rest\Get("/teams/{id}", name="get_teamsbyid")
     *
     * @return Response
     */

    public function showTeamById(int $id)
    {
        // $repository = $this->getDoctrine()->getRepository(Teams::class);
        //$teams = $repository->getTeamById($id);

//        $repository = $this->getDoctrine()->getRepository(Projects::class);
//        $projects = $repository->getProjectsByTeamId($id);

        //get team name of that project
//        $projects = $this->getDoctrine()
//            ->getRepository(Projects::class)
//            ->find($id);
//
//        $team = $projects->getTeam()->getName();
//
//        $teamData = $this->handleView($this->view($team));

        //try to get other way round: projects that below to the team:
        $teams = $this->getDoctrine()
            ->getRepository(Teams::class)
            ->find($id);
        $projects = $teams->getProjects();

        $teamData = $this->handleView($this->view($projects));

        return $teamData;
    }

//    public function show($id)
//    {
//        $projects = $this->getDoctrine()
//            ->getRepository(Projects::class)
//            ->find($id);
//        $team = $projects->getTeam()->getName();
//        $teamData = $this->handleView($this->view($team));
//
//        return $teamData;
//    }
}


