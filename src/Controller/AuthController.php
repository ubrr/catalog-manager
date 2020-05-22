<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    /**
     * @Route("/api/auth/register", name="auth_register")
     */
    public function register(Request $request)
    {   
        $body = json_decode($request->getContent(), true);
        // $userEmail=$body["email"];
        // $repository =  $this->getDoctrine()
        //     ->getRepository(UserRepository::class);
        
            
        print_r($body["email"]);
        $response = new Response();
        $response->setContent(json_encode([
            'data' => $body
        ]));
        $response->headers->set('Content-Type', 'application/json');
        return $response;
        
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
