<?php

namespace App\Controller\Api;

use App\Controller\Form\Type\TeamType;
use App\Entity\Teams;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TeamsRepository;
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
        $teams = json_encode($teams);

        return new Response($teams);
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
}


