<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/api/auth/register", name="auth_register")
     */
    public function register()
    {
        return $this->render('auth_c/index.html.twig', [
            'controller_name' => 'AuthCController',
        ]);
    }
        /**
     * @Route("/api/auth/login", name="auth_login")
     */
    public function login()
    {
        return $this->render('auth_c/index.html.twig', [
            'controller_name' => 'AuthCController',
        ]);
    }
}
