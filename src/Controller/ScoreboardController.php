<?php

namespace App\Controller;

use App\Entity\TeamPoints;
use App\Entity\Teams;
use App\Service\SerializerFunction;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScoreboardController extends AbstractController
{
    /**
     * @Route("/api/scoreboard", name="teams_scoreboard", methods="GET")
     * @param EntityManagerInterface $em
     * @param SerializerFunction $ser
     * @return Response $response
     */
    public function getTeamsForBoard(EntityManagerInterface $em, SerializerFunction $ser): Response
    {
//        $repository = $this->getDoctrine()->getRepository(Teams::class);
//        $teams = $repository->getTopTeams();

        $repository1 = $this->getDoctrine()->getRepository(TeamPoints::class);
        $points = $repository1->getTopTen();

        $points = $ser->serializeris($points);
        $response = new Response();
        $response->setContent($points);
        $response->setStatusCode(Response::HTTP_OK);
        $response->send();

//        $teams = $ser->serializeris($teams);
//        $response = new Response();
//        $response->setContent($teams);
//        $response->setStatusCode(Response::HTTP_OK);
//        $response->send();
    }
}
