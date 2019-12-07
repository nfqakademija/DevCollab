<?php

namespace App\Controller;

use App\Entity\Teams;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TeamsRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class TeamController extends AbstractFOSRestController
{

/**
 * @Route("/api/other/teams", name="teams")
 * @return Response
 */


    public function showTeams()
    {
        $repository = $this->getDoctrine()->getRepository(Teams::class);

        $teams = $repository->getTeams();
        return $this->handleView($this->view($teams));
        //$teams = serialize($teams);
        //return new Response($teams);
    }



    public function index()
    {
        return $this->render('team/index.html.twig', [
            'controller_name' => $this->showTeams(),
        ]);
    }
}

//class TeamController extends AbstractController
//{
//    /**
//     * Lists all Teams.
//     * @Rest\Get("/teams", name="get_teams")
//     *
//     * @return Response
//     */
//
//
//    public function showTeams(): Response
//    {
//        /** @var TeamsRepository $repository */
//        $repository = $this->getDoctrine()->getRepository(TeamsRepository::class);
//        $teams = $repository->getTeams();
//        //return $this->handleView($this->view($teams));
//        return new Response('aaaab');
//    }
//
//    public function index()
//    {
//        return $this->render('team/index.html.twig', [
//            'controller_name' => $this->showTeams(),
//        ]);
//    }
//}
