<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_FE")
     * @Route("/{route}",
     *     name="react_pages",
     *     requirements={"route"="^(?!admin|user_login|user_logout|api|user/registration|api/profile).+"})
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
}
