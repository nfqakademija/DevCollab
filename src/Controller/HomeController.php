<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/{reactRouting}", name="home")
     *
     */
    public function index()
    {
//        return $this->render('home/index.html.twig');
          return 1;
    }
}
