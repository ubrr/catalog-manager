<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('index/index.html.twig');
    }
    /**
     * @Route("/{reactRoutings}", name="index1")
     */
    public function index1()
    {
        return $this->render('index/index.html.twig');
    }
}
